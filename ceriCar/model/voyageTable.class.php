<?php
// Inclusion de la classe voyage
require_once "voyage.class.php";
class voyageTable
{
    public static function getVoyageByTrajet($trajet)
    {
        $em = dbconnection::getInstance()->getEntityManager();
        $voyageRepository = $em->getRepository('voyage');

        $query = $voyageRepository->createQueryBuilder('v')
            ->where('v.nbPlace > 0')
            ->andWhere('v.trajet = :trajet')
        ->setParameter('trajet', $trajet);
        $voyages = $query->getQuery()->getResult();
        return $voyages;
    }
    public static function getVoyageById($id)
    {
        $em = dbconnection::getInstance()->getEntityManager();
        $voyageRepository = $em->getRepository('voyage');
        $voyage = $voyageRepository->find($id);
        return $voyage;
    }
    public static function getCorrespondances($request)
    {
        $em = dbconnection::getInstance()->getEntityManager()->getConnection() ;
        $requete = $em->prepare("select * from chercherCorrespondances(:depart,:arrivee,'','',0,0,'',0)");
        $requete->bindValue('depart',$request['depart']);
        $requete->bindValue('arrivee',$request['arrivee']);
        $bool = $requete->execute();
        if ($bool == false){
            return NULL;
        }
        return $requete->fetchAll();
    }

    public static function addTrip($request)
    {
        $em = dbconnection::getInstance()->getEntityManager();
        $voyageRepository = $em->getRepository('voyage');
        $tmpDepart = $request['departure'];
        $tmpArrivee = $request['arrival'];
        $tmpTrajet = trajetTable::getTrajet($tmpDepart,$tmpArrivee);
        $voyage = new voyage();
        $tmpConducteur = utilisateurTable::getUserById($request['conducteur']);
        $voyage->setConducteur($tmpConducteur);
        $voyage->setTrajet($tmpTrajet);
        $voyage->setHeureDepart($request['departureTime']);
        $voyage->setNbPlace($request['seats']);
        $voyage->setTarif($request['price']);
        $voyage->setContraintes($request['constraints']);
        $em->persist($voyage); //enregistrer l'objet dans la base de données
        $em->flush(); //synchronisé la BDD
    }
    public static function getVoyageProposer($request)
    {
        $em = dbconnection::getInstance()->getEntityManager();
        $voyageRepository = $em->getRepository('voyage');
        $voyage = $voyageRepository->findBy(array("conducteur"=>$request['conducteur']));
        return $voyage;
    }

}