<?php
    class Model
    {
        protected $bdd;
        public function __Construct()
        {
            try
            {
                // $this->bdd = new PDO('mysql:host=localhost;dbname=parcvoiture;charset=utf8', 'root', 'root');
                $this->bdd = new PDO('mysql:host=localhost;dbname=parcvoiture;charset=utf8', 'root', 'user');
            }
            catch (Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }
        }
        public function All()
        {
            $req = $this->bdd->prepare('SELECT im.id, im.immatriculation, im.kilometrage, im.datetime, im.couleur, im.poid, mo.name as model, ma.name as marque, im.url
                                        FROM immatriculations as im
                                        Inner JOIN models as mo
                                        ON im.models_id = mo.id
                                        INNER JOIN marques as ma
                                        ON mo.marques_id = ma.id
                                        ');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        public function Voiture($id)
        {
            $req = $this->bdd->prepare('SELECT im.id, im.immatriculation, im.kilometrage, im.datetime, im.couleur, im.poid, mo.name as model, ma.name as marque, im.url
                                        FROM immatriculations as im
                                        Inner JOIN models as mo
                                        ON im.models_id = mo.id
                                        INNER JOIN marques as ma
                                        ON mo.marques_id = ma.id
                                        WHERE im.id = :id
                                        ');
            $req->execute(["id" => $id]);
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        public function Marques()
        {
            $req = $this->bdd->prepare('SELECT * FROM marques');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        public function addMarque($list)
        {
            $req = $this->bdd->prepare('INSERT INTO marques(`name`, `pays`) VALUES(:name, :pays)');
            $req->execute(array(
                'name' => $list['name'],
                'pays'  => $list['pays']
            ));

        }
        public function Models()
        {
            $req = $this->bdd->prepare('SELECT * FROM models');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data; 
        }
        public function addModel($list)
        {
            $req = $this->bdd->prepare('INSERT INTO models(`name`, `marques_id`) VALUES(:name, :marques_id)');
            $req->execute(array(
                'name' => $list['name'],
                'marques_id'  => (int)$list['marques_id']
            ));

        }
        public function addImmatriculation($list)
        {
            $req = $this->bdd->prepare('INSERT INTO immatriculations(`immatriculation`, `kilometrage`, `models_id`, `couleur`, `poid`, `url`) 
                                        VALUES(:imma, :kilo, :models_id, :couleur, :poid, :url)');
            $req->execute(array(
                'imma'  => $list['immatriculation'],
                'kilo'  => (int)$list['kilometrage'],
                'models_id'  => (int)$list['models_id'],
                'couleur' => (int)$list['couleur'],
                'poid' => (int)$list['poid'],
                'url' => $list['url']
            ));         
        }
    }
?>