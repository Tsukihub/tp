<?php

if (isset($_POST['nom'], $_POST['prenom'], $_POST['date_de_naissance'], $_POST['adresse'], $_POST['code_postal'], $_POST['numero_de_telephone'], $_POST['services_id'] ))
{


App::getInstance()->getTable('Utilisateur')->create([


"nom" => $_POST['nom'],
"prenom"=> $_POST['prenom'],
"date_de_naissance"=>$_POST['date_de_naissance'],
"adresse" => $_POST['adresse'],
"code_postal" => $_POST['code_postal'],
"numero_de_telephone" => $_POST['numero_de_telephone'],
"services_id" => $_POST['services_id']]);

header('location: admin.php?p=utilisateurs');

}



?>

<h2>add utilisateur</h2>

<form action="admin.php?p=utilisateurs.add" method="post">    
<input type="text" name="nom" placeholder="nom">
<input type="text" name="prenom" placeholder="prenom">
<input type="date" name="date_de_naissance" placeholder="date de naissance">
<input type="text" name="adresse" placeholder="adresse">
<input type="text" name="code_postal" placeholder="code postal">
<input type="text" name="numero_de_telephone" placeholder="numéro de téléphone">




<select name="services_id" class="form form-control">
<?php foreach (App::getInstance()->getTable("Service")->all() as $service): ?>
    <option value="<?= $service->id ?>"; ?>
    <?= $service->nom_du_service ?>
        
    </option>
<?php endforeach ?>

</select>
<input class="btn btn-success" type="submit">
</form>