<?php
// Inclusion de la classe reservation
require_once "reservation.class.php";

class reservationTable
{
    public static function getReservationByVoyage($voyage)
    {
        $em = dbconnection::getInstance()->getEntityManager();
        $reservationRepository = $em->getRepository('reservation');
        $reservations = $reservationRepository->findBy(array('voyage'=>$voyage));
        return $reservations;
    }
    public static function getreservationById($id)
    {
        $em = dbconnection::getInstance()->getEntityManager();
        $reservationRepository = $em->getRepository('reservation');
        $reservations = $reservationRepository->find($id);

        return $reservations;
    }
    public static function getReservationByUser($user)
    {
        $em = dbconnection::getInstance()->getEntityManager();
        $reservationRepository = $em->getRepository('reservation');
        $reservations = $reservationRepository->findBy(array('voyageur'=>$user));
        return $reservations;
    }
    public static function ajouterReservation($request)
    {
        $em = dbconnection::getInstance()->getEntityManager();
        $userRepository = $em->getRepository('reservation');
        for($i=0; $i < $request['nombreDePlace']; $i++)
        {
        $reservation = new reservation();
        $v = voyageTable::getVoyageById($request['idVoyage']);
        $reservation->setVoyage($v);
        $voyageRepository = $em->getRepository('voyage');
        $voyage = $voyageRepository->find($request['idVoyage']);
        $voyage->setNbPlace($voyage->getNbPlace()-1);
        $u = utilisateurTable::getUserById($request['idConnecter']);
        $reservation->setVoyageur($u);
        $em->persist($reservation);
        }
        $em->flush();

    }
    public static function ajouterCorrespondance($request)
    {
        $em = dbconnection::getInstance()->getEntityManager();
        $userRepository = $em->getRepository('reservation');
        $lesId = $request['idVoyages'];
        $tmp1 = explode(",",$lesId);
        for($i=0;$i<count($tmp1);$i++) {
            $reservation = new reservation();
            $v = voyageTable::getVoyageById($tmp1[$i]);
            $reservation->setVoyage($v);
            $voyageRepository = $em->getRepository('voyage');
            $voyage = $voyageRepository->find($tmp1[$i]);
            $voyage->setNbPlace($voyage->getNbPlace()-1);
            $u = utilisateurTable::getUserById($request['idConnecter']);
            $reservation->setVoyageur($u);
            $em->persist($reservation);
        }
        $em->flush();
    }
  public static function supprimerReservation($id)
    {
        $em = dbconnection::getInstance()->getEntityManager();
        $reservationRepository = $em->getRepository('reservation');
        $reservation = $reservationRepository->find($id);
        $voyageRepository = $em->getRepository('voyage');
        $voyage = $voyageRepository->find($reservation->voyage->id);
        $voyage->setNbPlace($voyage->getNbPlace()+1);
        $em->remove($reservation);
        $em->flush();
    }
}