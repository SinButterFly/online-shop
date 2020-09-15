<?php
require 'db.php';
$sql = 'SELECT * FROM products JOIN `categories` ON categories.id_cat = products.cat_id';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Продукты</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>Описание</th>
        <th>Цена</th>
        <th>Фото</th>
        <th>Категория</th>
        </tr>
        <?php foreach($products as $product): ?>
          <tr>
            <td><?= $product->id_prod; ?></td>
            <td><?= $product->name; ?></td>
            <td><?= $product->desc_p; ?></td>
            <td><?= $product->price; ?></td>
            <td><?= $product->photo; ?></td>
            <td><?= $product->cat_id; ?></td>
            <td>
              <a href="edit.php?id=<?= $product->id_prod ?>" class="btn btn-info">Редактировать</a>
              <a onclick="return confirm('Действительно хотите удалить?')" href="delete.php?id=<?= $product->id_prod ?>" class='btn btn-danger'>Удалить</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
