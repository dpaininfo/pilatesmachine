<div class="col-8">
<div class="nav-space mt-5 container mx-auto band bg-light-orange">

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
    elseif ($erreur == 'MDP')
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
                'Les deux mots de passe doivent être identiques',
              '</div>',
            '</div>',

            '<div class="modal-footer white">',
              '<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>',
            '</div>',

          '</div>',
        '</div>',
      '</div>';
    }
  ?>

  <script type="text/javascript">
    var myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
    myModal.toggle()
  </script>

  <div class="mx-auto my-auto carte big-carte-size bg-orange">
    <?php
      echo form_open('NouveauMotDePasse'),
        csrf_field(),
        '<div class="form-size mx-auto mt-3">',
          '<h4 class="text text-center"> Mot de passe </h4>',
            form_password('txtMDP', '', 'class="form-control" id="myInput"'),
          '<input type="checkbox" onclick="myFunction()">voir le mot de passe',
        '</div>',

        '<div class="form-size mx-auto mt-5 pt-5">',
          '<h4 class="text text-center"> Confirmer votre mot de passe </h4>',
          form_password('txtConfirmerMDP', '', 'class="form-control" id="mysndInput"'),
          '<input type="checkbox" onclick="mysndFunction()">voir le mot de passe',
        '</div>',

        '<div class="mt-5 pt-3">',
        '</div>',
  
          '<div class="mt-5 pt-5 text-center">',
            '<button name="btnPoster" class="btn-big btn-white-orange"> <h3> Valider </h3> </button>',
          '</div>',

        form_close(),

        form_open('Compte'),
          csrf_field(),
          '<div class="mt-5 pt-5 text-center">',
            '<button name="btnAnnuler" class="btn-big btn-white-orange"> <h3> Annuler </h3> </button>',
          '</div>',
        form_close();
    ?>

    <script>
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

      function mysndFunction() {
        var x = document.getElementById("mysndInput");
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
</div>