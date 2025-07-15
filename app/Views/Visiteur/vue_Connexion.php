<div class="col-4">
  <div class="nav-space mt-5 mx-auto band bg-light-orange">

    <?php
      $session = session();

      if (is_null($session->get('email')))
      {

        //----------------------------------------- erreur de saisie ---------------------------------------
        if ($connexion['erreur'] == 'Saisie')
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
                    'Veuillez remplir tous les champs.',
                  '</div>',
                '</div>',

                '<div class="modal-footer white">',
                  '<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>',
                '</div>',

              '</div>',
            '</div>',
          '</div>'; 
        }
        elseif ($connexion['erreur'] == 'Inconnu')
        {

         //----------------------------------------- inconnu dans la base ---------------------------------------
          echo '<div class="modal fade" id="myModal" data-bs-backdrop="false">',
            '<div class="modal-dialog">',
              '<div class="modal-content">',

                '<div class="modal-header white">',
                  '<h4 class="modal-title dark-text text-center">Attention !</h4>',
                  '<button type="button" class="btn-close" data-bs-dismiss="modal"></button>',
                '</div>',

                '<div class="modal-body white">',
                  '<div class="alert alert-danger mt-3 ms-3 me-3">',
                    'Mot de passe ou adresse e-mail  incorrects.',
                  '</div>',
                '</div>',

                '<div class="modal-footer white">',
                  '<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>',
                '</div>',

              '</div>',
            '</div>',
          '</div>';
        }

        //------------------------------------- formulaire d'authentification ---------------------------------------
        echo '<div class="mx-auto my-auto carte carte-size bg-orange">',
          form_open($fonction),
            csrf_field(),

            '<div class="form-size mt-5 pt-3 mb-5 pb-5 mx-auto">',
              '<h4 class="text text-center"> Email </h4>',
              form_input('txtEmail', set_value('txtEmail'), 'class="form-control"'),
            '</div>',

            '<div class="form-size mx-auto">',
              '<h4 class="text text-center"> Mot de passe </h4>',
              form_password('txtMDP', '', 'class="form-control" id="myInput"'),
              '<input type="checkbox" onclick="myFunction()">voir le mot de passe',
            '</div>',

            '<div class="mt-5 pt-5 text-center">',
              '<button name="btnConnexion" class="btn-big btn-white-orange"> <h3> Se connecter </h3> </button>',
            '</div>',

            '<div class="mt-5 pt-3 text-center">',
              '<a href="../MotDePasseOublie" class="justify-content-center"> mot de passe oublié</a>',
            '</div>',

          form_close(),
        '</div>';
      }
      else
      {

        //----------------------------------------- connexion réussie  ---------------------------------------    
        echo '<div class="mx-auto my-auto carte carte-size bg-orange">',
          '<h1 class="text text-center pt-3"> Bienvenue </h1>',
          '<h4 class="text text-center mt-4 mb-5"> Bonjour ' . $session->get('prenom') . ' !</h4>',

          form_open('Compte'),
            csrf_field(),
            '<div class="text-center">',
              '<button name="btnCompte" class="btn-big btn-white-orange"> <h4> Mon compte </h4> </button>',
            '</div>',
          form_close(),
            
          form_open('PageReservation'),
            csrf_field(),
            '<div class="mt-4 text-center">',
              '<button name="btnReservation" class="btn-big btn-white-orange"> <h4> Mes réservations </h4> </button>',
            '</div>',
          form_close(),

          form_open('Abonnements'),
            csrf_field(),
            '<div class="mt-4 text-center">',
              '<button name="" class="btn-big btn-white-orange"> <h4> Mes abonnements </h4> </button>',
            '</div>',
          form_close(),

          form_open($fonction),
            csrf_field(),
            '<div class="mt-4 text-center">',
              '<button name="btnDeconnection" class="btn-big btn-white-orange"> <h5> Se Déconnecter </h5> </button>',
            '</div>',
          form_close(),

        '</div>';
      }
    ?>

    <script type="text/javascript">
      var myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
      myModal.toggle()

      function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password")
        {
          x.type = "text";
        }
        else
        {
          x.type = "password";
        }
      }
    </script>

  </div>
</div>