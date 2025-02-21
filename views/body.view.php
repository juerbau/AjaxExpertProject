

<?php foreach ($products as $product): ?>

    <p>Name: <b><?= e($product["name"]) ?></b> Beschreibung: <?= e($product["description"]) ?></p>

<?php endforeach; ?>

<?php var_dump(__DIR__); ?>


