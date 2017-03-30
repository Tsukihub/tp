<?php
namespace App\Entity;
use Core\Entity\Entity;
/**
* class pr stocker un enregistrement s'utilisateur
*/
class UtilisateurEntity extends Entity
{
	public function getAge()
		{	
			return (int)((time()-strtotime($this->date_de_naissance))/(60*60*24*365));
			
		}
	public function getIdentite(){
		return strtoupper($this->nom). ', ' .ucfirst($this->prenom);
	}
	public function getAdresseComplete()
	{
		return $this->adresse. ' ' .$this->code_postal;
		# code...
	}

}