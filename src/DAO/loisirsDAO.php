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
    public function findAll() {

        if(isset($_GET["page"])){} else { $_GET["page"] = 0; $_GET["pageSuivant"] = 6; }

        $sql = 'SELECT * FROM t_article WHERE prix BETWEEN 0 AND 2 ORDER BY art_id DESC   LIMIT ' . (int)$_GET["page"] . ' ,  ' . (int)$_GET["pageSuivant"];
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
        return $loisir;
    }

    public function find($id) {
        $sql = "select * from t_article where art_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No loisir matching id " . $id);
    }
}