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
$form->prepare();

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
<?php foreach ($form->getRender("personneGroupWidget") as $fieldPersonne) { ?>
    <?= $fieldPersonne->getLabel() ?>
    <?= $fieldPersonne->getValue() ?>
    <?= $fieldPersonne->getError() ?>
<?php } ?>
<?= $form->getRender("button")->getValue() ?>
<?= $form->closeForm(); ?>