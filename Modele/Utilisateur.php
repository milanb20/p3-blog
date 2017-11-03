<?php
require_once 'Framework/Modele.php';
/**
 * Modélise un utilisateur du blog
 *
 * @author Baptiste Pesquet
 */
class Utilisateur extends Modele {
    /**
     * Vérifie qu'un utilisateur existe dans la BD
     *
     * @param string $login Le login
     * @param string $mdp Le mot de passe
     * @return boolean Vrai si l'utilisateur existe, faux sinon
     */
    public function connecter($login, $mdp)
    {
        $sql = "select UTIL_ID as id, UTIL_MDP as mdp from T_UTILISATEUR where UTIL_LOGIN= :login";
        $requete = $this->executerRequete($sql, array('login' => $login));
        if($requete->rowCount() == 1)
        { $utilisateur = $requete->fetch();
          if(password_verify($mdp, $utilisateur["mdp"])) {
            return true;
          }
          else{
            return false;
          }
        }
        else{
          return false;
        }
    }
    /**
     * Renvoie un utilisateur existant dans la BD
     *
     * @param string $login Le login
     * @return mixed L'utilisateur
     * @throws Exception Si aucun utilisateur ne correspond aux paramètres
     */
    public function getUtilisateur($login)
    {
        $sql = "select UTIL_ID as idUtilisateur, UTIL_LOGIN as login, UTIL_MDP as mdp
            from T_UTILISATEUR where UTIL_LOGIN=?";
        $utilisateur = $this->executerRequete($sql, array($login));
        if ($utilisateur->rowCount() == 1)
            return $utilisateur->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
    }
    /**
 *
 * Enregistrement d'un utilisateur
 * @param string $login Login
 * @param string $mdp
 * @param string $nom
 * @param string $prenom
 * @param string $dateNaissance
 * @param string $email
 * @return bool
 */
public function inscription($login, $mdp, $nom, $prenom, $dateNaissance, $email)
{
    $pass_hache = password_hash($mdp, PASSWORD_BCRYPT);
    $email_verifie = $email;
    $sql = 'INSERT INTO T_UTILISATEUR SET UTIL_LOGIN= :login, UTIL_MDP= :mdp, UTIL_NOM= :nom, UTIL_PRENOM= :prenom, UTIL_DNAISSANCE= :dateNaissance, UTIL_EMAIL= :email';
    return $this->executerRequete($sql, array(
            'login' => $login,
            'mdp' => $pass_hache,
            'nom' => $nom,
            'prenom' => $prenom,
            'dateNaissance' => $dateNaissance,
            'email' => $email_verifie
        ))->rowCount() == 1;

}

    public function modificationPassword ($id, $mdp){
        $pass_hache = password_hash ( $mdp, PASSWORD_BCRYPT);
        $sql = "UPDATE `t_utilisateur` SET `UTIL_MDP`= :mdp WHERE `UTIL_ID` = :id ";
        return  $this->executerRequete($sql,array( 'id' => $id, 'mdp' => $pass_hache))->rowCount() == 1;

    }

    /**
     * Fonction de création d'utilisateur
     * @param $nom
     * @param $mdp
     */
    public function creerUtilisateur($nom, $mdp)
    {
        $mdpSecurise = $this->genererMdp($mdp);
        $req = "INSERT INTO `t_utilisateur` (`UTIL_ID`, `UTIL_nom`, `UTIL_mdp`)" .
        "VALUES (NULL, $nom, $mdpSecurise)";
        $req->execute();
    }

}
