<?php $this->titre = "Mon Blog - Administration" ?>

<h2>Administration</h2>

Bienvenue, <?= $this->nettoyer($login) ?> !
Ce blog comporte <?= $this->nettoyer($nbBillets) ?> billet(s) et <?= $this->nettoyer($nbCommentaires) ?> commentaire(s).
<h3>Gestion des articles</h3>

<table class="table">
<?php foreach($billets as $billet): ?>
<tr>
  <td>TITRR</td>
  <td>DATE</td>
  <td>
    <a class="btn btn-default" href="admin/modifierBillet/<?= $billet['id'] ?>">Editer</a>
    <a class="btn btn-warning" href="admin/supprimerBillet/<?= $billet['id'] ?>">Supprimer</a>

  </td>
</tr>

<?php endforeach; ?>
</table>

<a id="lienNbillet" href="admin/creationBillet" class="btn btn-primary">Création Billet</a>
<br>


<h3>Gestion des commentaires</h3>
<a href='admin/commentaires'>Page Gestion des commentaires</a>

<h3>Gestion utilisateur</h3>
<a id="lienPass" href="admin/modifierMdp">Changer le mot de passe</a> -
<br>
<a id="lienIns" href="admin/inscription">Ajouter un nouvel utilisateur</a> -
<br>
<a id="lienDeco" href="connexion/deconnecter">Se déconnecter</a>
