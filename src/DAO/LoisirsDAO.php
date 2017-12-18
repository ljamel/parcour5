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
    public function findAllIndex() {

        if(isset($_GET["page"])){} else { $_GET["page"] = 0; $_GET["pageSuivant"] = 6; }

        $sql = 'SELECT * FROM t_loisirs WHERE prix BETWEEN 0 AND 2 AND etat = 1 ORDER BY art_id DESC   LIMIT ' . (int)$_GET["page"] . ' ,  ' . (int)$_GET["pageSuivant"];
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $loisirs = array();
        foreach ($result as $row) {
            $loisirId = $row['art_id'];
            $loisirs[$loisirId] = $this->buildDomainObject($row);
        }
        return $loisirs;
    }

    public function findAllMap() {

        $debut = 0; $limit = 60;

        $sql = 'SELECT * FROM t_loisirs WHERE prix BETWEEN 0 AND 2 AND etat = 1  ORDER BY art_id DESC   LIMIT ' . (int)$debut . ' ,  ' . (int)$limit;
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $loisirs = array();
        foreach ($result as $row) {
            $loisirId = $row['art_id'];
            $loisirs[$loisirId] = $this->buildDomainObject($row);
        }
        return $loisirs;
    }

    public function findAll() {


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
    public function findResult() {

        // requête preparer qui evite les injections SQL
        $loisirs = array();
        $stmt = $this->getDb()->prepare("SELECT * FROM t_loisirs where prix < :prix");
        $stmt->bindValue(':prix', htmlspecialchars($_GET['budget']));

        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {
                $loisirId = $row['art_id'];
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
    protected function buildDomainObject(array $row) {
        $loisir = new Loisir();
        $loisir->setId($row['art_id']);
        $loisir->setTitle($row['art_title']);
        $loisir->setContent($row['art_content']);
        $loisir->setPosition($row['art_position']);
        $loisir->setImage($row['art_image']);
        $loisir->setPrix($row['prix']);
        $loisir->setType($row['type']);
        $loisir->setNote($row['note']);
        $loisir->setEtat($row['etat']);
        $loisir->setLien($row['lien']);
        $loisir->setPositionLAT($row['position_LAT']);
        $loisir->setPositionLNG($row['position_LNG']);
        return $loisir;
    }

    public function find($id) {
        $sql = "select * from t_loisirs where art_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No loisir matching id " . $id);
    }

    public function save(Loisir $article) {


        $md5 = md5(uniqid(rand(1, 100000), true));
        $name = $md5 . $_FILES['loisir']['name']['image'];

        $loisirData = array(
            'art_title' => $article->getTitle(),
            'art_content' => $article->getContent(),
            'lien' => $article->getLien(),
            'art_image' => $name,
            'etat' => $article->getEtat(),
            'art_position' => $article->getPosition(),
        );

        $loisirDataAdd = array(
            'art_title' => $article->getTitle(),
            'art_content' => $article->getContent(),
            'lien' => $article->getLien(),
            'art_image' => $name,
            'art_position' => $article->getPosition(),
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

        $extensions_valides = array('jpg', 'jpeg', 'gif', 'png', 'ico', 'psd', 'pdf');
        $extension_upload = strtolower(substr(strrchr($_FILES['loisir']['name']['image'], '.'), 1));
        if (in_array($extension_upload, $extensions_valides)) {
            // Upload l'image dans un fichiers Web/images
            $uploads_dir = dirname(dirname(dirname(dirname(__FILE__)))) . '/parcour-5/web/images';
            $tmp_name = $_FILES['loisir']['tmp_name']['image'];
            move_uploaded_file($tmp_name, "$uploads_dir/$name");
        }
    }

    /**
     * Removes an article from the database.
     *
     * @param integer $id The article id.
     */
    public function delete($id) {
        // Delete the article
        $this->getDb()->delete('t_loisirs', array('art_id' => $id));
    }
}
