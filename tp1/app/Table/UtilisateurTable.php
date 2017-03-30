<?php
namespace App\Table;
use Core\Table\Table;
/**
* class table utilisateur
*/
class UtilisateurTable extends Table
{
	public function allWithService()
	{
		return $this->query("SELECT utilisateurs.id, 
			utilisateurs.nom, 
			utilisateurs.prenom, 
			utilisateurs.prenom, 
			utilisateurs.adresse, 
			utilisateurs.date_de_naissance, 
			utilisateurs.code_postal, 
			utilisateurs.numero_de_telephone, 
			services.nom_du_service AS service
			FROM utilisateurs 
			LEFT JOIN services
			ON services_id= services.id

			");
	}

		public function allByService($id)
	{
		return $this->query("SELECT utilisateurs.id, 
			utilisateurs.nom, 
			utilisateurs.prenom, 
			utilisateurs.prenom, 
			utilisateurs.adresse, 
			utilisateurs.date_de_naissance, 
			utilisateurs.code_postal, 
			utilisateurs.numero_de_telephone, 
			services.nom_du_service AS service
			FROM utilisateurs 
			LEFT JOIN services
			ON services_id= services.id
			WHERE services.id = ?
			", [$id]);
	}
}