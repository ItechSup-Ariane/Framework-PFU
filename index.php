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
    $isValid = $form->isValid();
    if ($isValid) {
        $result = "Formulaire valide";
    } else {
        $result = "Formaulaire invalide";
    }
}
$form->prepare();
$personne = $form->getRender("personneGroupWidget");
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
        <div class="form_block">
            <?= $personne["nom"]->getLabel() ?>
            <?= $personne["nom"]->getValue() ?>
            <div class="form_error">
                <?= $personne["nom"]->getError() ?>
            </div>
        </div>
        <div class="form_block">
            <?= $personne["nbEnfant"]->getLabel() ?>
            <?= $personne["nbEnfant"]->getValue() ?>
            <div class="form_error">
                <?= $personne["nbEnfant"]->getError() ?>
            </div>
        </div>
        <?php foreach ($personne["adresse"] as $adresse) { ?>
            <div class="form_block">
                <?= $adresse->getLabel() ?>
                <?= $adresse->getValue() ?>
                <div class="form_error">
                    <?= $adresse->getError() ?>
                </div>
            </div>
        <?php } ?>
        <div class="form_block">
            <?= $form->getRender("button")->getValue() ?>
        </div>
        <?= $form->closeForm(); ?>
    </body>
</html>
