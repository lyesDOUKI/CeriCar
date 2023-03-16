<?php

use Doctrine\Common\Collections\ArrayCollection;

/** 
 * @Entity
 * @Table(name="jabaianb.voyage")
 */

 class voyage
 {

     /** @Id @Column(type="integer")
      * @GeneratedValue
      */
     public $id;

     /**
      * @ManyToOne(targetEntity="utilisateur", inversedBy="id")
      * @JoinColumn(name="conducteur", referencedColumnName ="id")
      */
     public $conducteur;

     /** @Column(type="integer") */
     public $tarif;

     /** @Column(type="integer") */
     public $nbPlace;


     /** @Column(type="integer") */
     public $heureDepart;


     /** @Column(type="string", length=500) */
     public $contraintes;

     /**
      * @ManyToOne(targetEntity="trajet", inversedBy="id")
      * @JoinColumn(name="trajet", referencedColumnName ="id")
      */
     public $trajet;

     public function __toString()
     {
         $format = 'id : %s | conducteur : %s | trajet : %s | tarif : %s | nbPlaces : %s 
            | heureDepart : %s | contraintes : %s';

         return sprintf($format, $this->id, $this->conducteur, $this->trajet,
             $this->tarif, $this->nbPlace, $this->heureDepart, $this->contraintes);
     }

     /**
      * @param mixed $nbPlace
      */
     public function setNbPlace($nbPlace)
     {
         $this->nbPlace = $nbPlace;
     }

     /**
      * @return mixed
      */
     public function getNbPlace()
     {
         return $this->nbPlace;
     }

     /**
      * @param mixed $conducteur
      */
     public function setConducteur($conducteur)
     {
         $this->conducteur = $conducteur;
     }

     /**
      * @param mixed $tarif
      */
     public function setTarif($tarif)
     {
         $this->tarif = $tarif;
     }

     /**
      * @param mixed $heureDepart
      */
     public function setHeureDepart($heureDepart)
     {
         $this->heureDepart = $heureDepart;
     }

     /**
      * @param mixed $contraintes
      */
     public function setContraintes($contraintes)
     {
         $this->contraintes = $contraintes;
     }

     /**
      * @param mixed $trajet
      */
     public function setTrajet($trajet)
     {
         $this->trajet = $trajet;
     }


 }
?>

