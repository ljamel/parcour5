<?php

namespace MicroCMS\DAO;

use MicroCMS\Domain\Comment;

class CommentDAO extends DAO
{
    /**
     * @var \MicroCMS\DAO\LoisirsDAO
     */
    private $LoisirDAO;

    /**
     * @var \MicroCMS\DAO\UserDAO
     */
    private $userDAO;

    public function setLoisirDAO(LoisirsDAO $LoisirDAO) {
        $this->LoisirDAO = $LoisirDAO;
    }

    public function setUserDAO(UserDAO $userDAO) {
        $this->userDAO = $userDAO;
    }

    /**
     * Return a list of all comments for an loisir, sorted by date (most recent last).
     *
     * @param integer $loisirId The loisir id.
     *
     * @return array A list of all comments for the losir.
     */
    public function findAllByLoisir($loisirId) {
        // The associated loisir is retrieved only once
        $loisir = $this->LoisirDAO->find($loisirId);

        // art_id is not selected by the SQL query
        // The loisir won't be retrieved during domain objet construction
        $sql = "select * from t_comment where art_id=? order by com_id";
        $result = $this->getDb()->fetchAll($sql, array($loisirId));

        // Convert query result to an array of domain objects
        $comments = array();
        foreach ($result as $row) {
            $comId = $row['com_id'];
            $comment = $this->buildDomainObject($row);
            // The associated loisir is defined for the constructed comment
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
        $comment->setSignale($row['signale']);

        if (array_key_exists('art_id', $row)) {
            // Find and set the associated
            $loisirId = $row['art_id'];
            $loisir = $this->LoisirDAO->find($loisirId);
            $comment->setLoisir($loisir);
        }
        if (array_key_exists('usr_id', $row)) {
            // Find and set the associated author
            $userId = $row['usr_id'];
            $user = $this->userDAO->find($userId);
            $comment->setAuthor($user);
        }

        return $comment;
    }

    public function save(Comment $comment) {
        $commentData = array(
            'signale' => "1",
            'com_content' => $comment->getContent(),
            'art_id' => $comment->getLoisir()->getId(),
            'usr_id' => $comment->getAuthor()->getId(),
        );
        var_dump($commentData);
        if ($comment->getId()) {
            // The comment has already been saved : update it
            $this->getDb()->update('t_comment', $commentData, array('com_id' => $comment->getId()));


        } else {
            // The comment has never been saved : insert it
            $this->getDb()->insert('t_comment', $commentData);
            // Get the id of the newly created comment and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $comment->setId($id);
        }
    }

    public function findAll() {
        $sql = "select * from t_comment order by com_id desc";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $entities = array();
        foreach ($result as $row) {
            $id = $row['com_id'];
            $entities[$id] = $this->buildDomainObject($row);
        }
        return $entities;
    }

    public function deleteAllByLoisir($loisirId) {
        $this->getDb()->delete('t_comment', array('art_id' => $loisirId));
    }

    public function find($id) {
        $sql = "select * from t_comment where com_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No comment matching id " . $id);
    }

    // ...

    /**
     * Removes a comment from the database.
     *
     * @param @param integer $id The comment id
     */
    public function delete($id) {
        // Delete the comment
        $this->getDb()->delete('t_comment', array('com_id' => $id));
    }

    public function deleteAllByUser($userId) {
        $this->getDb()->delete('t_comment', array('usr_id' => $userId));
    }

    public function signale($id) {
        $comment = $this->find($id);
        $commentData = array(
            'signale' => $comment->getSignale() + 1
        );
        $this->getDb()->update('t_comment', $commentData, array('com_id' => $id));
    }
}