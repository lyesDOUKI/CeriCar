<?php
// Inclusion de la classe utilisateur
require_once "utilisateur.class.php";

class utilisateurTable
{

	public static function getUserByLoginAndPass($login, $pass)
	{
		$em = dbconnection::getInstance()->getEntityManager();
		$userRepository = $em->getRepository('utilisateur');
		$user = $userRepository->findOneBy(array('identifiant' => $login, 'pass' => sha1($pass)));
		return $user;
	}

	public static function getUserById($id)
	{
		$em = dbconnection::getInstance()->getEntityManager();
		$userRepository = $em->getRepository('utilisateur');
		$user = $userRepository->find($id);
		return $user;

	}

	public static function getUserByIdentifiant($identifiant)
	{
		$em = dbconnection::getInstance()->getEntityManager();
		$userRepository = $em->getRepository('utilisateur');
		$user = $userRepository->findOneBy(array('identifiant' => $identifiant));
		return $user;
	}

	public static function setUser($request)
	{
		$em = dbconnection::getInstance()->getEntityManager();
		$userRepository = $em->getRepository('utilisateur');
		$user = new utilisateur();
		$user->setIdentifiant($request['identifiantSign']);
		$user->setNom($request['nom']);
		$user->setPrenom($request['prenom']);
		$user->setPass(($request['motDePasse1']));
		$em->persist($user);
		$em->flush();
		return $user;
	}

}

?>
