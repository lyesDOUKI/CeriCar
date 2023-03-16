<?php

use Doctrine\Common\Collections\ArrayCollection;

/** 
 * @Entity
 * @Table(name="jabaianb.utilisateur")
 */
class utilisateur{

	/** @Id @Column(type="integer")
	 *  @GeneratedValue
	 */ 
	public $id;

	/** @Column(type="string", length=45) */ 
	public $identifiant;
		
	/** @Column(type="string", length=45) */ 
	public $pass;

	/** @Column(type="string", length=45) */ 
	public $nom;

	/** @Column(type="string", length=45) */ 
	public $prenom;

	/** @Column(type="string", length=200) */ 
	public $avatar;



	public function __toString()
	{
		// TODO: Implement __toString() method.
		$format = 'id : %s | identifiant : %s | pass : %s | nom : %s | prenom : %s | avatar : %s';
		return sprintf($format, $this->id, $this->identifiant,
						$this->pass, $this->nom, $this->prenom, $this->avatar);
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @param mixed $identifiant
	 */
	public function setIdentifiant($identifiant)
	{
		$this->identifiant = $identifiant;
	}

	/**
	 * @param mixed $pass
	 */
	public function setPass($pass)
	{
		$this->pass = sha1($pass);
	}

	/**
	 * @param mixed $nom
	 */
	public function setNom($nom)
	{
		$this->nom = $nom;
	}

	/**
	 * @param mixed $prenom
	 */
	public function setPrenom($prenom)
	{
		$this->prenom = $prenom;
	}

	/**
	 * @param mixed $avatar
	 */
	public function setAvatar($avatar)
	{
		$this->avatar = $avatar;
	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getIdentifiant()
	{
		return $this->identifiant;
	}

	/**
	 * @return mixed
	 */
	public function getPass()
	{
		return $this->pass;
	}

	/**
	 * @return mixed
	 */
	public function getNom()
	{
		return $this->nom;
	}

	/**
	 * @return mixed
	 */
	public function getPrenom()
	{
		return $this->prenom;
	}

	/**
	 * @return mixed
	 */
	public function getAvatar()
	{
		return $this->avatar;
	}

}
?>
