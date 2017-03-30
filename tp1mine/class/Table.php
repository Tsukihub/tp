<?php 
/**
 * Créer un tableau : 
 *
 * $table1->debut(2, '1er th', '2eme th'); -> (nombre de collone, collone1, collone2, ...)
 * $table1->milieu(2, '1td', '2td') 
 * $table1->fin(2, '1td', '2td')
 */
class Table
{

	public function debut($chiffre, $th1, $th2=false, $th3=false, $th4=false, $th5=false, $th6=false, $th7=false, $th8=false)
	{

		echo '<div id="divUn"><table><tr>';

		for($i = 1; $i <= $chiffre; $i++){

			echo '<th>'.func_get_arg($i).'</th>';

		}

		echo '</tr>';

	}




	public function milieu($chiffre, $td1, $td2=false, $td3=false, $td4=false, $td5=false, $td6=false, $td7=false, $td8=false)
	{
		echo '<tr>';

		for($i = 1; $i <= $chiffre; $i++){

			echo '<td>'.func_get_arg($i).'</td>';

		}

		echo '</tr>';
	}





	public function fin($chiffre, $td1, $td2=false, $td3=false, $td4=false, $td5=false, $td6=false, $td7=false, $td8=false)
	{
		echo '<tr>';

		for($i = 1; $i <= $chiffre; $i++){

			echo '<td>'.func_get_arg($i).'</td>';

		}

		echo '</tr></table></div>';
	}


}
?>