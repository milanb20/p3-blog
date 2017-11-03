<?php $this->titre = "Mon Blog - Ajouter un nouveau billet" ?>
    <h3>Création d'un nouveau billet</h3>
    <form method="post">
      <div class="form-group">
        <label for="dateBillet">Date de publication</label>
        <input class="form-control" name="dateBillet" placeholder="AAAAMMJJ" required>
      </div>
        <div class="form-group">
          <label for="titreBillet">Titre du chapitre</label>
            <input class="form-control" name="titreBillet" placeholder="Titre" required>
        </div>
        <div class="form-group">
          <label for="contenuBillet">Contenu</label>
          <textarea class="form-control tinymce" name="contenuBillet"></textarea>
        </div>
        <button type="submit"   class="btn btn-default">Créer le nouveau billet</button>
    </form>

<?php if (isset($msgErreur)): ?>
    <p><?= $msgErreur ?></p>
<?php endif; ?>
