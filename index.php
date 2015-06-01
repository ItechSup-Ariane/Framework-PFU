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
?>

<?= $form->openForm(); ?>
<?= $form->getRender("nom")->getLabel(); ?>
<?= $form->getRender("nom")->getValue(); ?>
<?= var_dump($form->getRender("nom")->getError()); ?>

<?= $form->getRender("nbEnfant")->getLabel(); ?>
<?= $form->getRender("nbEnfant")->getValue(); ?>

<?= $form->getRender("button")->getValue(); ?>
<?= $form->closeForm(); ?>