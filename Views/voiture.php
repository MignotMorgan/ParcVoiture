<?php
    global $model;
    global $id;
    $voiture = $model->Voiture($id);
?>

<main class="main--voiture">
    <section>
        <div><img src="<?= $voiture['url'] ?>" alt=""></div>
        <h1><?= $voiture['marque'] ." : ". $voiture['model']; ?></h1>
        <p>
            <label for="">mise en circulation : </label><label class="lbl--info" for=""><?= $voiture['datetime']?></label>
            <label for="">immatriculation : </label><label class="lbl--info" for=""><?= $voiture['immatriculation']?></label>
            <label for="">kilometrage : </label><label class="lbl--info" for=""><?= $voiture['kilometrage']?></label>
            <label for="">couleur : </label><label class="lbl--info" for=""><?= $voiture['couleur']?></label>
            <label for="">poid : </label><label class="lbl--info" for=""><?= $voiture['poid']?></label>
            <label for="">type : </label><label class="lbl--info" for=""><?= $voiture['poid'] < 3500?"utilitaire":"commerciale" ?></label>
            <label for="">état : </label>
                <label class="lbl--info" for="">
                    <?php 
                        if( $voiture['kilometrage'] < 100000 )
                            echo "low";
                        else if($voiture['kilometrage'] < 200000)
                            echo "middle";
                        else
                            echo "hight";
                    ?>
                </label>
        </p>
    </section>
</main>