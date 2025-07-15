<?php
    namespace App\Controllers;

    use \Datetime;
    use App\Models\ModeleAdherent;
    use App\Models\ModeleAdministrateur;
    use App\Models\ModeleAbonnement;
    use App\Models\ModeleForfait;
    use App\Models\ModeleS_Inscrire;
    use App\Models\ModeleSeance_Machine;
    use App\Models\ModeleParametres;

    helper(['url', 'assets', 'form']);

    //eMfn5DRz2h

    class Visiteur extends BaseController
    {
        public function emploieDuTemps($date = null)
        {
            $session = session();
            $data['erreur'] = null;
            $modParametres = new ModeleParametres();

            $parametres = $modParametres->first();

            $data['nbinscriptionsmax'] = $parametres->NBMACHINES * $parametres->NBADHERENTSMACHINE;

            if (isset($_POST['btnseance']))
            {
                $data['erreur'] = 'Connexion';
            }

            $data['TitreDeLaPage'] = 'EFP - Pilates Machines';
            date_default_timezone_set('Europe/Paris');

            $modinscriptions = new ModeleS_Inscrire();
            $modsce_machine = new ModeleSeance_Machine();

            if ($date == null)
            {
                $session->set('dateplanning', date('Y-m'));
                $data['fonction'] = 'Planning';
                $date = new DateTime(date('Y-m'));
            }
            else
            {
                $session->set('dateplanning', date('Y-m', strtotime($date)));
                $data['fonction'] = 'Planning/' . $date;
                $date = new DateTime($date);
            }

            $data['date'] = $date;
            $data['lesPlaces'] = $modinscriptions->GetNombreInscription($data['date']->format('Y-m'));
            $data['heureJours'] = $modsce_machine->findall();

            $data['connexion'] = $this->Connexion();

            return view('Templates/Header', $data)
            . view('Visiteur/vue_PilatesMachines', $data)
            . view('Visiteur/vue_Connexion', $data)
            . view('Templates/Footer');
        }















    
        public function Connexion()
        {
            $session = session();
            date_default_timezone_set('Europe/Paris');

            $modAdherent = new ModeleAdherent();
            $modAdministrateur = new ModeleAdministrateur();

            if (!is_null($session->get('email')))
            {
                if (isset($_POST['btnDeconnection']))
                {
                    session()->destroy();
                }

                $data['erreur'] = "";

                return $data;
            }
            else
            {
                if (isset($_POST['btnConnexion']))
                {
                    $Identifiant = $this->request->getPost('txtEmail');
//                    $MdP = $this->request->getPost('txtMDP');

//                    $reglesValidation = ['txtEmail' => 'required', 'txtMDP' => 'required'];
                    $reglesValidation = ['txtEmail' => 'required'];

                    if (!$this->validate($reglesValidation))
                    {
                        $data['erreur'] = "Saisie";

                        return $data;
                    }

                    $condition = ['EMAILADHERENT'=>$Identifiant];
                    $conditionAdmin = ['EMAILADMIN'=>$Identifiant];

                    $adminRetourne = $modAdministrateur->where($conditionAdmin)->first();
                    $adherentRetourne = $modAdherent->where($condition)->first();

                    if ($adminRetourne != null)
                    {
                    /*    if (password_verify($MdP, $adminRetourne->MDPADMIN))
                        {
                    */        $session->set('nom', 'Simonek');
                            $session->set('prenom', 'Sébastien');
                            $session->set('email', $adminRetourne->EMAILADMIN);
                            $session->set('profil', 'admin');

                            return null;
                    /*    }
                        else
                        {
                            $data['erreur'] = 'Inconnu';

                            return $data;
                        }
                    */}
                    if ($adherentRetourne != null)
                    {
                    /*    if (password_verify($MdP, $adherentRetourne->MDPADHERENT))
                        {
                    */        $session->set('numero', $adherentRetourne->NOADHERENT);
                            $session->set('nom', $adherentRetourne->NOM);
                            $session->set('prenom', $adherentRetourne->PRENOM);
                            $session->set('datenaissance', $adherentRetourne->DATENAISSANCE);
                            $session->set('adresse', $adherentRetourne->ADRESSE);
                            $session->set('codepostal', $adherentRetourne->CODEPOSTAL);
                            $session->set('ville', $adherentRetourne->VILLE);
                            $session->set('email', $adherentRetourne->EMAILADHERENT);
                            $session->set('tel', $adherentRetourne->TEL);
                            $session->set('profil', 'client');

                            return null;
                    /*    }
                        else
                        {
                            $data['erreur'] = 'Inconnu';

                            return $data;
                        }
                    */}
                    else
                    {
                        $data['erreur'] = 'Inconnu';

                        return $data;
                    }
                }
                else
                {
                    $data['erreur'] = "";

                    return $data;
                }
            }
        }















        public function mdpOublie()
        {
            $data['erreur'] = null;
            $data['TitreDeLaPage'] = 'Mot de passe oublié';

            $modAdherent = new ModeleAdherent();

            if (isset($_POST['btnPoster']))
            {
                $reglesValidation = ['txtEmail' => 'required'];

                if (!$this->validate($reglesValidation))
                {
                    $data['erreur'] = 'Saisie';

                    return view('Templates/Header', $data)
                    . view('Visiteur/vue_MDPoublie', $data)
                    . view('Templates/Footer');
                }

                $adherent = $modAdherent->where(['EMAILADHERENT'=>$this->request->getPost('txtEmail')])->first();

                if ($adherent == null)
                {
                    $data['erreur'] = 'Inconnu';

                    return view('Templates/Header', $data)
                    . view('Visiteur/vue_MDPoublie', $data)
                    . view('Templates/Footer');
                }

                $stringSpace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $pieces = [];
                $max = mb_strlen($stringSpace, '8bit') - 1;
                for ($i = 0; $i < 10; ++ $i)
                {
                    $pieces[] = $stringSpace[random_int(0, $max)];
                }

                $motdepasse = password_hash(implode('', $pieces), PASSWORD_ARGON2I);

                $donneesAInserer = [
                    'MDPADHERENT' => $motdepasse,
                    'MDPMODIFIE' => 0,
                ];

                $modAdherent->update(['NOADHERENT' => $adherent->NOADHERENT], $donneesAInserer);

                $to = $this->request->getPost('txtEmail');
                $subject = 'Votre  mot de passe ESPACE FORME PILATE';
                $message = "Bonjour " . $adherent->PRENOM . ", votre mot de passe est " . implode('', $pieces) . ".";
                $from = 'FROM: kyllian30.poullard@gmail.com';
                mail($to, $subject, $message, $from);

                return redirect()->to('../Planning');
            }

            return view('Templates/Header', $data)
            . view('Visiteur/vue_MDPoublie', $data)
            . view('Templates/Footer');
        }
    }
?>