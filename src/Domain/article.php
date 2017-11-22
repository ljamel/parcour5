<?php

namespace MicroCMS\Domain;

class Article
{
    /**
     * Article id.
     *
     * @var integer
     */
    private $id;

    /**
     * Article title.
     *
     * @var string
     */
    private $title;

    /**
     * Article content.
     *
     * @var string
     */
    private $content;

    private $position;

    private $image;

    private $prix;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    public function getPosition(){
        return $this->position;
    }

    public function setPostion($position) {
        $this->position = $position;
        return $this;
    }

    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image = $image;
        return $this;
    }

    public function getPrix() {
        return $this->prix;
    }
    public function setPrix($prix) {
        $this->prix = $prix;
        return $this;
    }
}