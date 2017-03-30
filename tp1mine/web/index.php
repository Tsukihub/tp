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


	$usersDatasByService=[];
	if(isset($_POST) &&! empty($_POST)){

		if (isset($_POST['dep'])&& !empty($_POST['dep'])){
		$selectedDep=$_POST['dep'];
		
		$selectedDep=intval($selectedDep);
		// if ($selectedDep==1){
		$statement = $pdo->query("SELECT users.id, users.lastname, users.firstname, users.birthday, users.address, users.postalCode, departments.department FROM users, departments WHERE users.departmentId=$selectedDep AND departments.id=$selectedDep");
		$usersDatasByService	=  $statement->fetchAll();	
	var_dump($usersDatasByService);
	// }
	// 	if ($selectedDep==2){
	// 	$statement = $pdo->query('SELECT users.id, users.lastname, users.firstname, users.birthday, users.address, users.postalCode, departments.department FROM users, departments WHERE users.departmentId=2 AND departments.id=2');
	// 	$usersDatasByService	=  $statement->fetchAll();		
	// }
	// if ($selectedDep==3){
	// 	$statement = $pdo->query('SELECT users.id, users.lastname, users.firstname, users.birthday, users.address, users.postalCode,  departments.department  FROM users, departments WHERE users.departmentId=3 AND departments.id=3');
	// 	$usersDatasByService	=  $statement->fetchAll();		
	// }
	// 	if ($selectedDep==4){
	// 	$statement = $pdo->query('SELECT users.id, users.lastname, users.firstname, users.birthday, users.address, users.postalCode, departments.department  FROM users, departments WHERE users.departmentId=4 AND departments.id=4');
	// 	$usersDatasByService	=  $statement->fetchAll();		
	// }


	}else{
		
	}

}





if (isset ($_GET["idPersonne"])){
 $id  = $_GET["idPersonne"] ;
 $request= $pdo->query("DELETE FROM users WHERE id = {$id}");

  if($request)
  {
    echo("La suppression à été correctement effectuée") ;
  }
  else
  {
    echo("La suppression à échouée") ;
  }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style/css/style.css">
	    <script language="javascript">

      function confirme( identifiant, nom )
      {
        var confirmation = confirm( "Voulez vous vraiment supprimer "+nom+" de cet enregistrement ?" ) ;
	if( confirmation )
	{
	  document.location.href = "index.php?idPersonne="+identifiant ;
	}
      }

    </script>
</head>
<body>

<form method="post">
	<select id="dep" name="dep">
			<option value="">Choisir le service</option>
			<?php foreach ($departmenttable as $value) {
				echo "\t<option value=\"$value->id\">$value->department</option>\n";
			}
			?>
	</select>
	<link rel="stylesheet" href="style/css/style.css">
	<button type="submit">go</button>

</form>


<a href="ajout.php">click here to add an user</a>

<?php
echo '<table>';
$nligne = 0;
///////////////////////compte lignes//////////////////////////////////////////////////////////
foreach ($usersDatasByService as $value) {
   $nligne = max(count($value), $nligne);
  
}
// echo $nligne;
 
for ($l = 0; $l < $nligne; $l++) {
    
     foreach ($usersDatasByService as $value) {
     	echo '<tr>';
         // $value = (isset($value[$l])) ? $value[$l] : '';
         echo '<td>' .$value->lastname. '</td>';
         echo '<td>' .$value->firstname. '</td>';
         echo '<td>' .$value->birthday. '</td>';
         echo '<td>' .$value->address. '</td>';
         echo '<td>' .$value->postalCode. '</td>';
         echo '<td>' .$value->department. '</td>';
       	 echo("<td>"." <a href=\"#\" onClick=\"confirme('".$value->id."','".$value->lastname."')\" >supprimer</a></td>\n") ;
         echo '</tr>';
      }
    
}
echo '</table>';

?>



</body>
</html>



