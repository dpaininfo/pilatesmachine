<div class="col-8">
    <div class="w-75 band mx-auto pt-5">
        <h1 class="nav-space text-center mb-5 pb-5 dark-text"> Réservation </h1>
    

    <?php
    date_default_timezone_set('Europe/Paris');

    if ($bouton == 'Date')
    {
        echo '<div class="container text-center px-2 align-self-center">',
                '<h2 class="mb-5 dark-text">' . "Je réserve le : </h2>",
            '</div>',

            '<div class="w-50 mx-auto mb-5">',
                '<h3 class="dark-text">' . $jour . ' ' . $date . ' ' . $mois .' à ' . $heure . 'h' . $minute . '.</h3>',
            '</div>';

            echo'<div class="mx-auto text-center"> ';
    }
    else
    {
        echo '<div class="container text-center px-2 align-self-center">',
                '<h2 class="mb-5 dark-text">' . "Je réserve le : </h2>",
            '</div>',

            '<div class="w-50 mx-auto mb-5">',
                '<h3 class="dark-text">' . $jour . ' ' . $date . ' ' . $mois .' à ' . $heure . 'h' . $minute . '</h3>',
            '</div>',
            
            form_open('Reservation/'.$prmdate.'/'.$prmheure),
                    csrf_field(),

                '<div class="d-flex justify-content-center mb-5">',
                    "<h2 class='dark-text'> et tous les " . $jour . " jusqu'au ",
                    '<input type="date" name="datefin">',
                '</div>';

        echo '<div class="mx-auto text-center"> '; 
    }
    
    if (!is_null($erreur))
    {

        if ($erreur == 'abonnement')
        {
            // echo '<div>',
            //     '<h2>',
                    $msg= 'Vous devez être abonné pour réserver';
            //         'pas dans les 24h avant le debut de la séance',
            //     '</h2>',
            // '</div>';
        }
        elseif ($erreur == 'expire')
        {
            // echo '<div>',
            //     '<h2>',
            //         'Il semblerait que votre dernier abonnement soit expiré. Pour pouvoir vous inscrire à une séance Pilates Machines, vous devez adhérer à un abonnement Machines',
                    $msg='Votre abonnement a expiré.';
            //     '</h2>',
            // '</div>';
        }
        elseif ($erreur == 'passe')
        {
            // echo '<div>',
            //     '<h2>',
            //         'Vous ne pouvez pas vous inscrire à une date déjâ passé',
                    $msg='Vous ne pouvez pas vous inscrire à une date déjâ passée';
            //     '</h2>',
            // '</div>';

        }
        elseif ($erreur == 'innexistant')
        {
            // echo '<div>',
            //     '<h2>',
            //         'Cette séance est innéxistante, veuillez choisir une séance valable a la bonne date et la bonne heure',
                    $msg='Cette séance n\'existe plus';
            //     '</h2>',
            // '</div>';
        }
        elseif ($erreur == 'nbseances')
        {
            // echo '<div>',
            //     '<h2>',
            //         'Vous avez atteint votre nombre de séance Maximum, vous ne pouvez plus vous inscrire',
                    $msg= 'Vous avez épuisé votre nombre de séances, vous ne pouvez plus vous inscrire';
            //     '</h2>',
            // '</div>';
        }
        elseif ($erreur == 'duree')
        {
            // echo '<div>',
            //     '<h2>',
            //         "Vous n'avez pas assez de séances restantes sur votre abonnement",
                    $msg= "Vous n'avez pas assez de séances restantes sur votre abonnement";
            //     '</h2>',
            // '</div>';
        
        }
        echo '<div class="modal fade" id="myModal" data-bs-backdrop="false">',
            '<div class="modal-dialog">',
                '<div class="modal-content bg-white-orange">',
    
                    '<div class="modal-header white">',
                        '<h4 class="modal-title dark-text text-center">Attention !</h4>',
                        '<button type="button" class="btn-close" data-bs-dismiss="modal"></button>',
                    '</div>',
    
                    '<div class="modal-body white">',
                        '<div class="alert alert-danger mt-3 ms-3 me-3">',
                            $msg,
                        '</div>',
                    '</div>',
    
                    '<div class="modal-footer white">',
                        '<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>',
                    '</div>',
    
                '</div>',
            '</div>',
        '</div>';
    }
    else
    {
        if ($bouton == 'Date')
        {
            if ($estinscrit == null)
            {
                echo form_open('Reservation/' . $prmdate . '/' . $prmheure),
                    csrf_field(),
                        '<button name="btnRepeter" type="submit" class="nav-item btn-orange me-5"> ',
                            '<h4> ',
                                '<svg width="32" height="32" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-repeat pe-2" viewBox="0 0 16 16"> ',
                                    '<path d="M11 5.466V4H5a4 4 0 0 0-3.584 5.777.5.5 0 1 1-.896.446A5 5 0 0 1 5 3h6V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192m3.81.086a.5.5 0 0 1 .67.225A5 5 0 0 1 11 13H5v1.466a.25.25 0 0 1-.41.192l-2.36-1.966a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V12h6a4 4 0 0 0 3.585-5.777.5.5 0 0 1 .225-.67Z"/>',
                                ' </svg>',
                                'Répéter',
                            ' </h4>',
                        ' </button>',
                        '<button name="btnInscription" type="submit" class="nav-item btn-orange"> ',
                            '<h4> ',
                                "s'inscrire",
                            ' </h4>',
                        ' </button>';
            }
            elseif ($estinscrit == 'now')
            {
                echo '<h4 class="dark-text"> ',
                    'Réservation effectuée !',
                ' </h4>';
            }
            else
            {
                echo '<h4 class="dark-text"> Vous êtes déjà inscrit à cette séance. </h4>';
            //    echo '<h4 class="dark-text"> ',
            //        'Vous êtes déjà inscrit à cette séance. <br/> Allez sur la page de désinscription pour vous désinscrire ' . "d'une" . ' ou plusieurs séance',
            //    ' </h4>';
                echo form_open('Reservation/' . $prmdate . '/' . $prmheure),
                    csrf_field();
            }
        }
        else
        {

            echo '<button name="btnDate" type="submit" class="nav-item btn-orange mx-auto me-5"> ',
                '<h4> ',
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pin" viewBox="0 0 16 16"> ',
                        '<path d="M4.146.146A.5.5 0 0 1 4.5 0h7a.5.5 0 0 1 .5.5c0 .68-.342 1.174-.646 1.479-.126.125-.25.224-.354.298v4.431l.078.048c.203.127.476.314.751.555C12.36 7.775 13 8.527 13 9.5a.5.5 0 0 1-.5.5h-4v4.5c0 .276-.224 1.5-.5 1.5s-.5-1.224-.5-1.5V10h-4a.5.5 0 0 1-.5-.5c0-.973.64-1.725 1.17-2.189A6 6 0 0 1 5 6.708V2.277a3 3 0 0 1-.354-.298C4.342 1.674 4 1.179 4 .5a.5.5 0 0 1 .146-.354m1.58 1.408-.002-.001zm-.002-.001.002.001A.5.5 0 0 1 6 2v5a.5.5 0 0 1-.276.447h-.002l-.012.007-.054.03a5 5 0 0 0-.827.58c-.318.278-.585.596-.725.936h7.792c-.14-.34-.407-.658-.725-.936a5 5 0 0 0-.881-.61l-.012-.006h-.002A.5.5 0 0 1 10 7V2a.5.5 0 0 1 .295-.458 1.8 1.8 0 0 0 .351-.271c.08-.08.155-.17.214-.271H5.14q.091.15.214.271a1.8 1.8 0 0 0 .37.282"/>',
                    ' </svg>',
                    'Date',
                ' </h4>',
            ' </button>',
            '<button name="btnInscription" type="submit" class="nav-item btn-orange"> ',
                '<h4> ',
                    "Réserver",
                ' </h4>',
            ' </button>';
        }
    }

    echo form_close(),
            ' </div>';
    ?>
    </div>
</div>