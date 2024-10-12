<?php
class Article
{
    //Les attributs
    private $libelle;
    private $prix;
    private $qte;
    private $category;
    private $descrition;

    //Le constructeur
    public function __construct($libel, $price)
    {
        $this->libelle = $libel;
        $this->prix = $price;
        $this->category = "Scolaire";
    }

    //Les getter et setter
    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle($libel)
    {
        $this->libelle = $libel;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix(int $prix)
    {
        if ($prix <= 0) {
            return $this;
        }
        $this->prix = $prix;
    }


    /**
     * Get the value of descrition
     */
    public function getDescrition()
    {
        return $this->descrition;
    }

    /**
     * Set the value of descrition
     *
     * @return  self
     */
    public function setDescrition($descrition)
    {
        $this->descrition = $descrition;

        return $this;
    }

    /**
     * Get the value of category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    public function __toString()
    {
        return $this->libelle . ' ' . $this->prix;
    }
}
