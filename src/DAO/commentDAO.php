<?php
/**
 * Created by PhpStorm.
 * User: lamri
 * Date: 06/11/2017
 * Time: 11:10
 */


namespace MicroCMS\DAO;

use MicroCMS\Domain\Comment;

class CommentDAO extends DAO
{
    /**
     * @var \MicroCMS\DAO\LoisirsDAO
     */
    private $LoisirsDAO;

    public function setLoisirsDAO(LoisirsDAO $LoisirsDAO) {
        $this->LoisirsDAO = $LoisirsDAO;
    }

    /**
     * Return a list of all comments for an article, sorted by date (most recent last).
     *
     * @param integer $articleId The article id.
     *
     * @return array A list of all comments for the article.
     */
    public function findAllByLoisir($loisirId) {
        // The associated article is retrieved only once
        $loisir = $this->LoisirsDAO->find($loisirId);

        // art_id is not selected by the SQL query
        // The article won't be retrieved during domain objet construction
        $sql = "select com_id, com_content, com_author from t_comment where art_id=? order by com_id";
        $result = $this->getDb()->fetchAll($sql, array($loisirId));

        // Convert query result to an array of domain objects
        $comments = array();
        foreach ($result as $row) {
            $comId = $row['com_id'];
            $comment = $this->buildDomainObject($row);
            // The associated article is defined for the constructed comment
            $comment->setLoisir($loisir);
            $comments[$comId] = $comment;
        }
        return $comments;
    }

    /**
     * Creates an Comment object based on a DB row.
     *
     * @param array $row The DB row containing Comment data.
     * @return \MicroCMS\Domain\Comment
     */
    protected function buildDomainObject(array $row) {
        $comment = new Comment();
        $comment->setId($row['com_id']);
        $comment->setContent($row['com_content']);
        $comment->setAuthor($row['com_author']);

        if (array_key_exists('art_id', $row)) {
            // Find and set the associated article
            $loisirId = $row['art_id'];
            $loisir = $this->LoisirsDAO->find($loisirId);
            $comment->setLoisir($loisir);
        }

        return $comment;
    }
}