<?php
require 'db.php';
$message = '';
if (isset ($_POST['name_cat'])) {
    $name_cat = $_POST['name_cat'];

    $sql = 'INSERT INTO categories (name_cat) VALUES(:name_cat)';
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([':name_cat' => $name_cat])) {
        $message = 'Категория добавлена';
    }
}
?>
<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Добавить категорию</h2>
        </div>
        <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="name_cat">Название</label>
                    <input type="text" name="name_cat" id="name_cat" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Добавить категорию</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>

