<?php 
	
/**
 * Créer un formulaire : 
 *
 * $form1->debut(action du formulaire, methode); Ex :  ('index.php', 'post'
 * $form1->milieu(type d'input, nom d'input, label) Ex :('text', 'pseudo', 'indiquez votre pseudo')
 * $form1->fin(nom du bouton submit, value du bouton) Ex :  ('envoiForm', Envoyer)
 */

class Form
{

	public function debut($action, $method)
	{
		echo '<form action="'.$action.'" method="'.$method.'">';
	}
	public function milieu($type, $name, $label)
	{
		echo '<input type="'.$type.'" name="'.$name.'"><label>'.$label.'</label></br>';
	}
	public function fin($name, $value)
	{
		echo '<input type="submit" name="'.$name.'" value="'.$value.'"></form>';
	}


}

?>