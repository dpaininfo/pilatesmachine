<div class="col-8">
    <div class="w-75 band mx-auto pt-5">
        <h1 class="nav-space text-center mb-5 pb-5 dark-text"> Mon compte :  </h1>

        <div class="carte giant-carte-size bg-orange mx-auto">
            <?php
                if ($modifie == true)
                {
                    echo '<div class="modal fade" id="myModal" data-bs-backdrop="false">',
                        '<div class="modal-dialog">',
                            '<div class="modal-content bg-white-orange">',

                                '<div class="modal-header white">',
                                    '<h4 class="modal-title dark-text text-center">' . "C'est dans la boîte" . '</h4>',
                                    '<button type="button" class="btn-close" data-bs-dismiss="modal"></button>',
                                '</div>',

                                '<div class="modal-body white">',
                                    '<div class="alert alert-success mt-3 ms-3 me-3">',
                                        'Votre compte a bien été modifié.',
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

                echo '<h2 class=" mt-3 ms-5 ps-5 text"> ' . $session->get('prenom') . ' ' . $session->get('nom') . '</h2>',
                '<h4 class="ms-3 mt-4 text"> né(e) le ' . $session->get('datenaissance') . '</h4>',
                '<h4 class="ms-3 mt-4 text"> ' . $session->get('adresse') . '</h4>',
                '<h4 class="ms-3 mt-4 text"> ' . $session->get('codepostal') . ' ' . $session->get('ville') . '</h4>',
                '<h4 class="ms-3 mt-4 text"> ' . $session->get('tel') . '</h4>',
                '<h4 class="ms-3 mt-4 text"> ' . $session->get('email') . '</h4>',

                '<div class="mt-5 pt-2 d-flex justify-content-evenly">',

                    '<div>',
                        form_open('ModifierCompte'),
                            csrf_field(),
                            '<div class="mt-4 text-center">',
                                '<button name="btnModifier" class="btn-big btn-white-orange"> <h4> Modifier </h4> </button>',
                            '</div>',
                        form_close(),
                    '</div>',

                    '<div>',
                        form_open('NouveauMotDePasse'),
                            csrf_field(),
                            '<div class="mt-4 text-center">',
                                '<button name="" class="btn-big btn-white-orange"> <h4> Modifier le mot de passe </h4> </button>',
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