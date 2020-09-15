<?php
require 'db.php';
$message = '';
if (isset ($_POST['name'])) {
    $name = $_POST['name'];
    $desc_p = $_POST['desc_p'];
    $price = $_POST['price'];
    $photo = $_POST['photo'];
    $cat_id = $_POST['cat_id'];

  $sql = 'INSERT INTO products (name, desc_p, price, photo, cat_id)
          VALUES(:name, :desc_p, :price, :photo, :cat_id)';
  $stmt = $pdo->prepare($sql);
  if ($stmt->execute([':name' => $name, ':desc_p' => $desc_p, ':price' => $price, ':photo' => $photo, ':cat_id' => $cat_id])) {
    $message = 'Продукт добавлен';
  }

}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Добавить продукт</h2>
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
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="desc_p">Описание</label>
          <input type="text" name="desc_p" id="desc_p" class="form-control">
        </div>
          <div class="form-group">
              <label for="price">Цена</label>
              <input type="text" name="price" id="price" class="form-control">
          </div>
          <div class="form-group">
              <label for="photo">Фотография</label>
              <input type="text" name="photo" id="photo" class="form-control">
          </div>
          <div class="form-group">
              <select name="cat_id"  title="Категории">
                  <?php
                  require_once 'db.php';
                  $stmt = $pdo->query("SELECT * FROM `categories`");
                  while ($row = $stmt->fetch()){
                      echo '<option value="' . $row['id_cat'] . '">' . $row['name_cat'] . '</option>';
                  }
                  ?>
              </select>
          </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Добавить продукт</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
