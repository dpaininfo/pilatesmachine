<div class="col-8">
    <div class="w-75 band mx-auto pt-5">
        <h1 class="nav-space text-center mb-5 pb-5 dark-text"> Résumer </h1>

        <h2 class="nav-space text-center mb-5 pb-5 dark-text"> Je réserve pour : </h2>

        <table>
            <?php
                echo form_open('Confirmation'),
                    csrf_field();
                    foreach ($seances as $laseance)
                    {
                        echo '<tr class="pt-5">',
                            '<td>',
                                '<h3 class="dark-text">' . $laseance[0] . '</h3>',
                            '</td>',
                            '<td>',
                                '<button type="submit" name="value' . $laseance[1] . '" class="btn-ivs">',
                                    '<h4> <a class="align-self-end link-danger"> annuler </a> </h4>',
                                '</button>',
                            '</td>',
                        '</tr>',

                        '<input type="hidden" name="seances[]" value="' . $laseance[1] . '" />',
                        '<input type="hidden" name="' . $laseance[1] . '" value="' . $laseance[0] . '" />',
                        '<input type="hidden" name="heure'.$laseance[1].'" value="' . $laseance[2] . '" />';
                    }
            ?>
        </table>

        <?php
                echo '<div class="mt-5 d-flex justify-content-center">',
                    '<div class="me-5">',
                        '<button name="btnReserver" type="submit" class="btn-big btn-orange">',
                            '<h2> Reserver </h2>',
                        '</button>',
                    '</div>',
                    '<div>',
                        '<button name="btnAnnuler" type="submit" class="btn-big btn-orange">',
                            '<h2> Annuler </h2>',
                        '</button>',
                    '</div>',
                '</div>',
            form_close();
        ?>
    </div>
</div>