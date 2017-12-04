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

        $debut = 0; $limit = 100;

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
        $loisir->setPostion($row['art_position']);
        $loisir->setImage($row['art_image']);
        $loisir->setPrix($row['prix']);
        $loisir->setType($row['type']);
        $loisir->setNote($row['note']);
        $loisir->setEtat($row['etat']);
        return $loisir;
    }

    public function find($id) {
        $sql = "select * from t_loisirs where art_id=? AND etat = 1";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No loisir matching id " . $id);
    }

    public function save(Loisir $article) {
        $loisirData = array(
            'art_title' => $article->getTitle(),
            'art_content' => $article->getContent(),
        );

        if ($article->getId()) {
            // The article has already been saved : update it
            $this->getDb()->update('t_loisirs', $loisirData, array('art_id' => $article->getId()));
        } else {
            // The article has never been saved : insert it
            $this->getDb()->insert('t_loisirs', $loisirData);
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
    public function delete($id) {
        // Delete the article
        $this->getDb()->delete('t_loisirs', array('art_id' => $id));
    }
}