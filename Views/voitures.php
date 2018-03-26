<?php
    global $model;
    $all = $model->All();
?>
<main class="main--voitures">
    <?php foreach($all as $value) : ?>
        <div>
            <a href="index.php?page=voiture&id=<?= $value['id']; ?>">
                <div><img src="<?= $value['url'] ?>" alt=""></div>
                <span><?= $value['marque'] ." : ". $value['model']; ?></span>
            </a>
        </div>
    <?php endforeach; ?>
</main>