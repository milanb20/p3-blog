<?php
/**
 * Vue modification d'un chapitre
 */
$this->titre = "Billet pour l'Alaska - Modifier";
?>

<header>
    <h2>Modification d'un chapitre</h2>
</header>
<form method="post" action="admin/modifierBillet/<?= $billet['id']?>" class="form-group">


  <div class="form-group">
    <label for="titre">Titre du chapitre : </label>
    <input type="text" class="form-control" name="titreBillet" value="<?php echo $this->nettoyer($billet['titre']);?>" required> <br>
  </div>
  <div class="form-group">
  <label for="date"> Date de l'article : </label>
  <input type ="text" class ="form-control" name="dateBillet" value="<?php echo $this->nettoyer($billet['date']);?>" required> <br>

  <div class="form-group">
    <label for="contenuBillet">Contenu</label>
    <textarea class="form-control tinymce" name="contenuBillet">
      <?php echo $billet['contenu'];?>
    </textarea>
  </div>
  <button type="submit"   class="btn btn-default">modifier le billet</button>
</form>
