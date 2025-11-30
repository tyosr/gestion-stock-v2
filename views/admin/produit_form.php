<?php
require_once __DIR__.'/../../app/auth.php';
require_once __DIR__.'/../../app/helpers.php';
admin_only();
include_once __DIR__.'/../../partials/head.php';
include_once __DIR__.'/../../partials/navbar.php';

$id = $_GET['id'] ?? null;
$produit = null;
if ($id) {
    $stmt = $pdo->prepare("SELECT * FROM produits WHERE id=?");
    $stmt->execute([$id]);
    $produit = $stmt->fetch();
}
$categories = $pdo->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);
$fournisseurs = $pdo->query("SELECT * FROM fournisseurs")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD']==='POST') {
    $data = [
        $_POST['nom'], $_POST['quantite'], $_POST['prix'],
        $_POST['categorie_id'] ?: null, $_POST['fournisseur_id'] ?: null
    ];
    if ($id) {
        $data[] = $id;
        $sql = "UPDATE produits SET nom=?, quantite=?, prix=?, categorie_id=?, fournisseur_id=? WHERE id=?";
    } else {
        $sql = "INSERT INTO produits(nom,quantite,prix,categorie_id,fournisseur_id) VALUES (?,?,?,?,?)";
    }
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
    redirect('produits_list.php');
}
?>
<div class="container">
  <h2><?= $id?'Modifier':'Nouveau' ?> produit</h2>
  <form method="post">
    <div class="mb-3"><label>Nom</label><input type="text" name="nom" class="form-control" value="<?= e($produit['nom']??'') ?>" required></div>
    <div class="mb-3"><label>Quantité</label><input type="number" name="quantite" class="form-control" value="<?= $produit['quantite']??'' ?>" required></div>
    <div class="mb-3"><label>Prix</label><input type="number" step="0.001" name="prix" class="form-control" value="<?= $produit['prix']??'' ?>" required></div>
    <div class="mb-3">
      <label>Catégorie</label>
      <select name="categorie_id" class="form-select">
        <option value="">-- Aucune --</option>
        <?php foreach ($categories as $c): ?>
          <option value="<?= $c['id'] ?>" <?= ($produit['categorie_id']==$c['id'])?'selected':'' ?>><?= e($c['nom']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3">
      <label>Fournisseur</label>
      <select name="fournisseur_id" class="form-select">
        <option value="">-- Aucun --</option>
        <?php foreach ($fournisseurs as $f): ?>
          <option value="<?= $f['id'] ?>" <?= ($produit['fournisseur_id']==$f['id'])?'selected':'' ?>><?= e($f['nom']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <button class="btn btn-primary"><?= $id?'Enregistrer':'Ajouter' ?></button>
    <a href="produits_list.php" class="btn btn-secondary">Annuler</a>
  </form>
</div>
<?php include_once __DIR__.'/../../partials/footer.php'; ?>