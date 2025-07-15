<div class="col-8">
    <div class="w-75 band mx-auto pt-5">
        <h1 class="nav-space text-center mb-5 pb-5 dark-text"> Mon compte :  </h1>

        <div class="carte giant-carte-size bg-orange mx-auto">
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
                                        'Vous devez remplir tous les champs.',
                                    '</div>',
                                '</div>',

                                '<div class="modal-footer white">',
                                    '<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>',
                                '</div>',

                            '</div>',
                        '</div>',
                    '</div>'; 
                }

                $session = session();

                echo form_open('ModifierCompte'),
                    csrf_field(),
                    '<h2 class=" mt-3 ms-5 ps-5 text"> ' . $session->get('prenom') . ' ' . $session->get('nom') . '</h2>',
                    '<h4 class="ms-3 mt-4 text"> né(e) le ' . $session->get('datenaissance') . '</h4>',
                    '<div class="big-form-size"> <input type="text" name="txtadresse" class="ms-3 mt-4 form-control" value="' . $session->get('adresse') . '" placeholder="adresse" /> </div>',
                    '<div class="d-flex ms-3 mt-4"> <div class="form-size me-3"> <input type="text" name="txtcodepostal" class=" form-control" value="' . $session->get('codepostal') . '" placeholder="Code Postal" /> </div> <div class="form-size"> <input type="text" name="txtville" class="form-control" value="' . $session->get('ville') . '" placeholder="Ville" /> </div> </div>',
                    '<div class="big-form-size"> <input type="text" name="txttel" class="ms-3 mt-4 form-control" value="' . $session->get('tel') . '" placeholder="N° Téléphone" /> </div>',
                    '<div class="big-form-size"> <input type="text" name="txtemail" class="ms-3 mt-4 form-control" value="' . $session->get('email') . '" placeholder="Adresse Email" /> </div>',

                    '<div class="mt-5 pt-2 d-flex justify-content-evenly">',

                        '<div>',
                        
                            '<div class="mt-4 text-center">',
                                '<button name="btnPoster" class="btn-big btn-white-orange"> <h4> Valider </h4> </button>',
                            '</div>',
                        form_close(),
                    '</div>',

                    '<div>',
                        form_open('Compte'),
                            csrf_field(),
                            '<div class="mt-4 text-center">',
                                '<button name="btnAnnuler" class="btn-big btn-white-orange"> <h4> Annuler </h4> </button>',
                            '</div>',
                        form_close(),
                    '</div>',

                '</div>';
            ?>

            <script type="text/javascript">
                var myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
                myModal.toggle()
            </script>

        </div>

    </div>
</div>