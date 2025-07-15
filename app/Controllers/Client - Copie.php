<?php
    namespace App\Controllers;

    use \Datetime;
    use App\Models\ModeleS_Inscrire;
    use App\Models\ModeleSeance_Machine;
    use App\Models\ModeleAbonnement;
    use App\Models\ModeleAdherent;
    use App\Models\ModeleParametres;

    use Dompdf\Dompdf;
    use Dompdf\Options;
    use SimpleSoftwareIO\QrCode\Generator;
    use PHPMailer\PHPMailer\PHPMailer;

    use App\Libraries\QRService;


    require '../vendor/autoload.php';

    helper(['url', 'assets', 'form']);

    class Client extends BaseController
    {
        public function moncompte()
        {
            $data['modifie'] = false;
            $session = session();
            // $qrService = new QrService();

            $data['fonction'] = 'Compte';

            $modAdherent = new ModeleAdherent;
            $data['adherent'] = $modAdherent->where('NOADHERENT', $session->get('numero'))->first();

            // la fonction du qr code qui ne fonctionne pas
            // echo $qrService->makeQr($session->get('numero'), 250);

            $connexion = new Visiteur();
            $data['connexion'] = $connexion->Connexion();

            $data['TitreDeLaPage'] = 'Mon compte';

            return view('Templates/Header', $data)
            . view('Client/vue_Compte', $data)
            . view('Visiteur/vue_Connexion', $data)
            . view('Templates/Footer');
        }

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        public function modifiecompte()
        {
            $session = session();
        
            $data['erreur'] = null;
            $data['fonction'] = 'ModifierCompte';
            $connexion = new Visiteur();
            $data['connexion'] = $connexion->Connexion();
            $data['TitreDeLaPage'] = 'Modifier mon compte';
            $modAdherent = new ModeleAdherent();

            if (isset($_POST['btnPoster']))
            {
                $reglesValidation = ['txtadresse' => 'required', 'txtcodepostal' => 'required',  'txtville' => 'required', 'txttel' => 'required', 'txtemail' => 'required'];

                if (!$this->validate($reglesValidation))
                {
                    $data['erreur'] = "Saisie";

                    return view('Templates/Header', $data)
                    . view('Client/vue_ModifierCompte', $data)
                    . view('Visiteur/vue_Connexion', $data)
                    . view('Templates/Footer');
                }

                $condition = ['NOADHERENT' => $session->get('numero')];

                $donneesAInserer = array(
                    'ADRESSE' => $this->request->getPost('txtadresse'),
                    'CODEPOSTAL' => $this->request->getPost('txtcodepostal'),
                    'VILLE' => $this->request->getPost('txtville'),
                    'TEL' => $this->request->getPost('txttel'),
                    'EMAILADHERENT' => $this->request->getPost('txtemail'),
                );

                $modAdherent
                ->set($donneesAInserer)
                ->where($condition)
                ->update();

                $session->set('adresse', $this->request->getPost('txtadresse'));
                $session->set('codepostal', $this->request->getPost('txtcodepostal'));
                $session->set('ville', $this->request->getPost('txtville'));
                $session->set('tel', $this->request->getPost('txttel'));
                $session->set('email', $this->request->getPost('txtemail'));

                $data['modifie'] = true;

                return view('Templates/Header', $data)
                . view('Client/vue_Compte', $data)
                . view('Visiteur/vue_Connexion', $data)
                . view('Templates/Footer');
            }

            return view('Templates/Header', $data)
            . view('Client/vue_ModifierCompte', $data)
            . view('Visiteur/vue_Connexion', $data)
            . view('Templates/Footer');
        }

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        public function nouveauMDP()
        {
            $session = session();

            $data['modifie'] = null;
            $data['erreur'] = null;
            $data['fonction'] = 'NouveauMotDePasse';
            $data['TitreDeLaPage'] = 'Modifier mon mot de passe';
            $modAdherent = new ModeleAdherent();

            if (!$this->request->is('post'))
            {
                return redirect()->to('../Planning');   
            }
            else
            {
                if (isset($_POST['btnPoster']))
                {
                    $reglesValidation = ['txtMDP' => 'required', 'txtConfirmerMDP' => 'required'];

                    if (!$this->validate($reglesValidation))
                    {
                        $data['erreur'] = "Saisie";

                        return view('Templates/Header', $data)
                        . view('Client/vue_ModificationMDP', $data)
                        . view('Visiteur/vue_Connexion', $data)
                        . view('Templates/Footer');
                    }

                    if ($this->request->getPost('txtMDP') != $this->request->getPost('txtConfirmerMDP'))
                    {
                        $data['erreur'] = "MDP";

                        return view('Templates/Header', $data)
                        . view('Client/vue_ModificationMDP', $data)
                        . view('Visiteur/vue_Connexion', $data)
                        . view('Templates/Footer');
                    }

                    $condition = ['NOADHERENT' => $session->get('numero')];

                    $donneesAInserer = array(
                        'MDPADHERENT' => password_hash($this->request->getPost('txtMDP'), PASSWORD_ARGON2I),
                    );

                    $modAdherent
                    ->set($donneesAInserer)
                    ->where($condition)
                    ->update();

                    return view('Templates/Header', $data)
                . view('Client/vue_Compte', $data)
                . view('Visiteur/vue_Connexion', $data)
                . view('Templates/Footer');
                }

                return view('Templates/Header', $data)
                . view('Client/vue_ModificationMDP', $data)
                . view('Visiteur/vue_Connexion', $data)
                . view('Templates/Footer');
            }
        }

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        public function pagereservation()
        {
            $mois = ['January' => 'Janvier', 'February' => 'Fevrier', 'March'  => 'Mars', 'April' => 'Avril', 'May' => 'Mai', 'June' => 'Juin', 'July' => 'Juillet', 'August' => 'Aout', 'September' => 'Septembre', 'October' => 'Octobre', 'November' => 'Novembre', 'December' => 'Decembre'];
            $days = ['Monday' => 'Lundi', 'Tuesday' => 'Mardi', 'Wednesday' => 'Mercredi', 'Thursday' => 'Jeudi', 'Friday' => 'Vendredi', 'Saturday' => 'Samedi', 'Sunday' => 'Dimanche'];
            $session = session();

            $data['TitreDeLaPage'] = 'Reservation';
            $data['fonction'] = 'PageReservation';
            $connexion = new Visiteur();
            $data['connexion'] = $connexion->Connexion();

            $modinscriptions = new ModeleS_Inscrire();
            $modAbonnement = new modeleAbonnement();

            $seances = $this->request->getpost('seances');

            if (isset($_POST['btnReserver']))
            {
                return view('Templates/Header', $data)
                . view('Client/vue_PageReservation', $data)
                . view('Visiteur/vue_Connexion', $data)
                . view('Templates/Footer');
            }

            if ($seances != null)
            {
                foreach ($seances as $laseance)
                {
                    $seanceannuler = false;

                    if (isset($_POST['value'.$laseance]))
                    {
                        $condition = ['DATESEANCE' => $laseance, 'HEUREDEBUTSEANCE' => $this->request->getPost('heure'.$laseance)];
                        $modinscriptions->where($condition)->delete();
                        $seanceannuler = true;

                        $abonnement = $modAbonnement->GetAbonnementMachine();

                        $condition = ['NOABONNEMENT' => $abonnement->NOABONNEMENT];

                        $donneesAInserer = array(
                            'NBSEANCESRESTANTES' => ($abonnement->NBSEANCESRESTANTES + 1),
                        );

                        $modAbonnement
                        ->set($donneesAInserer)
                        ->where($condition)
                        ->where('NBSEANCESRESTANTES', $abonnement->NBSEANCESRESTANTES)
                        ->update();
                    }

                    if ($seanceannuler == false)
                    {   
                        $data['seances'][] = [$this->request->getPost($laseance), $laseance, $this->request->getPost('heure'.$laseance)];
                    }
                }

                return view('Templates/Header', $data)
                . view('Client/vue_ListeReservations', $data)
                . view('Visiteur/vue_Connexion', $data)
                . view('Templates/Footer');
            }

            if (isset($_POST['btnReservations']))
            {
                $inscriptions = $modinscriptions->GetInscriptions($session->get('numero'));

                foreach ($inscriptions as $uneInscription)
                {
                    $data['seances'][] = ['le ' . $days[date('l', strtotime($uneInscription->DATESEANCE))] . ' ' . date('d', strtotime($uneInscription->DATESEANCE)) . ' ' . $mois[date('F', strtotime($uneInscription->DATESEANCE))] . ' ' . date('Y', strtotime($uneInscription->DATESEANCE)) . ' à ' . date('H', strtotime($uneInscription->HEUREDEBUTSEANCE)) . 'h' . date('i', strtotime($uneInscription->HEUREDEBUTSEANCE)), date('Y-m-d', strtotime($uneInscription->DATESEANCE)), $uneInscription->HEUREDEBUTSEANCE];
                }

                return view('Templates/Header', $data)
                . view('Client/vue_ListeReservations', $data)
                . view('Visiteur/vue_Connexion', $data)
                . view('Templates/Footer');
            }

            return view('Templates/Header', $data)
            . view('Client/vue_PageReservation', $data)
            . view('Visiteur/vue_Connexion', $data)
            . view('Templates/Footer');
        }



        public function reserver($date = null, $heure = null)
        {
            $data['fonction'] = 'Inscription/' . $date . '/' . $heure;
            $connexion = new Visiteur();
            $data['connexion'] = $connexion->Connexion();

            $modParametres = new ModeleParametres();

            $parametres = $modParametres->first();

            $nbinscriptionsmax = $parametres->NBMACHINES * $parametres->NBADHERENTSMACHINE;

            // redirige vers le planing si il n'y a pas la totalité des paramètres renseignés
            if ($heure == null)
            {
                return redirect()->to('../Planning');
            }

            $itostring =[1 => '01',2 => '02',3 => '03',4 => '04',5 => '05',6 => '06',7 => '07',8 => '08',9 => '09',10 => '10',11 => '11',12 => '12',13 => '13',14 => '14',15 => '15',16 => '16',17 => '17',18 => '18',19 => '19',20 => '20',21 => '21',22 => '22',23 => '23',24 => '24',25 => '25',26 => '26',27 => '27',28 => '28',29 => '29',30 => '30',31 => '31'];
            $mois = ['January' => 'Janvier', 'February' => 'Fevrier', 'March'  => 'Mars', 'April' => 'Avril', 'May' => 'Mai', 'June' => 'Juin', 'July' => 'Juillet', 'August' => 'Aout', 'September' => 'Septembre', 'October' => 'Octobre', 'November' => 'Novembre', 'December' => 'Decembre'];
            $days = ['Monday' => 'Lundi', 'Tuesday' => 'Mardi', 'Wednesday' => 'Mercredi', 'Thursday' => 'Jeudi', 'Friday' => 'Vendredi', 'Saturday' => 'Samedi', 'Sunday' => 'Dimanche'];
            $nodays = ['Monday' => 1, 'Tuesday' => 2, 'Wednesday' => 3, 'Thursday' => 4, 'Friday' => 5, 'Saturday' => 6, 'Sunday' => 7];
            date_default_timezone_set('Europe/Paris');
            $session = session();

            $modinscriptions = new ModeleS_Inscrire();
            $modsce_machine = new ModeleSeance_Machine();
            $modAbonnement = new ModeleAbonnement();
            $modSeance_Machine = new ModeleSeance_Machine();

            $data['TitreDeLaPage'] = 'EFP - Inscription';
            $data['prmdate'] = $date;
            $data['prmheure'] = $heure;
            $data['jour'] = $days[date('l', strtotime($date))];
            $data['date'] = date('d', strtotime($date));
            $data['mois'] = $mois[date('F', strtotime($date))];
            $data['annee'] = date('Y', strtotime($date));
            $data['heure'] = substr($heure, 0, 2);
            $data['minute'] = substr($heure, 3);
            $data['estinscrit'] = $modinscriptions->EstInscrit($date, $heure);
            $data['peutSeDesinscrire'] = null;
            $data['bouton'] = 'Date';
            $data['erreur'] = null;
            $data['ajouter'] = false;

            //si la date est passé
            if (date('Y-m-d H:m', strtotime($date.' '.$heure)) <= date('Y-m-d H:m'))
            {
                $data['erreur'] = 'passe';

                return view('Templates/Header', $data)
                . view('Client/vue_Inscription', $data)
                . view('Templates/Footer');
            }

            //si la séance n'existe pas
            if ($modSeance_Machine->SeanceExistante($nodays[date('l', strtotime($date))], $heure) == null || (date('F', strtotime($date)) == 'July' || date('F', strtotime($date)) == 'August'))
            {
                $data['erreur'] = 'innexistant';

                return view('Templates/Header', $data)
                . view('Client/vue_Inscription', $data)
                . view('Visiteur/vue_Connexion', $data)
                . view('Templates/Footer');
            }

            //si il n'y a plus de place pour cette séance
            if ($modinscriptions->GetNombreInscription($date, $heure) != null && $modinscriptions->GetNombreInscription($date, $heure)->NBINSCRIPTION == 8)
            {
                $data['erreur'] = 'places';

                return view('Templates/Header', $data)
                . view('Client/vue_Inscription', $data)
                . view('Visiteur/vue_Connexion', $data)
                . view('Templates/Footer');
            }

            $abonnementMachine = $modAbonnement->GetAbonnementMachine();

            //si la personneconnecter n'a pas d'abonnement machine
            if ($abonnementMachine == null)
            {
                $data['erreur'] = 'abonnement';

                return view('Templates/Header', $data)
                . view('Client/vue_Inscription', $data)
                . view('Visiteur/vue_Connexion', $data)
                . view('Templates/Footer');
            }

            $datefinabonnement = new DateTime(date('Y-m-d', strtotime($abonnementMachine->DATEDEBUT)));

            //si le dernier abonnement machine est expirer
            if ($datefinabonnement->modify('+'.$abonnementMachine->DUREE.'months')->format('Y-m-d') <= date('Y-m-d'))
            {
                $data['erreur'] = 'expire';

                return view('Templates/Header', $data)
                . view('Client/vue_Inscription', $data)
                . view('Visiteur/vue_Connexion', $data)
                . view('Templates/Footer');
            }

            //si il ne lui reste plus aucune seance disponible
            if ($abonnementMachine->NBSEANCESRESTANTES == 0)
            {
                $data['erreur'] = 'nbseances';

                return view('Templates/Header', $data)
                . view('Client/vue_Inscription', $data)
                . view('Visiteur/vue_Connexion', $data)
                . view('Templates/Footer');
            }

            //si la personne a appuyer sur 's'inscrire'
            if (isset($_POST['btnInscription']))
            {
                //si il y a c'est repeter
                if ($date != null && $this->request->getPost('datefin') != null)
                {
                    $data['bouton'] = 'Repeter';
            
                    $origin = new DateTime(date('Y-m-d', strtotime($date)));
                    $target = new DateTime(date('Y-m-d', strtotime($this->request->getPost('datefin'))));
                    $interval = $origin->diff($target);

                    if (strlen(($interval->format('%a')+1) / 7) > 1)
                    {
                        $nbinscription = substr((round(($interval->format('%a')+1) / 7, 1)), 0, 1) + 1;
                    }
                    else
                    {
                        $nbinscription = ($interval->format('%a')+1) / 7;
                    }

                    $origin = new DateTime(date('Y-m-d', strtotime($date)));

                    if ($abonnementMachine->NBSEANCESRESTANTES < $nbinscription)
                    {
                        $data['erreur'] = 'duree';

                        return view('Templates/Header', $data)
                        . view('Client/vue_Inscription', $data)
                        . view('Visiteur/vue_Connexion', $data)
                        . view('Templates/Footer');
                    }
                    else
                    {
                        if ($date < $this->request->getPost('datefin'))
                        {
                            for ($i = $origin; $i <= $target; $i->modify('+7 day'))
                            {
                                $places = $modinscriptions->GetNombreInscription($i->format('Y-m-d'), $heure);

                                if ($places == null || $places->NBINSCRIPTION < $nbinscriptionsmax)
                                {
                                    $data['seances'][] = ['le ' . $days[$i->format('l')] . ' ' . $i->format('d') . ' ' . $mois[$i->format('F')] . ' ' . $i->format('Y') . ' à ' . date('H', strtotime($heure)) . 'h' . date('i', strtotime($heure)), $i->format('Y-m-d'), $heure];
                                }
                            }

                            return view('Templates/Header', $data)
                            . view('Client/vue_Confirmation', $data)
                            . view('Visiteur/vue_Connexion', $data)
                            . view('Templates/Footer');
                        }
                        else
                        {
                            $data['erreur'] = 'dates';

                            return view('Templates/Header', $data)
                            . view('Client/vue_Inscription', $data)
                            . view('Visiteur/vue_Connexion', $data)
                            . view('Templates/Footer');
                        }
                    }
                }
                //si ce n'ai qu'une date fixe
                else
                {
                    $data['bouton'] = 'Date';

                    $estinscrit = $modinscriptions->EstInscrit($date, $heure);

                    if ($estinscrit == null)
                    {
                        $donneesAInserer = array(
                            'NOABONNEMENT' => $abonnementMachine->NOABONNEMENT,
                            'NOJOUR' => $nodays[date('l', strtotime($date))],
                            'HEUREDEBUTSEANCE' => $heure,
                            'DATESEANCE' => $date,
                        );

                        $modinscriptions->insert($donneesAInserer, false);
                    }
                    elseif ($estinscrit->DATEHEUREDESINSCRIPTION != null)
                    {
                        $condition = ['NOABONNEMENT'=>$abonnementMachine->NOABONNEMENT, 'DATESEANCE'=>$date];

                        $donneesAInserer = array(
                            'DATEHEUREDESINSCRIPTION' => NULL,
                        );

                        $modinscriptions
                        ->set($donneesAInserer)
                        ->where($condition)
                        ->like('HEUREDEBUTSEANCE', $heure)
                        ->update();
                    }

                    $condition = ['NOABONNEMENT'=>$abonnementMachine->NOABONNEMENT];

                    $donneesAInserer = array(
                        'NBSEANCESRESTANTES' => ($abonnementMachine->NBSEANCESRESTANTES - 1),
                    );

                    $modAbonnement
                    ->set($donneesAInserer)
                    ->where($condition)
                    ->update();
                }

                $data['estinscrit'] = 'now';

                return view('Templates/Header', $data)
                . view('Client/vue_Inscription', $data)
                . view('Visiteur/vue_Connexion', $data)
                . view('Templates/Footer');
            }

            $data['erreur'] = null;
            $data['estinscrit'] = $modinscriptions->EstInscrit($date, $heure);
            $data['ajouter'] = true;

            if (isset($_POST['btnRepeter']))
            {
                $data['bouton'] = 'Repeter';
            }
            elseif (isset($_POST['btnDate']))
            {
                $data['bouton'] = 'Date';
            }

            if ($data['estinscrit'] != null)
            {
                if ($data['estinscrit']->DATEHEUREDESINSCRIPTION == NULL)
                {
                    $origin = new DateTime(date('Y-m-d H:i'));
                    $target = new DateTime(date('Y-m-d H:i', strtotime($date.' '.$heure)));
                    $interval = $origin->diff($target);

                    if ($interval->format('%a') == 0)
                    {
                        $data['peutSeDesinscrire'] = false;
                    }
                    else
                    {
                        $data['peutSeDesinscrire'] = true;
                    }
                }
                else
                {
                    $data['estinscrit'] = null;
                }
            }

            return view('Templates/Header', $data)
            . view('Client/vue_Inscription', $data)
            . view('Visiteur/vue_Connexion', $data)
            . view('Templates/Footer');
        }

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        public function validerReservation()
        {
            $connexion = new Visiteur();
            $data['connexion'] = $connexion->Connexion();

            $nodays = ['Monday' => 1, 'Tuesday' => 2, 'Wednesday' => 3, 'Thursday' => 4, 'Friday' => 5, 'Saturday' => 6, 'Sunday' => 7];

            $data['TitreDeLaPage'] = 'Confirmation';
            $data['fonction'] = 'Confirmation';

            $modinscriptions = new ModeleS_Inscrire();
            $modAbonnement = new ModeleAbonnement();
            $seances = $this->request->getPost('seances');
            $data['seances'] = [];

            if (isset($_POST['btnAnnuler']))
            {
                return redirect()->to('../Planning');
            }
            elseif (isset($_POST['btnReserver']))
            {
                foreach ($seances as $laseance)
                {
                    $abonnementMachine = $modAbonnement->GetAbonnementMachine();
                    $estinscrit = $modinscriptions->EstInscrit($laseance, $this->request->getPost('heure'.$laseance));

                    if ($estinscrit == null)
                    {
                        $donneesAInserer = array(
                            'NOABONNEMENT' => $abonnementMachine->NOABONNEMENT,
                            'NOJOUR' => $nodays[date('l', strtotime($laseance))],
                            'HEUREDEBUTSEANCE' => $this->request->getPost('heure'.$laseance),
                            'DATESEANCE' => $laseance,
                        );

                        $modinscriptions->insert($donneesAInserer, false);
                    }
                    elseif ($estinscrit->DATEHEUREDESINSCRIPTION != null)
                    {
                        $condition = ['NOABONNEMENT'=>$abonnementMachine->NOABONNEMENT, 'DATESEANCE'=>$laseance];

                        $donneesAInserer = array(
                            'DATEHEUREDESINSCRIPTION' => NULL,
                        );

                        $modinscriptions
                        ->set($donneesAInserer)
                        ->where($condition)
                        ->like('HEUREDEBUTSEANCE', $this->request->getPost('heure'.$laseance))
                        ->update();
                    }

                    $condition = ['NOABONNEMENT'=>$abonnementMachine->NOABONNEMENT];

                    $donneesAInserer = array(
                        'NBSEANCESRESTANTES' => ($abonnementMachine->NBSEANCESRESTANTES - 1),
                    );

                    $modAbonnement
                    ->set($donneesAInserer)
                    ->where($condition)
                    ->update();
                }

                return redirect()->to('../Planning');
            }

            foreach ($seances as $laseance)
            {
                $seanceannuler = false;

                if (isset($_POST['value'.$laseance]))
                {
                    $seanceannuler = true;
                }

                if ($seanceannuler == false)
                {
                    $data['seances'][] = [$this->request->getPost($laseance), $laseance, $this->request->getPost('heure'.$laseance)];
                }
            }

            if ($data['seances'] == null)
            {
                return redirect()->to('../Planning');
            }
            elseif (!$this->request->is('post'))
            {
                return redirect()->to('../Planning');
            }

            return view('Templates/Header', $data)
            . view('Client/vue_Confirmation', $data)
            . view('Visiteur/vue_Connexion', $data)
            . view('Templates/Footer');
        }

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        public function abonnement()
        {
            $data['fonction'] = 'Abonnements';
            $session = session();
            $connexion = new Visiteur();
            $data['connexion'] = $connexion->Connexion();

            $data['TitreDeLaPage'] = 'Mes abonnement';

            $modAbonnement = new ModeleAbonnement();
            $data['lesAbonnements'] = $modAbonnement->GetInfoAbonnement();

            return view('Templates/Header', $data)
            . view('Client/vue_abonnements', $data)
            . view('Visiteur/vue_Connexion', $data)
            . view('Templates/Footer');
        }
    }
?>