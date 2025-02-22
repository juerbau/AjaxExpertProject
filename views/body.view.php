

<?php foreach ($dogs as $dog): ?>

    <p>ID: <b><?= e($dog["id"]); ?></b> Name: <?= e($dog["name"]); ?></p>

<?php endforeach; ?>

<?php var_dump(__DIR__); ?>


