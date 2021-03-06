<?php

namespace MicroCMS\Domain;

class Loisir
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

    private $positionLAT;

    private $positionLNG;

    private $image;

    private $prix;

    private $categorie;

    private $note;

    private $lien;

    private $distance;

    private $dateDebut;

    private $dateFin;

    private $imageModif;


    /*
     * $etat Permet de savoir l'etat du loisirs poster 0 = en attente, 1 = publier, 3 = signaler
     */
    private $etat;

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

    public function setPosition($position) {
        $this->position = $position;
        return $this;
    }

    public function getPositionLAT(){
        return $this->positionLAT;
    }

    public function setPositionLAT($positionLAT) {
        $this->positionLAT = $positionLAT;
        return $this;
    }
    public function getPositionLNG(){
        return $this->positionLNG;
    }

    public function setPositionLNG($positionLNG) {
        $this->positionLNG = $positionLNG;
        return $this;
    }

    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image = $image;
        return $this;
    }

    public function getImageModif() {
        return $this->imageModif;
    }
    public function setImageModif($imageModif) {
        $this->imageModif = $imageModif;
        return $this;
    }

    public function getPrix() {
        return $this->prix;
    }
    public function setPrix($prix) {
        $this->prix = $prix;
        return $this;
    }

    public function getCategorie() {
        return $this->categorie;
    }
    public function setCategorie($categorie) {
        $this->categorie = $categorie;
        return $this;
    }

    public function getNote() {
        return $this->note;
    }
    public function setNote($note) {
        $this->note = $note;
        return $this;
    }

    public function getEtat() {
        return $this->etat;
    }
    public function setEtat($etat) {
        $this->etat = $etat;
        return $this;
    }

    public function getLien() {
        return $this->lien;
    }
    public function setLien($lien) {
        $this->lien = $lien;
        return $this;
    }

    public function getDistance()  {
        return $this->distance;
    }
    public function setDistance($distance) {
        $this->distance = $distance;
        return $this;
    }

    public function getDateDebut() {
        return $this->dateDebut;
    }
    public function setDateDebut($dateDebut) {
        $this->dateDebut = $dateDebut;
        return $this;
    }

    public function getDateFin() {
        return $this->dateFin;
    }
    public function setDateFin($dateFin) {
        $this->dateFin = $dateFin;
        return $this;
    }

}
