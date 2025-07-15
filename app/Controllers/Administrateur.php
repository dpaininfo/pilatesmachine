<?php
    namespace App\Controllers;

    use App\Models\ModeleAdherent;
    use App\Models\ModeleInscription;
    use App\Models\ModeleForfait;
    use App\Models\ModeleAbonnement;

    helper(['url', 'assets', 'form']);

    class Administrateur extends BaseController
    {
        public function ajouterAdherent()
        {
            $data['txtNom'][0] = null;
            $data['txtPrenom'][0] = null;
            $data['txtDateNaissance'][0] = null;
            $data['txtAdresse'][0] = null;
            $data['txtCodePostal'][0] = null;
            $data['txtVille'][0] = null;
            $data['txtEmail'][0] = null;
            $data['txtTelephone'][0] = null;
            $data['txtProfession'][0] = null;

            if ($this->request->getPost('btnAjouter') == null)
            {
                $data['TitreDeLaPage'] = 'Ajouter un adherent';
                $data['erreur'] = "";

                return view('Templates/Header', $data)
                . view('Administrateur/vue_AjouterAdherent', $data)
                . view('Templates/Footer');
            }

            $reglesValidation = ['txtEmail' => 'required|max_length[100]', 'txtNom'  => 'required|string|max_length[30]', 'txtPrenom'  => 'required|string|max_length[30]', 'txtDateNaissance'  => 'required', 'txtAdresse'  => 'required|string|max_length[100]', 'txtCodePostal'  => 'required|numeric|max_length[5]', 'txtVille' => 'required|string|max_length[30]', 'txtTelephone' => 'required|numeric|max_length[10]', 'txtProfession' => 'permit_empty|string'];

            if (!$this->validate($reglesValidation))
            {
                $data['TitreDeLaPage'] = 'Ajouter un adherent';
                $data['erreur'] = "saisie";
                $validation = service('validation');

                foreach ($reglesValidation as $champ => $controlesaisie)
                {
                    if (!$validation->check($champ, $controlesaisie) || !$this->validate([$champ=>$controlesaisie]))
                    {
                        $data[$champ] = ["is-invalid", $this->request->getPost($champ)];
                    }
                    else
                    {
                        $data[$champ] = ["is-valid", $this->request->getPost($champ)];
                    }
                }

                return view('Templates/Header', $data)
                . view('Administrateur/vue_AjouterAdherent', $data)
                . view('Templates/Footer');
            }

            $modAdherent = new ModeleAdherent();

            $condition = ['NOM'=>$this->request->getPost('txtNom'), 'PRENOM'=>$this->request->getPost('txtPrenom'), 'DATENAISSANCE'=>$this->request->getPost('txtDateNaissance')];
            $condition2 =['EMAILADHERENT'=>$this->request->getPost('txtEmail')];

            if ($modAdherent->where($condition)->findall() != null)
            {
                $data['TitreDeLaPage'] = 'Ajouter un adherent';
                $data['Erreur'] = "adherentexistant";
                $data['Nom'] = $this->request->getPost('txtNom');
                $data['Prenom'] = $this->request->getPost('txtPrenom');

                return view('Templates/Header', $data)
                . view('Administrateur/vue_AjouterAdherent', $data)
                . view('Templates/Footer');
            }
            if ($modAdherent->where($condition2)->findall() != null)
            {
                $data['TitreDeLaPage'] = 'Ajouter un adherent';
                $data['erreur'] = "emailexistant";
                $data['Email'] = $this->request->getPost('txtEmail');

                return view('Templates/Header', $data)
                . view('Administrateur/vue_AjouterAdherent', $data)
                . view('Templates/Footer');
            }

            $stringSpace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pieces = [];
            $max = mb_strlen($stringSpace, '8bit') - 1;
            for ($i = 0; $i < 10; ++ $i)
            {
                $pieces[] = $stringSpace[random_int(0, $max)];
            }

            $donneesAInserer = [
                'EMAILADHERENT' => $this->request->getPost('txtEmail'),
                'MDPADHERENT' => implode('', $pieces),
                'NOM' => $this->request->getPost('txtNom'),
                'PRENOM' => $this->request->getPost('txtPrenom'),
                'DATENAISSANCE' => $this->request->getPost('txtDateNaissance'),
                'ADRESSE' => $this->request->getPost('txtAdresse'),
                'CODEPOSTAL' => $this->request->getPost('txtCodePostal'),
                'VILLE' => $this->request->getPost('txtVille'),
                'TEL' => $this->request->getPost('txtTelephone'),
                'PROFESSION' => $this->request->getPost('txtProfession')];
                
            $modAdherent->insert($donneesAInserer);

            $to = $this->request->getPost('txtEmail');
            $subject = 'Bienvenu '.$this->request->getPost('txtPrenom').' !';
            $message = "<b> Bienvenue ! Accédez a votre compte depuis le site ESPACE FORME PILATES <a href='".base_url()."'>".base_url()."</a> </b> \n\n Identifiant : ".$this->request->getPost('txtEmail')." \n Mot de passe : ".implode('', $pieces);
            $from = 'FROM: kyllian30.poullard@gmail.com';
            mail($to, $subject, $message, $from);

            $data['TitreDeLaPage'] = 'Ajouter un adherent';
            $data['erreur'] = "poster";
            $data['Nom'] = $this->request->getPost('txtNom');
            $data['Prenom'] = $this->request->getPost('txtPrenom');

            return view('Templates/Header', $data)
            . view('Administrateur/vue_AjouterAdherent', $data)
            . view('Templates/Footer');
        }














        public function ajouterAbonnement()
        {
            $modAdherent = new ModeleAdherent();
            $modAbonnement = new ModeleAbonnement();
            $modForfait = new ModeleForfait();

            $data['TitreDeLaPage'] = 'EFP - Nouvel adhésion';
            $data['adherents'] = $modAdherent->findall();
            $data['forfaits'] = $modForfait->findall();
            $data['erreur'] = null;
            $data['etape'] = null;

            if (isset($_POST['btnValider']))
            {
                $reglesValidation = ['adherent' => 'required', 'forfait' => 'required'];

                if (!$this->validate($reglesValidation))
                {
                    $data['erreur'] = 'Saisie';
                }
                else
                {
                    $data['etape'] = 'ValidationAbonnement';
                    $data['prmadherent'] = $this->request->getPost('adherent');
                    $data['prmforfait'] = $this->request->getPost('forfait');
                    $data['nomforfait'] = $modForfait->where('NOFORFAIT =' . substr($this->request->getPost('forfait'), 0, 1))->first()->LIBELLEFORFAIT;

                    if ($this->request->getPost('datedebut') == null)
                    {
                        $data['prmdate'] = date('d/m/Y');
                    }
                    else
                    {
                        $data['prmdate'] = date('d/m/Y', strtotime($this->request->getPost('datedebut')));
                    }

                    if ($modAdherent->GetIdParNom($data['prmadherent']) == null)
                    {
                        $data['erreur'] = 'Innexistant';

                        return view('Templates/Header', $data)
                        . view('Administrateur/vue_AjouterAbonnement', $data)
                        . view('Templates/Footer');
                    }
                }
            }

            if (isset($_POST['btnPoster']))
            {
                $data['etape'] = 'PosterAbonnement';
                $data['prmadherent'] = $this->request->getPost('txtAdherent');
                $data['nomforfait'] = $modForfait->where('NOFORFAIT =' . substr($this->request->getPost('txtForfait'), 0, 1))->first()->LIBELLEFORFAIT;
                
                $noadherent = $modAdherent->GetIdParNom($data['prmadherent'])->NOADHERENT;
                $info = explode(' ', $this->request->getPost('txtForfait'));
                $noforfait = $info[0];
                $nbseances = $info[1];
                $infodate = explode('/', $this->request->getPost('txtDate'));

                $forfaits = $modForfait->like('LIBELLEFORFAIT', 'illimitée')->findall();

                $trouver = null;

                foreach ($forfaits as $unforfait)
                {
                    if ($unforfait->NOFORFAIT == $noforfait)
                    {
                        $donneesAInserer = [
                            'DATEDEBUT' => ($infodate[2] . '-' . $infodate[1] . '-' . $infodate[0]),
                            'NBSEANCESRESTANTES' => NULL,
                            'NOFORFAIT' => $noforfait,
                            'NOADHERENT' => $noadherent,
                            'JOURSADDITIONNELS' => '0',
                        ];

                        $trouver = true;
                    }
                }

                if ($trouver == null)
                {
                    $donneesAInserer = [
                        'DATEDEBUT' => ($infodate[2] . '-' . $infodate[1] . '-' . $infodate[0]),
                        'NBSEANCESRESTANTES' => $nbseances,
                        'NOFORFAIT' => $noforfait,
                        'NOADHERENT' => $noadherent,
                        'JOURSADDITIONNELS' => '0',
                    ];
                }

                $modAbonnement->insert($donneesAInserer);
            }

            return view('Templates/Header', $data)
            . view('Administrateur/vue_AjouterAbonnement', $data)
            . view('Templates/Footer');
        }















        public function ajouterTemps()
        {
            $modAdherent = new ModeleAdherent();
            $modAbonnement = new ModeleAbonnement();
            $modForfait = new ModeleForfait();

            $data['TitreDeLaPage'] = 'EFP - Nouvel adhésion';
            $data['adherents'] = $modAdherent->findall();
            $data['forfaits'] = $modForfait->findall();
            $data['prmTempsAdherents'] = $this->request->getPost('tempsAdherents');
            $data['prmJoursAdditionnels'] = $this->request->getPost('txtJoursAdditionnels');
            $data['prmAbonnement'] = $this->request->getPost('abonnement');
            $data['erreur'] = null;
            $data['etape'] = null;

            if (isset($_POST['btnRechercher']))
            {
                $reglesValidation = ['tempsAdherents' => 'required'];

                if (!$this->validate($reglesValidation))
                {
                    $data['erreur'] = 'Saisie';

                    return view('Templates/Header', $data)
                    . view('Administrateur/vue_AjouterAbonnement', $data)
                    . view('Templates/Footer');
                }
                if ($modAdherent->GetIdParNom($this->request->getPost('tempsAdherents')) == null)
                {
                    $data['erreur'] = 'Innexistant';
                    $data['prmTempsAdherents'] = '';

                    return view('Templates/Header', $data)
                    . view('Administrateur/vue_AjouterAbonnement', $data)
                    . view('Templates/Footer');
                }

                $data['etape'] = 'abonnements';
                $data['lesAbonnements'] = $modAbonnement->GetAbonnementValide($modAdherent->GetIdParNom($this->request->getPost('tempsAdherents'))->NOADHERENT); 
            }

            if (isset($_POST['btnValider']))
            {
                $reglesValidation = ['TempsAdherents' => 'required', 'forfait' => 'required', ];

                if (!$this->validate($reglesValidation))
                {
                    $data['erreur'] = 'Saisie';
                }
                else
                {
                    $data['etape'] = 'ValidationTemps';
                    $data['prmadherent'] = $this->request->getPost('adherent');
                    $data['prmforfait'] = $this->request->getPost('forfait');
                    $data['nomforfait'] = $modForfait->where('NOFORFAIT =' . substr($this->request->getPost('forfait'), 0, 1))->first()->LIBELLEFORFAIT;

                    if ($this->request->getPost('datedebut') == null)
                    {
                        $data['prmdate'] = date('d/m/Y');
                    }
                    else
                    {
                        $data['prmdate'] = date('d/m/Y', strtotime($this->request->getPost('datedebut')));
                    }
                }
            }

            if (isset($_POST['btnPoster']))
            {
                $data['etape'] = 'PosterAbonnement';
                $data['prmadherent'] = $this->request->getPost('txtAdherent');
                $data['nomforfait'] = $modForfait->where('NOFORFAIT =' . substr($this->request->getPost('txtForfait'), 0, 1))->first()->LIBELLEFORFAIT;
                
                $noadherent = $modAdherent->GetIdParNom($data['prmadherent'])->NOADHERENT;
                $info = explode(' ', $this->request->getPost('txtForfait'));
                $noforfait = $info[0];
                $nbseances = $info[1];
                $infodate = explode('/', $this->request->getPost('txtDate'));

                $donneesAInserer = [
                    'DATEDEBUT' => ($infodate[2] . '-' . $infodate[1] . '-' . $infodate[0]),
                    'NBSEANCESRESTANTES' => $nbseances,
                    'NOFORFAIT' => $noforfait,
                    'NOADHERENT' => $noadherent,
                    'JOURSADDITIONNELS' => '0',
                ];

                $modAbonnement->insert($donneesAInserer);
            }

            return view('Templates/Header', $data)
            . view('Administrateur/vue_AjouterAbonnement', $data)
            . view('Templates/Footer');
        }















        public function desinscrireadherent()
        {
            $modAdherent = new ModeleAdherent;
            $data['LesAdherents'] = $modAdherent->findall();
            if ($this->request->getPost('btnAjouter') == null)
            {
                $data['TitreDeLaPage'] = 'Désiscrire un adhérent';   
                $data['Etape'] = 1;

                return view('Templates/Header', $data)
                . view('Administrateur/vue_AjouterAdherent', $data)
                . view('Templates/Footer');
            }
            else
            {
                $modInscription = new ModeleInscription();

                $data['TitreDeLaPage'] = 'Désiscrire un adhérent';   
                $data['Etape'] = 2;
            }
        }
    }
?>