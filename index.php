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
        var_dump($form->getData());
        $result = "Formulaire valide";
    } else {
        $result = "Formaulaire invalide";
    }
}
$form->prepare();
$personneRender = $form->getRender("personneGroupWidget");
?>
<!DOCTYPE html5>
<html>
    <head>
        <meta charset='utf-8'>
        <style type="text/css">
            body, html {margin: 0; padding: 0; background-color: aquamarine}
            form{position: absolute; background-color: azure; margin-left: 25%; margin-right: 25%; top: 25%; bottom: 25%; width: 50%;}
            .form_block{margin-left: 25%; margin-right: 25%; padding-bottom: 10px; padding-top: 10px; width: 50%;}
            .form_label{display: inline-block; color: aquamarine; width: 50%;            }
            .form_error span{display:block; color: red;}
        </style>
    </head>
    <body>
        <?= $form->openForm(); ?>
        <div class="form_block">
            <?= $personneRender["nom"]->getLabel() ?>
            <?= $personneRender["nom"]->getValue() ?>
            <div class="form_error">
                <?= $personneRender["nom"]->getError() ?>
            </div>
        </div>
        <div class="form_block">
            <?= $personneRender["active"]->getLabel() ?>
            <?= $personneRender["active"]->getValue() ?>
            <div class="form_error">
                <?= $personneRender["active"]->getError() ?>
            </div>
        </div>
        <div class="form_block">
            <?= $personneRender["nbEnfant"]->getLabel() ?>
            <?= $personneRender["nbEnfant"]->getValue() ?>
            <div class="form_error">
                <?= $personneRender["nbEnfant"]->getError() ?>
            </div>
        </div>
        <div class="form_block">
            <?= $personneRender["poste"]->getLabel() ?>
            <?= $personneRender["poste"]->getValue() ?>
            <div class="form_error">
                <?= $personneRender["nbEnfant"]->getError() ?>
            </div>
        </div>
        <?php foreach ($personneRender["adresse"] as $adresse) { ?>
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
