<?php

namespace App\Libraries;

helper(['assets']); // donne accès aux fonctions du helper 'asset'

use CodeIgniter\API\ResponseTrait;
use App\Models\ModeleAdmin;
use App\Models\ModeleSeance;
use App\Models\ModeleTypeSeance;
use App\Models\ModeleSInscrire;
use App\Models\ModeleEtrePresent;
use App\Models\ModeleAbonnement;
use App\Models\ModeleAdherent;
use Exception;
use \DateTime;
use PHPUnit\Util\Json;
use Dompdf\Dompdf;
use Dompdf\Options;
use SimpleSoftwareIO\QrCode\Generator;
use PHPMailer\PHPMailer\PHPMailer;

use function PHPSTORM_META\type;

require '../vendor/autoload.php'; // PHPMailer si tu l’utilises via Composer

class QRService
{
    use ResponseTrait;

    // Génération du QR code seulement, uniquement le QR code
    public function makeQR($noAdherent, $size)
    {
        $qrJSON = $this->makeQRJson($noAdherent);
        $qrEncrypted = $this->encryptQRJson($qrJSON);

        $qrcode = new Generator();
        $qrcode->format('png');
        $qrBrut = $qrcode->size($size)->color(0, 0, 0)->backgroundColor(255, 255, 255)->generate(
            $qrEncrypted
        );
        $qrImage = 'data:image/png;base64,' . base64_encode($qrBrut);

        return '<img src="' . $qrImage . '" alt="QR Code">';
    }

    // Créé et renvoie la div avec balise img du QR code et bouton de téléchargement
    public function makeQRLink($noAdherent, $size)
    {
        return '
        <div style="display: inline-block;">
            <div style="display: block;">
                ' . $this->makeQR($noAdherent, $size) . '
            </div>
            <div style="text-align: center; font-family: Nunito, sans-serif; margin-top: 8px;">
                <form action="qr/' . $noAdherent . '" method="post">
                    <input type="submit" value="Télécharger">
                </form>
            </div>
        </div>';
    }

    public function downloadQR($noAdherent, $shouldStreamOutput)
    {
        $qrService = new QrService();

        try {
            $pdfQROptions = new Options();
            $pdfQROptions->set('isRemoteEnabled', true);
            $pdfQROptions->set('defaultFont', 'Nunito');

            $pdfQR = new Dompdf($pdfQROptions);
            $pdfQR->setPaper('A4', 'portrait');

            $pdfQROptions->setChroot("www/API/public/");

            $modAdherent = new ModeleAdherent();
            $adherent = $modAdherent->where('NOADHERENT', $noAdherent)->first();

            $contenuPDF = '
            <div style="text-align: center; font-family: Nunito, sans-serif; width: 100%;">
                <img src="data:image/png;base64,' . base64_encode(file_get_contents(FCPATH . 'assets/images/logoefp.png')) . '" alt="Logo EFP" 
                style="
                position: absolute;
                    left: 50%;
                    -webkit-transform: translateX(-50%);
                    transform: translateX(-50%);
                    width: 265px;
                    opacity: 0.15;
                " />

                <br>

                <h1>Ma carte virtuelle EFP</h1>
                <p>
                    Celle-ci est <b><u>STRICTEMENT PERSONNELLE</u></b>.
                    <br>
                    Conservez la précieusement et scannez-la à l\'entrée de la salle.
                    <br><br>
                    Elle vous permet de valider votre présence aux séances classiques, 
                    à condition d\'avoir un abonnement actif et un nombre de séances restantes non nul (sauf forfait illimité). 
                    <br>
                    Pour les séances machines, rendez-vous sur
                    <a href="https://espaceformepilates.fr">espaceformepilates.fr</a> pour vous inscrire.
                </p>

            <br><br>

            <h2>Nom : ' . $adherent->NOM . '</h2>
            <br>
            <h2>Prénom : ' . $adherent->PRENOM . '</h2>

            <br><br><br>
            '
                .
                $qrService->makeQR($noAdherent, 425)
                .
                '
            <br><br><br><br>
            <p>Générée le ' . date('d/m/Y') . ' à ' . date('H:i') . '.</p>
            
            </div>';

            $pdfQR->loadHtml($contenuPDF);
            $pdfQR->render();

            $output = $pdfQR->output();

            if(!$shouldStreamOutput) {
                return $output;
            } else {
                $pdfQR->stream('mon-qr-code-efp.pdf');
            }
        } catch (Exception $e) {
            $data['erreur'] = "Un problème est survenu lors de la génération du PDF. Veuillez réessayer.";
        }
    }




    public function makeQRJson($noAdherent)
    {
        // $modAbonnement = new ModeleAbonnement();
        // $modAdherent = new ModeleAdherent();

        // // Récupération des abonnements actifs
        // $abonnementsAdherent = $modAbonnement
        //     ->join('adherent', 'abonnement.NOADHERENT = adherent.NOADHERENT')
        //     ->join('forfait', 'abonnement.NOFORFAIT = forfait.NOFORFAIT')
        //     ->where('abonnement.NOADHERENT', $noAdherent)
        //     ->where('DATE_ADD(abonnement.DATEDEBUT, INTERVAL forfait.duree MONTH) >=', date('Y-m-d'))
        //     ->orderBy('abonnement.NOFORFAIT')
        //     ->findAll();

        // // Récupération du mot de passe de l'adhérent
        // $mdpAdherent = $modAdherent
        //     ->where('NOADHERENT', $noAdherent)
        //     ->select('MDPADHERENT')
        //     ->first();

        // $noAbonnementClassique = null;
        // $noAbonnementMachine = null;

        // foreach ($abonnementsAdherent as $abonnement) {
        //     if ($abonnement->NOFORFAIT < 7) {
        //         $noAbonnementClassique = $abonnement->NOABONNEMENT;
        //     } elseif ($abonnement->NOFORFAIT > 6) {
        //         $noAbonnementMachine = $abonnement->NOABONNEMENT;
        //     }
        // }

        $tableauQR = [
            // 'noAbonnementClassique' => $noAbonnementClassique,
            // 'noAbonnementMachine' => $noAbonnementMachine,
            // 'mdpAdherent' => $mdpAdherent->MDPADHERENT

            'noAdherent' => strval($noAdherent),
        ];

        // echo $tableauQR['noAbonnementClassique'] . ' ' . $tableauQR['noAbonnementMachine'] . ' ' . $tableauQR['mdpAdherent'];

        return json_encode($tableauQR);
    }

    public function encryptQRJson($qrJSON)
    {
        $cipher = "aes-128-cbc";
        $encryption_key = "efpQrCodeAESKey1";

        $iv_size = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($iv_size);

        $encrypted = openssl_encrypt($qrJSON, $cipher, $encryption_key, OPENSSL_RAW_DATA, $iv);

        return base64_encode($iv . $encrypted);
    }
}