<?php
	$pdo = new PDO(
				'mysql:host=localhost;dbname=threat;charset=UTF8',
				'root',
				'');

	$pdo->setAttribute(
				PDO::ATTR_ERRMODE,
			 	PDO::ERRMODE_EXCEPTION);

	$pdo->setAttribute(
				PDO::ATTR_DEFAULT_FETCH_MODE,
			 	PDO::FETCH_OBJ);

	// $statement = $pdo->query('SELECT id, department FROM departments');
	$statement = $pdo->query('SELECT * FROM departments');
	$departmenttable	=  $statement->fetchAll();





$message['danger'] =[];
$message['success'] =[];
if(isset($_POST) && !empty($_POST)){
 $donnee=[];
 if(isset($_POST['nom']) && $_POST['nom']!=''){
    $donnee['lastname']= $_POST['nom'];
 }else{
  $message['danger'][] ='merci de renseigner un nom';
 }
 if (isset($_POST['prenom']) && $_POST['prenom']!=''){
  $donnee['firstname']=$_POST['prenom'];
 }else{
  $message['danger'][] ='merci de renseigner un prenom';
}
if (isset($_POST['naissance']) && $_POST['naissance']!=''){
  $donnee['birthday']=$_POST['naissance'];
 }else{
  $message['danger'][] ='merci de renseigner une date de naissance';
}  
if (isset($_POST['tel'])){
  $donnee['phone']=$_POST['tel'];

  }else{
    $message['danger'][] ='merci de renseigner un numéro de téléphone';
   
  }  
if (isset($_POST['cp'])){
  $donnee['postalCode']=$_POST['cp'];

  }else{
    $message['danger'][] ='merci de renseigner un code postal';
   
  }  

if (isset($_POST['adresse'])){
  $donnee['address']=$_POST['adresse'];

  }else{
    $message['danger'][] ='merci de renseigner une adresse';
   
  }  
if (isset($_POST['dep'])){
  $donnee['departmentId']=$_POST['dep'];

  }else{
    $message['danger'][] ='merci de renseigner un service';
   
  }  



 
  



  // var_dump($message['danger']);


 if (empty($message['danger'])){





  $statement = $pdo->prepare("
    INSERT INTO users
    SET lastname= :lastname,
    firstname= :firstname,
    birthday= :birthday,
    postalCode= :postalCode,
    departmentId= :departmentId,
    phone= :phone,
    address= :address
    ");

  $statement->execute($donnee);
  $message['success'][]='l\'utilisateur a bien été ajouté';
  

  // INSERT INTO nomdelatable SET colonne=valeur//SET permet de cibler une colonne et une valeur

 }

 } 
?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style/css/style.css">

</head>
<body>

 <?php 

 foreach ($message as $key => $tableau) {


    foreach ($tableau as  $value) {
      echo '<li class="'.$key.'">'.$value.'</li>';
     
    }
}

 ?>

<form method="post">

          <fieldset>
            <legend>Inscription</legend>
	<select id="dep" name="dep">
			<option value="">Choisir le service</option>
			<?php foreach ($departmenttable as $value) {
				echo "\t<option value=\"$value->id\">$value->department</option>\n";
			}
			?>
	</select>

	     
    <!-- 
                <label for="nom">Nom :</label>  -->
                <input type="text" name="nom" placeholder="Nom" />
         <!--        <label for="prenom">Prénom :</label>  -->
                <input type="text" name="prenom" placeholder="Prenom" /> 
               <!--  <label for="naissance">Date de naissance :</label>  -->
                <input type="date" name="naissance"  placeholder="aaaa-mm-jj">
                <input type="number" name="tel" placeholder="04 44 59 62 89">
         
                <input type="text" name="adresse" placeholder="adresse" /> 
                 <input type="number" name="cp" placeholder="code postal" /> 
               
               <button type="submit">ok</button>
          </fieldset>



</form>

</body>
</html>