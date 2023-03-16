<?php

use Doctrine\Common\Collections\ArrayCollection;


/** 
 * @Entity
 * @Table(name="jabaianb.reservation")
 */

 class reservation
 {
    /** @Id @Column(type="integer")
	 *  @GeneratedValue
	 */ 
	public $id;

    /** 
     * @ManyToOne(targetEntity="voyage", inversedBy="id")
    * @JoinColumn(name="voyage", referencedColumnName ="id") */

    public $voyage;

     /** 
     * @ManyToOne(targetEntity="utilisateur", inversedBy="id")
    * @JoinColumn(name="voyageur", referencedColumnName ="id") */

    public $voyageur;

     public function __toString()
     {
         $format = 'id : %s | voyage : %s | voyageur : %s';
         return sprintf($format,$this->id, $this->voyage, $this->voyageur);
    }

     /**
      * @param mixed $id
      */
     public function setId($id)
     {
         $this->id = $id;
     }

     /**
      * @param mixed $voyage
      */
     public function setVoyage($voyage)
     {
         $this->voyage = $voyage;
     }

     /**
      * @param mixed $voyageur
      */
     public function setVoyageur($voyageur)
     {
         $this->voyageur = $voyageur;
     }

 }
?>