<div class="col-8">
    <div class="w-75 band mx-auto pt-5">
        <h1 class="nav-space text-center mb-5 pb-5 dark-text"> Mes abonnements :  </h1>
        <div class="d-flex justify-content-center">
            <?php
            $session = session();

                foreach ($lesAbonnements as $unAbonnement)
                {
                    $datefin = new DateTime($unAbonnement->DATEDEBUT);
                    $datefin->modify('+' . $unAbonnement->DUREE . 'month')->modify('+' . $unAbonnement->JOURSADDITIONNELS . 'day');

                    if ($datefin > date('Y-m-d'))
                    {
                        echo '<div class="carte medium-carte-size bg-orange me-4">',
                            '<h3 class="text text-center mt-3"> ' . $unAbonnement->LIBELLE . ' </h3>',

                            '<h4 class="ms-2 text mt-5"> du : ' . $unAbonnement->DATEDEBUT . '</h4>',

                            '<h4 class="ms-2 text mt-4"> se termine le ' . $datefin->format('Y-m-d') . '</h4>';

                            if ($unAbonnement->NBSEANCESRESTANTES == null)
                            {
                                echo '<h5 class="text ms-2 mt-4"> il me reste autant de séances que je souhaite </h5>';
                            }
                            else
                            {
                                echo '<h5 class="text ms-2 mt-4"> il me reste ' . $unAbonnement->NBSEANCESRESTANTES . ' séance(s) </h5>';
                            }
                        echo '</div>';
                    }
                }
            
        echo '</div>',
        '<a href="../Planning/' . $session->get('dateplanning') . '" class="text-center mt-5 pt-2">',
            '<button type="submit" class="btn-big btn-orange">',
                '<h4>',
                    'retour au planning',
                '</h4>',
            '</button>',
        '</a>';
        ?>
    </div>
</div>