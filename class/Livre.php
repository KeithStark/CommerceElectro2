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


    /**
     * @param int $id
     * @return array or boolean false (si aucun resultat)
     */
    public function getLivreById($id)
    {
        global $oPDO;
        $oPDOStmt = $oPDO->prepare("SELECT id,titre,auteur,annee FROM livre where id = :id");
        $oPDOStmt->bindParam(':id', $id, PDO::PARAM_INT);

        //execution de la requete
        $oPDOStmt->execute();

        //recuperation de resultat
        $livre = $oPDOStmt->fetchAll(PDO::FETCH_ASSOC);
        return $livre;
    }


    public function ajouterLivre($livre)
    {
        global $oPDO;
        //$oPDO = SingletonPDO::getInstance();

        //preparation de la requete
        $oPDOStmt = $oPDO->prepare('INSERT INTO livre SET titre=:titre, auteur=:auteur,annee=:annee;');
        $oPDOStmt->bindParam(':titre', $livre['titre'], PDO::PARAM_STR);
        $oPDOStmt->bindParam(':auteur', $livre['auteur'], PDO::PARAM_STR);
        $oPDOStmt->bindParam(':annee', $livre['annee'], PDO::PARAM_INT);

        //execution de la requete
        $oPDOStmt->execute();

        //tester le nombre de lignes affectés
        if ($oPDOStmt->rowCount() <= 0) {
            return false;
        }
        return $oPDO->lastInsertId();
    }



    //Method updateLivre
    public function UpdateLivreById($id, $data)
    {
        global $oPDO;

        $oPDOStmt = $oPDO->prepare('UPDATE livre SET titre=:titre, auteur=:auteur,annee=:annee WHERE id=:id ;');
        $oPDOStmt->bindParam(':titre', $data['titre'], PDO::PARAM_STR);
        $oPDOStmt->bindParam(':auteur', $data['auteur'], PDO::PARAM_STR);
        $oPDOStmt->bindParam(':annee', $data['annee'], PDO::PARAM_INT);
        $oPDOStmt->bindParam(':id', $id, PDO::PARAM_INT);

        $oPDOStmt->execute();

        return $oPDOStmt;
    }


    //Method deleteLivre
    public function deleteLivre($id)
    {
        global $oPDO;

        $oPDOStmt = $oPDO->prepare("DELETE FROM livre WHERE id=:id");
        $oPDOStmt->bindParam(':id', $id, PDO::PARAM_INT);

        $resultat = $oPDOStmt->execute();

        if ($resultat) {
            echo "Livre supprimé correctement <br><br>";
        } else {
            echo "une erreur est survenue";
        }
    }
}
