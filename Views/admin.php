<?php
    global $model;
    $marques = $model->Marques();
    $lst_models = $model->Models();
    $all = $model->All();
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if($_POST['addMarque'])
        {
            $name = $_POST['name'];
            $pays = $_POST['pays'];
            $list = [
                'name'  => $name,
                'pays'  => $pays
            ];
            $model->addMarque($list);
        }
        elseif($_POST['addModel'])
        {
            $name = $_POST['name'];
            $marques_id = $_POST['marques_id'];
            $list = [
                'name'  => $name,
                'marques_id'  => $marques_id
            ];
            $model->addModel($list);
        }
        elseif($_POST['addImmatriculation'])
        {
            $model->addImmatriculation($_POST);
        }
        elseif($_POST['addImages'])
        {

        } 

    }
?>
<main>
    <fieldset>
        <legend>Ajouter une marque</legend>
        <form action="index.php" method="post">
            <label for="name">nom : <input type="text" name="name"></label>
            <label for="name">pays : <input type="text" name="pays"></label>
            <input type="submit" name="addMarque" value="add">
        </form>
    </fieldset>
    <fieldset>
        <legend>Ajouter un model</legend>
        <form action="index.php" method="post">
            <label for="name">nom : <input type="text" name="name"></label>
            <select name="marques_id">
                <?php foreach($marques as $value) : ?>
                    <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="addModel" value="add">
        </form>
    </fieldset>
    <fieldset>
        <legend>Voiture</legend>
        <form action="index.php" method="post">
            <select name="models_id">
                <?php foreach($lst_models as $value) : ?>
                    <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="immatriculation">Immatriculation</label><input type="text" name="immatriculation"> 
            <label for="kilometrage">kilometrage</label><input type="number" name="kilometrage" value="1000"> 
            <label for="couleur">Couleur</label><input type="color" name="couleur">
            <label for="poid">Poid</label><input type="number" name="poid" value="1000">
            <label for="url">Image</label><input type="text" name="url"> 
            <input type="submit" name="addImmatriculation" value="add">
        </form>
    </fieldset>
    <fieldset>
        <legend>Images</legend>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <select name="voiture_id">
                <?php foreach($all as $value) : ?>
                    <option value="<?= $value['id']; ?>"><?= $value['marque'] ." : ". $value['model']; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="file" name="file_image" value="" accept=".png, .jpg, .jpeg, .gif" >
            <input type="submit" name="addImages" value="add">
        </form>
    </fieldset>
</main>