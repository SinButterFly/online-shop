<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM products WHERE id_prod=:id';
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id ]);
$products = $stmt->fetch(PDO::FETCH_OBJ);



if (isset ($_POST['name'])) {
    $name = $_POST['name'];
    $desc_p = $_POST['desc_p'];
    $price = $_POST['price'];
    $photo = $_POST['photo'];
    $cat_id = $_POST['cat_id'];

  $sql = 'UPDATE products SET name=:name, desc_p=:desc_p, price=:price, photo=:photo, cat_id=:cat_id WHERE id_prod=:id';
    $stmt = $pdo->prepare($sql);
  if ($stmt->execute([':name' => $name, ':desc_p' => $desc_p, ':price' => $price,':photo' => $photo,':cat_id' => $cat_id, ':id' => $id])) {
    header("Location: /");
  }



}


 ?>
<?php require 'header.php'; ?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Create a person</h2>
        </div>
        <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input value="<?= $products->name; ?>" type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Описание</label>
                    <input value="<?= $products->desc_p; ?>" type="text" name="desc_p" id="desc_p" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Цена</label>
                    <input value="<?= $products->price; ?>" type="number" name="price" id="price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Фото</label>
                    <input value="<?= $products->photo; ?>" type="text" name="photo" id="photo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Категория</label>
                    <input value="<?= $products->cat_id; ?>" type="text" name="cat_id" id="cat_id" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Редактировать</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
