<div class="col-8">
    <?php

    // ---------------------- erreur connexion --------------------------------------
        if ($erreur == 'Connexion')
        {
            echo '<div class="modal fade" id="myModal" data-bs-backdrop="false">',
                '<div class="modal-dialog">',
                    '<div class="modal-content bg-white-orange">',

                        '<div class="modal-header white">',
                            '<h4 class="modal-title dark-text text-center">Attention !</h4>',
                            '<button type="button" class="btn-close" data-bs-dismiss="modal"></button>',
                        '</div>',

                        '<div class="modal-body white">',
                            '<div class="alert alert-danger mt-3 ms-3 me-3">',
                                'Connectez-vous pour vous inscrire.',
                            '</div>',
                        '</div>',

                        '<div class="modal-footer white">',
                            '<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>',
                        '</div>',

                    '</div>',
                '</div>',
            '</div>';
        }
    // ---------------------- fin erreur connexion --------------------------------------
        include '../public/tools/Calendar.php';
        //include base_url() . '/tools/Calendar.php';
        
        date_default_timezone_set('Europe/Paris');
                    
        $days = ['Monday' => 1, 'Tuesday' => 2, 'Wednesday' => 3, 'Thursday' => 4, 'Friday' => 5, 'Saturday' => 6, 'Sunday' => 7];
        $num_days = date('t', strtotime(date('d', strtotime($date->format('Y-m-d'))) . '-' . date('m', strtotime($date->format('Y-m-d'))) . '-' . date('Y', strtotime($date->format('Y-m-d')))));
        $first_day_of_week = array_search(date('D', strtotime(date('Y', strtotime($date->format('Y-m-d'))) . '-' . date('m', strtotime($date->format('Y-m-d'))) . '-1')), $days);

        $itostring =[1 => '01',2 => '02',3 => '03',4 => '04',5 => '05',6 => '06',7 => '07',8 => '08',9 => '09',10 => '10',11 => '11',12 => '12',13 => '13',14 => '14',15 => '15',16 => '16',17 => '17',18 => '18',19 => '19',20 => '20',21 => '21',22 => '22',23 => '23',24 => '24',25 => '25',26 => '26',27 => '27',28 => '28',29 => '29',30 => '30',31 => '31'];

        echo '<div class="band">';

        $calendar = new Calendar($date->format('Y-m'));

        if ($lesPlaces != null)
        {
            for ($i = 1; $i <= $num_days; $i++)
            {
                if (date('l', strtotime($date->format('Y-m-').$i)) == 'Saturday' || date('l', strtotime($date->format('Y-m-').$i)) == 'Sunday')
                {
                    $calendar->add_event('Fermé', $date->format('Y-m-').$i, 1, 'grey');
                }
                elseif(date('F', strtotime($date->format('Y-m-').$i)) == 'July' || date('F', strtotime($date->format('Y-m-').$i)) == 'August')
                {
                    $calendar->add_event('Fermé', $date->format('Y-m-').$i, 1, 'grey');
                }
                else
                {
                    foreach ($heureJours as $heure)
                    {
                        if ($heure->NOJOUR == $days[date('l', strtotime($date->format('Y-m-').$itostring[$i]))])
                        {
                            if ($date->format('Y-m-').$itostring[$i].' '.$heure->HEUREDEBUTSEANCE < date('Y-m-d h:m:s'))
                            {
                                $calendar->add_event('passé', $date->format('Y-m-').$i, 1, 'grey');
                            }
                            else
                            {
                                $ajouter = false;
                                $prochaineseance = null;

                                foreach($lesPlaces as $laSeance)
                                {   
                                    if ($laSeance->HEUREDEBUTSEANCE == $heure->HEUREDEBUTSEANCE)
                                    {
                                        $jour = null;
                                        $nbinscription = null;
                                        $ladate = null;
                                        $heureseance = null;

                                        $jour = substr($laSeance->DATESEANCE, 8);

                                        if ($prochaineseance == $laSeance->HEUREDEBUTSEANCE)
                                        {
                                            $prochaineseance = null;
                                        }

                                        if ($jour == $itostring[$i])
                                        {
                                            $nbinscription = $laSeance->NBINSCRIPTION;
                                            $ladate = $laSeance->DATESEANCE;
                                            $heureseance = substr($laSeance->HEUREDEBUTSEANCE, 0, -3);
                                        }

                                        if ($nbinscription != null)
                                        {
                                            if ($nbinscription == $nbinscriptionsmax)
                                            {
                                                $calendar->add_event($heureseance.' : Aucune place', $ladate, 1, 'red');
                                            }
                                            else
                                            {
                                                $calendar->add_event($heureseance.' : Libre', $ladate, 1, 'green');
                                            }
                                            $ajouter = true;
                                        }
                                        else
                                        {
                                            $calendar->add_event($heureseance.' : Libre', $ladate, 1, 'green');
                                        }
                                    }
                                    else
                                    {
                                        $prochaineseance = substr($heure->HEUREDEBUTSEANCE, 0, -3);
                                    }
                                }
                                if ($ajouter == false)
                                {
                                    $calendar->add_event(substr($heure->HEUREDEBUTSEANCE, 0, -3). ' : Libre', $date->format('Y-m-').$i, 1, 'green');
                                }
                            }
                        }
                    }
                }
            }
        }
        else
        {
            for ($i = 1; $i <= $num_days; $i++)
            {
                if ($date->format('Y-m-').$itostring[$i] < date('Y-m-d'))
                {
                    $calendar->add_event('passé', $date->format('Y-m-').$i, 1, 'grey');
                }
                else
                {
                    if (date('l', strtotime($date->format('Y-m-').$i)) == 'Saturday' || date('l', strtotime($date->format('Y-m-').$i)) == 'Sunday')
                    {
                        $calendar->add_event('Fermé', $date->format('Y-m-').$i, 1, 'grey');
                    }
                    elseif(date('F', strtotime($date->format('Y-m-').$i)) == 'July' || date('F', strtotime($date->format('Y-m-').$i)) == 'August')
                    {
                        $calendar->add_event('Fermé', $date->format('Y-m-').$i, 1, 'grey');
                    }
                    else
                    {
                        foreach ($heureJours as $heure)
                        {
                            if ($heure->NOJOUR == $days[date('l', strtotime($date->format('Y-m-').$i))])
                            {
                                $calendar->add_event(substr($heure->HEUREDEBUTSEANCE, 0, -3).' : libre', $date->format('Y-m-').$i, 1, 'green');
                            }
                        }
                    }
                }
            }
        }

        echo $calendar,
        '</div>',
        '</div>';
    ?>

    <script type="text/javascript">
        var myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
        myModal.toggle()
    </script>

</div>