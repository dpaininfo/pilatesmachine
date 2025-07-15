<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">
  <head>
    <!-- header avec appel style.css, calendar.css, jsp.js et bootstrap  -->
    <?php
      echo '<title>', $TitreDeLaPage, '</title>      
      <link rel="stylesheet" href="', css_url('style'), '">
      <link rel="stylesheet" href="', css_url('calendar'), '">
      <!--<link rel="stylesheet" href="', base_url('assets/css/calendar.css'), '">-->
      <link rel="stylesheet" href="', js_url('jsp'), '">
      <link rel="stylesheet" href="', base_url('assets/bootstrap/css/bootstrap.min.css'), '" >
      <script src="', base_url('assets/bootstrap/js/bootstrap.bundle.min.js'), '"></script>';
    ?>

            
    <meta charset="utf-8">        
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body class="bg-white-orange">
    <!--------------------------- barre de navigation ----------------------------------->
    <nav class="navbar bg-orange fixed-top">

      <?php
        // début de session
        $session = session();
          echo '<div class="mx-5 px-1">',
            '<div class="d-flex justify-content-center">',
              anchor('Planning/'.$session->get('dateplanning'), form_submit('btnretour', '<< retour au planning', 'class="btn btn-light"'), 'class="text-link underline-none"'),
              '</a>',
            '</div>',
          '</div>';
      ?>

      <div class="mx-auto">

        <?php
          echo '<h2 class="text"> ESPACE FORME PILATES </h2>';
        ?>

      </div>

      <div class="mx-auto">

      <?php
        echo anchor('/', 'Accueil', 'class="text-link underline-none"');
      ?>

      </div>

    </nav>
    <!--------------------------- fin barre de navigation ----------------------------------->

  <div class="container-fluid">
    <div class="row">