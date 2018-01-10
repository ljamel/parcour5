<?php


namespace MicroCMS\DAO;

use MicroCMS\Domain\Loisir;

class LoisirsDAO extends DAO
{
    /**
     * Return a list of all loisirs, sorted by date (most recent first).
     *
     * @return array A list of all loisirs.
     */


    public function findAllIndex()
    {

        if (isset($_POST["page"]) === false ) { $_POST["page"] = 0; $_POST["pageSuivant"] = 6; }

        $sql = 'SELECT * FROM t_loisirs WHERE prix BETWEEN 0 AND 2 AND etat = 1 ORDER BY art_id DESC   LIMIT ' . (int)$_POST["page"] . ' ,  ' . (int)$_POST["pageSuivant"];
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $loisirs = array();
        foreach ($result as $row) {
            $loisirId = $row['art_id'];
            $loisirs[$loisirId] = $this->buildDomainObject($row);
        }
        return $loisirs;
    }

    public function findAllMap()
    {

        if (isset($_POST["cat"]) === false ) { $_POST["cat"] = "1" ;}
        $debut = 0;
        $limit = 60;

        $sql = 'SELECT * FROM t_loisirs WHERE type = ' . (int)$_POST["cat"] . ' AND etat = 1  ORDER BY art_id DESC   LIMIT ' . (int)$debut . ' ,  ' . (int)$limit;
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $loisirs = array();
        foreach ($result as $row) {
            $loisirId = $row['art_id'];
            $loisirs[$loisirId] = $this->buildDomainObject($row);
        }
        return $loisirs;
    }

    public function findAll()
    {


        $sql = 'SELECT * FROM t_loisirs  ORDER BY art_id DESC ';
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $loisirs = array();
        foreach ($result as $row) {
            $loisirId = $row['art_id'];
            $loisirs[$loisirId] = $this->buildDomainObject($row);
        }
        return $loisirs;
    }

    // Resultat de recherche
    public function findResult()
    {

        // Pour la géolocalisation
        if(isset($_GET['loisirpositionLat'])) {
            $_POST['loisir']['prix'] = 20;
            $_POST['loisir']['positionLat'] = $_GET['loisirpositionLat'];
            $_POST['loisir']['positionLng'] = $_GET['loisirpositionLng'];
            $_POST['loisir']['Distance'] = 0.2;
        }

        $loisirs = array();
        $stmt = $this->getDb()->prepare("SELECT * FROM t_loisirs where prix < :prix AND position_LAT < :lat +:Distance AND position_LAT > :lat -:Distance AND position_LNG < :lng +:Distance AND position_lng > :lng -:Distance AND date_debut < :time AND date_fin > :time AND etat = 1");
        $stmt->bindValue(':prix', htmlspecialchars($_POST['loisir']['prix']));
        $stmt->bindValue(':lat', htmlspecialchars($_POST['loisir']['positionLat']));
        $stmt->bindValue(':lng', htmlspecialchars($_POST['loisir']['positionLng']));
        $stmt->bindValue(':Distance', htmlspecialchars($_POST['loisir']['Distance']));
        $stmt->bindValue(':time', time());

        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {
                $loisirId = $row['art_id'];

                // formule pour calculer la distance
                $lat_a_degre = $_POST['loisir']['positionLat'];
                $lon_a_degre = $_POST['loisir']['positionLng'];
                $lat_b_degre = $row['position_LAT'];
                $lon_b_degre = $row['position_LNG'];
                $R = 6378000; //Rayon de la terre en mètre
                $lat_a = (pi() * $lat_a_degre) / 180;
                $lon_a = (pi() * $lon_a_degre) / 180;
                $lat_b = (pi() * $lat_b_degre) / 180;
                $lon_b = (pi() * $lon_b_degre) / 180;
                $distance = $R * (pi() / 2 - asin(sin($lat_b) * sin($lat_a) + cos($lon_b - $lon_a) * cos($lat_b) * cos($lat_a)));
                $row['distance'] = intval($distance);
                $this->buildDomainObject($row);

                $loisirs[$loisirId] = $this->buildDomainObject($row);
            }
        }


        return $loisirs;
    }


    public function geoloc()
    {


        $loisirs = array();
        $stmt = $this->getDb()->prepare("SELECT * FROM t_loisirs where prix < :prix AND position_LAT < :lat +:Distance AND position_LAT > :lat -:Distance AND position_LNG < :lng +:Distance AND position_lng > :lng -:Distance AND date_debut < :time AND date_fin > :time AND etat = 1");
        $stmt->bindValue(':prix', htmlspecialchars($_GET['budget']));
        $stmt->bindValue(':lat', htmlspecialchars($_GET['loisirpositionLat']));
        $stmt->bindValue(':lng', htmlspecialchars($_GET['loisirpositionLng']));
        $stmt->bindValue(':Distance', htmlspecialchars($_GET['Distance']));
        $stmt->bindValue(':time', time());

        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {
                $loisirId = $row['art_id'];

                // formule pour calculer la distance
                $lat_a_degre = $_GET['loisirpositionLat'];
                $lon_a_degre = $_GET['loisirpositionLng'];
                $lat_b_degre = $row['position_LAT'];
                $lon_b_degre = $row['position_LNG'];
                $R = 6378000; //Rayon de la terre en mètre
                $lat_a = (pi() * $lat_a_degre) / 180;
                $lon_a = (pi() * $lon_a_degre) / 180;
                $lat_b = (pi() * $lat_b_degre) / 180;
                $lon_b = (pi() * $lon_b_degre) / 180;
                $distance = $R * (pi() / 2 - asin(sin($lat_b) * sin($lat_a) + cos($lon_b - $lon_a) * cos($lat_b) * cos($lat_a)));
                $row['distance'] = intval($distance);
                $this->buildDomainObject($row);

                $loisirs[$loisirId] = $this->buildDomainObject($row);
            }
        }



        return $loisirs;
    }


    /**
     * Creates an loisir object based on a DB row.
     *
     * @param array $row The DB row containing loisir data.
     * @return \MicroCMS\Domain\Loisir
     */
    protected function buildDomainObject(array $row)
    {
        $loisir = new Loisir();
        $loisir->setId($row['art_id']);
        $loisir->setTitle($row['art_title']);
        $loisir->setContent($row['art_content']);
        $loisir->setPosition($row['art_position']);
        $loisir->setImage($row['art_image']);
        $loisir->setPrix($row['prix']);
        $loisir->setCategorie($row['type']);
        $loisir->setNote($row['note']);
        $loisir->setEtat($row['etat']);
        $loisir->setLien($row['lien']);
        $loisir->setPositionLAT($row['position_LAT']);
        $loisir->setPositionLNG($row['position_LNG']);
        $loisir->setDistance($row['distance']);

       /* $array = ["distance" => $row['distance'], "title" => $row['art_title']];
        echo json_encode($array, JSON_PRETTY_PRINT);
*/
        return $loisir;
    }

    public function api() {

        $stmt = $this->getDb()->prepare("SELECT * FROM t_loisirs where prix < :prix AND position_LAT < :lat +:Distance AND position_LAT > :lat -:Distance AND position_LNG < :lng +:Distance AND position_lng > :lng -:Distance AND date_debut < :time AND date_fin > :time AND etat = 1");
        $stmt->bindValue(':prix', htmlspecialchars(20));
        $stmt->bindValue(':lat', htmlspecialchars($_GET['loisirpositionLat']));
        $stmt->bindValue(':lng', htmlspecialchars($_GET['loisirpositionLng']));
        $stmt->bindValue(':Distance', htmlspecialchars(0.20));
        $stmt->bindValue(':time', time());
        echo "[";
        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {

                // formule pour calculer la distance
                $lat_a_degre = $_GET['loisirpositionLat'];
                $lon_a_degre = $_GET['loisirpositionLng'];
                $lat_b_degre = $row['position_LAT'];
                $lon_b_degre = $row['position_LNG'];
                $R = 6378000; //Rayon de la terre en mètre
                $lat_a = (pi() * $lat_a_degre) / 180;
                $lon_a = (pi() * $lon_a_degre) / 180;
                $lat_b = (pi() * $lat_b_degre) / 180;
                $lon_b = (pi() * $lon_b_degre) / 180;
                $distance = $R * (pi() / 2 - asin(sin($lat_b) * sin($lat_a) + cos($lon_b - $lon_a) * cos($lat_b) * cos($lat_a)));
                $row['distance'] = intval($distance);
                $this->buildDomainObject($row);

                $array = ['position' => ['lat' =>  $row['position_LAT'], 'lng' => $row['position_LNG']], "distance" => $row['distance'], "name" => $row['art_title']] ;

                echo json_encode($array, JSON_PRETTY_PRINT); echo ",";
            }
        }
        echo '{"number":31705,"name":"31705 - CHAMPEAUX (BAGNOLET)","address":"RUE DES CHAMPEAUX (PRES DE LA GARE ROUTIERE) - 93170 BAGNOLET","position":{},"banking":true,"bonus":true,"status":"OPEN","contract_name":"Paris","bike_stands":50,"available_bike_stands":46,"available_bikes":4,"last_update":1511264149000}]';

    }

    public function find($id)
    {
        $sql = "select * from t_loisirs where art_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No loisir matching id " . $id);
    }

    public function save(Loisir $article)
    {

        if (isset($_FILES['loisir']['name']['image'])) {
            $md5 = md5(uniqid(rand(1, 100000), true));
            $name = $md5 . $_FILES['loisir']['name']['image'];

            $extensions_valides = array('jpg', 'jpeg', 'gif', 'png', 'ico', 'psd', 'pdf');
            $extension_upload = strtolower(substr(strrchr($_FILES['loisir']['name']['image'], '.'), 1));
            if (in_array($extension_upload, $extensions_valides)) {
                // Upload l'image dans un fichiers Web/images
                $uploads_dir = dirname(dirname(dirname(dirname(__FILE__)))) . '/parcour-5/web/images';
                $tmp_name = $_FILES['loisir']['tmp_name']['image'];
                move_uploaded_file($tmp_name, "$uploads_dir/$name");
            }
        } else {
            $name = $article->getImageModif();
        }

        $dateD = $article->getDateDebut();
        $dateDe = explode(",", $dateD);
        $dateDebut = mktime(20, 12, 20, $dateDe[0], $dateDe[1], $dateDe[2]);

        $dateF = $article->getDateFin();
        $dateFe = explode(",", $dateF);
        $dateFin = mktime(20, 12, 20, $dateFe[0], $dateFe[1], $dateFe[2]);

        // pour des raison de sécuriter j'ai mi deux array ci dessous afin d'empecher l'accer a la validation 'etat' coter utilisateur
        if($article->getImage() == null) {
            $loisirData = array(
                'art_title' => $article->getTitle(),
                'art_content' => $article->getContent(),
                'lien' => $article->getLien(),
                'date_debut' => $dateDebut,
                'date_fin' => $dateFin,
                'etat' => $article->getEtat(),
                'art_position' => $article->getPosition(),
                'type' => $article->getCategorie(),
            );
        } else {
            $loisirData = array(
                'art_title' => $article->getTitle(),
                'art_content' => $article->getContent(),
                'lien' => $article->getLien(),
                'date_debut' => $dateDebut,
                'date_fin' => $dateFin,
                'art_image' => $name,
                'etat' => $article->getEtat(),
                'art_position' => $article->getPosition(),
                'type' => $article->getCategorie(),
            );
        }

        var_dump($article->getImage());

        $loisirDataAdd = array(
            'art_title' => $article->getTitle(),
            'art_content' => $article->getContent(),
            'lien' => $article->getLien(),
            'position_LAT' => $article->getPositionLAT(),
            'position_LNG' => $article->getPositionLNG(),
            'date_debut' => $dateDebut,
            'date_fin' => $dateFin,
            'art_image' => $name,
            'art_position' => $article->getPosition(),
            'type' => $article->getCategorie(),
        );

        if ($article->getId()) {
            // The article has already been saved : update it
            $this->getDb()->update('t_loisirs', $loisirData, array('art_id' => $article->getId()));
        } else {
            // The article has never been saved : insert it
            $this->getDb()->insert('t_loisirs', $loisirDataAdd);
            // Get the id of the newly created article and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $article->setId($id);
        }


    }

    /**
     * Removes an article from the database.
     *
     * @param integer $id The article id.
     */
    public function delete($id)
    {
        // Delete the article
        $this->getDb()->delete('t_loisirs', array('art_id' => $id));
    }
}
