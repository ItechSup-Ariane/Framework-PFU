<?php
include './Vendor/ItechSup/AutoLoader/ClassLoader.php';

$classLoader = new \ItechSup\AutoLaoder\ClassLoader();
$classLoader->addPrefix('vendor/');
$classLoader->addPrefix('');
$classLoader->register();

use FormCustom\FormCustom;
use Entity\PersonneEntity;

$personne = new PersonneEntity();
$form = new FormCustom($personne);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form->setBindData($_POST);
    if ($form->isValid()) {
        var_dump($form->getData());
        $result = "Formulaire valide";
    } else {
        $result = "Formaulaire invalide";
    }
}
$form->prepare();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <style type="text/css">
            body, html {margin: 0; padding: 0;}
            form {background-color: blue; margin-left: 25%; margin-right: 25%; width: 50%;}
            .form_block{margin-left: 25%; margin-right: 25%; padding-bottom: 10px; padding-top: 10px; width: 50%;}
            .form_label{display: inline-block; color: whitesmoke; width: 50%;            }
            .form_error span{display:block; color: red;}
        </style>
    </head>
    <body>
        <?= $form->openForm(); ?>
        <?php foreach ($form->getRender("personneGroupWidget") as $fieldPersonne) { ?>
            <div class="form_block">
                <?= $fieldPersonne->getLabel() ?>
                <?= $fieldPersonne->getValue() ?>
                <div class="form_error">
                    <?= $fieldPersonne->getError() ?>
                </div>
            </div>
        <?php } ?>
        <div class="form_block">
            <?= $form->getRender("button")->getValue() ?>
        </div>
        <?= $form->closeForm(); ?>
    </body>
</html>
