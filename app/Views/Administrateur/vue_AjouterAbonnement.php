<div class="container nav-space mx-auto bg-light-orange pt-4 band-top border-orange">
    <h1 class="text-center pb-2">nouvel adhésion</h1>
    <?php
        if ($erreur == 'Saisie')
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
                                'Merci de remplir tous les champs.',
                            '</div>',
                        '</div>',
        
                        '<div class="modal-footer white">',
                            '<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>',
                        '</div>',
        
                    '</div>',
                '</div>',
            '</div>';
        }
        elseif ($erreur == 'Innexistant')
        {
            echo form_open('Abonnement'),
                csrf_field(),
                '<div class="modal fade" id="myModal" data-bs-backdrop="false">',
                    '<div class="modal-dialog">',
                        '<div class="modal-content bg-white-orange">',
            
                            '<div class="modal-header white">',
                                '<h4 class="modal-title dark-text text-center">Attention !</h4>',
                                '<button type="button" class="btn-close" data-bs-dismiss="modal"></button>',
                            '</div>',
        
                            '<div class="modal-body white">',
                                '<div class="alert alert-danger mt-3 ms-3 me-3">',
                                    'Adhérent inexistant.',
                                '</div>',
                            '</div>',
        
                            '<div class="modal-footer white">',
                                '<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>',
                            '</div>',
        
                        '</div>',
                    '</div>',
                '</div>';
            form_close();
        }
        elseif ($etape == 'ValidationAbonnement')
        {
            echo form_open('Abonnement'),
                csrf_field(),
                '<div class="modal fade" id="myModal" data-bs-backdrop="false">',
                    '<div class="modal-dialog">',
                        '<div class="modal-content bg-white-orange">',
        
                            '<div class="modal-header white">',
                                '<h4 class="modal-title dark-text text-center">On resume !</h4>',
                                '<button type="button" class="btn-close" data-bs-dismiss="modal"></button>',
                            '</div>',
        
                            '<div class="modal-body white">',
                                '<div class="mt-3 ms-3 me-3">',
                                    '<h5 class="dark-text">' . $prmadherent . ' a adhéré(e) à un abonnement ' . $nomforfait . '. Cet abonnement débutera le ' . $prmdate . ". C'est " . 'bien ça ? </h5>',
                                '</div>',
                            '</div>',
        
                            '<div class="modal-footer white">',
                                form_input('txtAdherent', $prmadherent, 'hidden'),
                                form_input('txtForfait', $prmforfait, 'hidden'),
                                form_input('txtDate', $prmdate, 'hidden'),
                                form_submit('btnPoster', "Ajouter", "class='btn-orange'"),
                                '<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>',
                            '</div>',
        
                        '</div>',
                    '</div>',
                '</div>';
            form_close();
        }
        elseif ($etape == 'PosterAbonnement')
        {
            echo form_open('Abonnement'),
                csrf_field(),
                '<div class="modal fade" id="myModal" data-bs-backdrop="false">',
                    '<div class="modal-dialog">',
                        '<div class="modal-content bg-white-orange">',
            
                            '<div class="modal-header white">',
                                '<h4 class="modal-title dark-text text-center">Merci ' . $prmadherent . ' ! </h4>',
                                '<button type="button" class="btn-close" data-bs-dismiss="modal"></button>',
                            '</div>',
        
                            '<div class="modal-body white">',
                                '<div class="alert alert-success mt-3 ms-3 me-3">',
                                    '<strong>Abonnement ajouter ! </strong>' . $prmadherent . ' a adhéré(e) à un abonnement ' . $nomforfait . '. </h5>',
                                '</div>',
                            '</div>',
        
                            '<div class="modal-footer white">',
                                '<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>',
                            '</div>',
        
                        '</div>',
                    '</div>',
                '</div>';
            form_close();
        }
        elseif ($etape == 'ValidationTemps')
        {
            echo form_open('JoursAdditionnels'),
                csrf_field(),
                '<div class="modal fade" id="myModal" data-bs-backdrop="false">',
                    '<div class="modal-dialog">',
                        '<div class="modal-content bg-white-orange">',
        
                            '<div class="modal-header white">',
                                '<h4 class="modal-title dark-text text-center">On resume !</h4>',
                                '<button type="button" class="btn-close" data-bs-dismiss="modal"></button>',
                            '</div>',
        
                            '<div class="modal-body white">',
                                '<div class="mt-3 ms-3 me-3">',
                                    '<h5 class="dark-text"> Je souhaite laisser ' . $nombreJours . ' supplémentaire à ' . $prmadherent . '. Son abonnement se terminera donc le ' . $datefin . '. </h5>',
                                '</div>',
                            '</div>',
        
                            '<div class="modal-footer white">',
                                form_input('txtAdherent', $prmadherent, 'hidden'),
                                form_input('txtJoursAdditionnels', $nombreJours, 'hidden'),
                                form_submit('btnPoster', "Ajouter", "class='btn-orange'"),
                                '<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>',
                            '</div>',
        
                        '</div>',
                    '</div>',
                '</div>';
            form_close();
        }
        elseif ($etape == 'PosterTemps')
        {
            echo form_open('JoursAdditionnels'),
                csrf_field(),
                '<div class="modal fade" id="myModal" data-bs-backdrop="false">',
                    '<div class="modal-dialog">',
                        '<div class="modal-content bg-white-orange">',
            
                            '<div class="modal-header white">',
                                '<h4 class="modal-title dark-text text-center">Voici pou toi ' . $prmadherent . ' ! </h4>',
                                '<button type="button" class="btn-close" data-bs-dismiss="modal"></button>',
                            '</div>',
        
                            '<div class="modal-body white">',
                                '<div class="alert alert-success mt-3 ms-3 me-3">',
                                    '<strong>Abonnement ajouter ! </strong>' . $prmadherent . ' a reçu ' . $nombreJours . '. </h5>',
                                '</div>',
                            '</div>',
        
                            '<div class="modal-footer white">',
                                '<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>',
                            '</div>',
        
                        '</div>',
                    '</div>',
                '</div>';
            form_close();
        }

        echo form_open('Abonnement'),
            csrf_field(),

            '<div class="d-flex justify-content-evenly mt-4">',

                '<div class="form-size">',

                    '<h4 class="text-center">adhérent :</h4>',
                    '<input type="text" class="form form-control" list="adherents" aria-label="choisissez un adherent" name="adherent"/>',
                    '<datalist id="adherents">';

                        foreach ($adherents as $adherent)
                        {
                            echo '<option value="' . $adherent->PRENOM . ' ' . $adherent->NOM . '"/>';
                        }

                    echo '</datalist>',

                '</div>',

                '<div class="form-size">',
                    '<h4 class="text-center">Forfait :</h4>',
                    '<select class="form-select" aria-label="choisissez un forfait" name="forfait">';

                        foreach ($forfaits as $forfait)
                        {
                            echo '<option value="' . $forfait->NOFORFAIT . ' ' . $forfait->NBSEANCES . '">' . $forfait->LIBELLEFORFAIT . '</option>';
                        }

                    echo '</select>',
                '</div>',
            '</div>',

            '<div class="d-flex justify-content-evenly mt-5 pt-5">',

                '<div class="form-size">',
                    '<h4 class="text-center">date de début :</h4>',
                    '<input name="datedebut" type="date" class="form-control">',
                '</div>',

                '<div class="mt-4 pt-3 ps-5 form-size">',
                    form_submit('btnValider', "Valider", "class='btn-orange'"),
                '</div>',

            '</div>',

        form_close();
    ?>
</div>

<div class="container band-bottom mx-auto bg-light-orange border-orange pt-4">
    <h1 class="text-center mb-2 pb-3">Ajouter du temps aditionnel</h1>
    <?php
        // echo form_open('JoursAdditionnels'),
        //     csrf_field(),

        //     '<div class="d-flex justify-content-evenly">',

        //         '<div class="form-size">',

        //             '<h4 class="text-center">adhérent :</h4>',
        //             '<input type="text" class="form form-control" list="adherents" aria-label="choisissez un adherent" name="tempsAdherents" value="' . $prmTempsAdherents . '" />',
        //             '<datalist id="adherents">';

        //                 foreach ($adherents as $adherent)
        //                 {
        //                     echo '<option value="' . $adherent->PRENOM . ' ' . $adherent->NOM . '"/>';
        //                 }

        //             echo '</datalist>',

        //         '</div>',

        //         '<div class="form-size pt-4">',
        //             form_submit('btnRechercher', 'Rechercher', 'class="btn-orange"'),
        //         '</div>',
        //     '</div>';

        //     if ($etape == 'abonnements')
        //     {
        //         echo '<div class="d-flex justify-content-evenly mt-5 pt-4">',
                
        //             '<div class="text-center">',
        //                 '<h5> Jours Supplémentaires : </h5>',
        //                 form_input('txtJourSup', '', 'class="form-control form-size"'),
        //             '</div>',

        //             '<div class="form-size align-self-center">',
        //                 '<select class="form-select" aria-label="choisissez un abonnement" name="abonnement">';

        //                 foreach ($lesAbonnements as $unAbonnement)
        //                 {
        //                     $origin = new DateTime(date('Y-m-d', strtotime($unAbonnement->DATEDEBUT)));
        //                     $datefin = $origin->modify('+'.($unAbonnement->JOURSADDITIONNELS).' day')->format('Y-m-d');
        //                     $datefin = $origin->modify('+'.$unAbonnement->DUREE.' month')->format('Y-m-d');

        //                     if (date('Y-m-d', strtotime($datefin)) > date('Y-m-d'))
        //                     {
        //                         echo '<option value="' . $unAbonnement->NOABONNEMENT . ' ' . $unAbonnement->LIBELLE . '"/>';
        //                     }
        //                 }

        //                 echo '</select>',
        //             '</div>',

        //             '<div class="form-size align-self-center">',
        //                 form_submit('btnValider', 'Valider', 'class="btn-orange"'),
        //             '</div>',
        //         '</div>';
        //     }
        //     else
        //     {
        //         echo form_input('abonnement', $prmAbonnement, 'hidden'),
        //         form_input('txtJoursAdditionnels', $prmJoursAdditionnels, 'hidden');
        //     }

        // echo form_close();
    ?>
</div>

<script type="text/javascript">
    var myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
    myModal.toggle()
</script>