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
    elseif ($erreur == 'Inconnu')
    {
      echo '<div class="modal fade" id="myModal" data-bs-backdrop="false">',
        '<div class="modal-dialog">',
          '<div class="modal-content">',

            '<div class="modal-header white">',
              '<h4 class="modal-title dark-text text-center">Attention !</h4>',
              '<button type="button" class="btn-close" data-bs-dismiss="modal"></button>',
            '</div>',

            '<div class="modal-body white">',
              '<div class="alert alert-danger mt-3 ms-3 me-3">',
                '<strong> ' . "identifiants inconnus," . ' </strong> votre adresse E-mail est incorrecte.',
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
        echo form_open('MotDePasseOublie'),
          csrf_field(),

          '<div class="form-size mt-5 pt-5 mb-5 pb-5 mx-auto">',
              '<h4 class="text text-center"> Email </h4>',
              form_input('txtEmail', set_value('txtEmail'), 'class="form-control"'),
          '</div>',

          '<div class="mt-5 pt-5 text-center">',
            '<h4>',
              '<button name="btnPoster" type="submit" class="btn-big btn-white-orange"> <h3 class="my-auto"> Envoyer </3> </button>',
            '</h4>',
          '</div>',

        form_close(),
        
        '</div>';
    ?>
  </div>
</div>