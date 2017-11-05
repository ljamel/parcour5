<?php

namespace MicroCMS\DAO;

use Doctrine\DBAL\Connection;
use MicroCMS\Domain\Article;

class ArticleDAO
{
    /**
     * Database connection
     *
     * @var \Doctrine\DBAL\Connection
     */
    private $db;

    /**
     * Constructor
     *
     * @param \Doctrine\DBAL\Connection The database connection object
     */
    public function __construct(Connection $db) {
        $this->db = $db;
    }

    /**
     * Return a list of all articles, sorted by date (most recent first).
     *
     * @return array A list of all articles.
     */
    public function findAll() {
        $sql = "select * from t_article order by art_id desc";
        $result = $this->db->fetchAll($sql);

        // Convert query result to an array of domain objects
        $articles = array();
        foreach ($result as $row) {
            $articleId = $row['art_id'];
            $articles[$articleId] = $this->buildArticle($row);
        }
        return $articles;
    }

    public function find($id) {
        $sql = "select * from t_log";
        $result = $this->db->fetchAll($sql);

        $log = array();

        foreach ($result as $row) {

        }

        return $log;
    }

    public function delete($id) // pas encor utiliser PS penser à l'essayer
    {
        $this->dao->exec('DELETE FROM news WHERE id = ' . (int)$id);
    }

    /**
     * Creates an Article object based on a DB row.
     *
     * @param array $row The DB row containing Article data.
     * @return \MicroCMS\Domain\Article
     */

    // Le resultat de la ba se données est envoyer dans le seteur -> fichier Domain/article.php
    private function buildArticle(array $row) {
        $article = new Article();
        $article->setId($row['art_id']);
        $article->setTitle($row['art_title']);
        $article->setContent($row['art_content']);
        return $article;
    }
}