<div class="container nav-space mx-auto bg-light-orange pt-4 band pb-2">
    <h1 class="text-center mb-5 pb-3">Créer un compte adhérent</h1>
        <?php
            echo form_open('Ajout');
            echo csrf_field();

            echo '<div class="d-flex justify-content-evenly">',
            '<div>',
            '<h5 class="text-center">Nom *</h5>';
            if ($txtNom[0] == null)
            {
                echo form_input('txtNom', '', 'class="form-control"');
            }
            elseif ($txtNom[0] == 'is-invalid')
            {
                echo form_input('txtNom', '', 'class="form-control is-invalid w-75 position-relative end-0"'),
                '<div class="invalid-feedback text-center">ne doit pas comporter de caractères ni de nombres</div>';
            }
            else
            {
                echo form_input('txtNom', $txtNom[1], 'class="form-control is-valid"');
            }
            echo '</div>',
        
            '<div>',
            '<h5 class="text-center ps-1">Prénom *</h5>';
            if ($txtPrenom[0] == null)
            {
                echo form_input('txtPrenom', '', 'class="form-control"');
            }
            elseif ($txtPrenom[0] == 'is-invalid')
            {
                echo form_input('txtPrenom', '', 'class="form-control is-invalid w-75 ms-5 ps-5""'),
                '<div class="invalid-feedback text-center">ne doit pas comporter de caractères ni de nombres</div>';
            }
            else
            {
                echo form_input('txtPrenom', $txtPrenom[1], 'class="form-control is-valid"');
            }
            echo '</div>',
            '</div>',

            '<div class="d-flex justify-content-evenly w-50 ms-5 mt-5 ps-5 pt-3">',
            '<div>',
            '<h5 class="text-center">Date de Naissance *</h5>';
            if ($txtDateNaissance[0] == null)
            {
                echo form_input('txtDateNaissance', '', 'type="date" class="form-control"');
            }
            elseif ($txtDateNaissance[0] == 'is-invalid')
            {
                echo form_input('txtDateNaissance', '', 'type="date" class="form-control is-invalid w-75 ms-5 ps-5""'),
                '<div class="invalid-feedback text-center"> Looks good! </div>';
            }
            else
            {
                echo form_input('txtDateNaissance', $txtDateNaissance[1], 'class="form-control is-valid"');
            }
            echo '</div>',
            '</div>',

            '<div class="d-flex justify-content-center mt-5 pt-3">',
            '<div class="me-2">',
            '<h5 class="text-center">Adresse *</h5>';
            if ($txtAdresse[0] == null)
            {
                echo form_input('txtAdresse', '', 'class="form-control"');
            }
            elseif ($txtAdresse[0] == 'is-invalid')
            {
                echo form_input('txtAdresse', '', 'class="form-control is-invalid w-75 ms-5 ps-5""'),
                '<div class="invalid-feedback text-center">ne doit pas comporter de caractères ni de nombres</div>';
            }
            else
            {
                echo form_input('txtAdresse', $txtAdresse[1], 'class="form-control is-valid"');
            }
            echo '</div>',
        
            '<div class="me-3">',
            '<h5 class="text-center">Code Postal *</h5>';
            if ($txtCodePostal[0] == null)
            {
                echo form_input('txtCodePostal', '', 'class="form-control"');
            }
            elseif ($txtCodePostal[0] == 'is-invalid')
            {
                echo form_input('txtCodePostal', '', 'class="form-control is-invalid"'),
                '<div class="invalid-feedback text-center">doit être une suite de 5 chiffre</div>';
            }
            else
            {
                echo form_input('txtCodePostal', $txtCodePostal[1], 'class="form-control is-valid"');
            }
            echo '</div>',

            '<div>',
            '<h5 class="text-center">Ville *</h5>';
            if ($txtVille[0] == null)
            {
                echo form_input('txtVille', '', 'class="form-control"');
            }
            elseif ($txtVille[0] == 'is-invalid')
            {
                echo form_input('txtVille', '', 'class="form-control is-invalid w-75 mx-auto"'),
                '<div class="invalid-feedback text-center">ne doit pas comporter de caractères ni de nombres</div>';
            }
            else
            {
                echo form_input('txtVille', $txtVille[1], 'class="form-control is-valid"');
            }
            echo '</div>',
            '</div>',

            '<div class="d-flex justify-content-evenly mt-2 pt-5">',
            '<div>',
            '<h5 class="text-center">Numéro de téléphone *</h5>';
            if ($txtTelephone[0] == null)
            {
                echo form_input('txtTelephone', '', 'class="form-control"');
            }
            elseif ($txtTelephone[0] == 'is-invalid')
            {
                echo form_input('txtTelephone', '', 'class="form-control is-invalid"'),
                '<div class="invalid-feedback text-center">doit être une suite de 10 chiffre</div>';
            }
            else
            {
                echo form_input('txtTelephone', $txtTelephone[1], 'class="form-control is-valid"');
            }
            echo '</div>',

            '<div>',
            '<h5 class="text-center">Adresse Email *</h5>';
            if ($txtEmail[0] == null)
            {
                echo form_input('txtEmail', '', 'class="form-control"');
            }
            elseif ($txtEmail[0] == 'is-invalid')
            {
                echo form_input('txtEmail', '', 'class="form-control is-invalid"'),
                '<div class="invalid-feedback text-center">ne peut pas faire plus de 100 caractères</div>';
            }
            else
            {
                echo form_input('txtEmail', $txtEmail[1], 'class="form-control is-valid"');
            }
            echo '</div>',
            '</div>',

            '<div class="d-flex justify-content-evenly w-50 ms-5 mt-5 ps-5 pt-3">',
            '<div>',
            '<h5 class="text-center">Profession</h5>';
            if ($txtProfession[0] == null)
            {
                echo form_input('txtProfession', '', 'class="form-control"');
            }
            elseif ($txtProfession[0] == 'is-invalid')
            {
                echo form_input('txtProfession', '', 'class="form-control is-invalid"'),
                '<div class="invalid-feedback text-center">ne doit pas comporter de caractères ni de nombres</div>';
            }
            else
            {
                echo form_input('txtProfession', $txtProfession[1], 'class="form-control is-valid"');
            }
            echo '</div>',
            '</div>',

            '<div class="d-flex justify-content-evenly mt-5">',
            '<div class="ps-5 pe-5">',
            form_submit('btnAjouter', "Ajouter", "class='btn-orange'"),
            '</div>',

            '<div class="ps-2">',
            form_submit('btnMdp', "Mot de passe oublié", "class='btn-orange'"),
            '</div>',
            '</div>',
            form_close();

            if ($erreur == 'poster')
            {
                echo '<h4 class="mx-auto mt-5 pt-4">'. $Prenom. ' '. $Nom. ' a bien été ajouté(e) </h4>';
            }
            if ($erreur == 'emailexistant')
            {
                echo "<h4 class='mx-auto mt-5 pt-4'> l'adresse ".$Email. ' est déjâ utiliser </h4>';
            }
            if ($erreur == 'adherentexistant')
            {
                echo '<h4 class="mx-auto mt-5 pt-4">'. $Prenom, ' '. $Nom. ' est déjâ un(e) adherent de ESPACE FORME PILATES </h4>';
            }
            if ($erreur == 'saisie')
            {
                echo '<h4 class="mx-auto mt-5 pt-4">veuillez renseigner tout les champs suivis de * </h4>';
            }
        ?>
</div>