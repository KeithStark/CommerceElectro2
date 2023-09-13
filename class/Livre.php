<?php

class Livre
{

    /** Récuperation de tous les livres de la table livre
     * 
     * @return array
     */

    public function getLivres()
    {
        //Récuperation de l'objet PDO de connexion
        global $oPDO;
        //Execution de la requete SQL passé en paramètre
        $oPDOStmt = $oPDO->query("SELECT id,titre,auteur,annee FROM livre ORDER BY id ASC");

        $livres = $oPDOStmt->fetchAll(PDO::FETCH_ASSOC);
        return $livres;
    }
}
