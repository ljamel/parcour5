<?php
/**
 * Created by PhpStorm.
 * User: lamri
 * Date: 06/11/2017
 * Time: 10:15
 */


namespace MicroCMS\Domain;

class Comment
{
    /**
     * Comment id.
     *
     * @var integer
     */
    private $id;

    /**
     * Comment author.
     *
     * @var string
     */
    private $author;

    /**
     * Comment content.
     *
     * @var integer
     */
    private $content;

    private $signale;

    /**
     * Associated article.
     *
     * @var \MicroCMS\Domain\Loisir
     */
    private $loisir;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor(User $author) {
        $this->author = $author;
        return $this;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    public function getLoisir() {
        return $this->loisir;
    }

    public function setLoisir(Loisir $loisir) {
        $this->loisir = $loisir;
        return $this;
    }

    public function getSignale() {
        return $this->signale;
    }
    public function setSignale($signale) {
        $this->signale = $signale;
        return $this;
    }
}
