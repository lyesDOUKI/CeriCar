<?php

class mainController
{

	public static function helloWorld($request,$context)
	{
		$context->mavariable="hello world";
		return context::SUCCESS;
	}

    public static function chercheVoyage($request, $context)
    {
        return context::SUCCESS;
    }

    public static function deco($request, $context)
    {
        if(isset($request['deconnexion']))
        {
            return context::SUCCESS;
        }

    }
	public static function index($request,$context){
        if(isset($request['deconnexion']))
        {

            return context::SUCCESS;
        }
		return context::SUCCESS;
	}

	public static function superTest($request,$context)
    {
		if(isset($request['param1']) and isset($request['param2'])) {
            $context->par1 = $request['param1'];
            $context->par2 = $request['param2'];
        }
		return context::SUCCESS;
	}
    public static function getutil($request, $context)
    {
        if(isset($request['identifiantConnex']) && isset($request['psw']))
        {
            $context->user = utilisateurTable::getUserByLoginAndPass($request['identifiantConnex'], ($request['psw']));
            if($context->user == false)
            {

                return context::ERROR;
            }
            else
            {
                //créer une variable de session
                $context->setSessionAttribute("estConnecter",$context->user->id);
                return context::SUCCESS;
            }
        }

    }
    public static function utilisateurById($request, $context)
    {
        if (isset($request['id'])) {
            $context->user = utilisateurTable::getUserById($request['id']);
        }
        return context::SUCCESS;
    }
    public static function unTrajet($request, $context)
    {
        if(isset($request['depart']) and isset($request['arrivee'])) {

            $context->trajet = trajetTable::getTrajet($request['depart'], $request['arrivee']);
        }
        return context::SUCCESS;
    }
    public static function voyages($request, $context)
    {

            if (isset($request['depart']) and $request['arrivee']) {
                //recuperer d'abord le trajet
                $context->trajet = trajetTable::getTrajet($request['depart'], $request['arrivee']);
                $context->voyage = voyageTable::getVoyageByTrajet($context->trajet);
            }
            if($context->trajet == null)
            {
                $context->error = "pas de trajet";
                return context::ERROR;

            }

        if($context->voyage != null)
        {
            if(context::getInstance()->getSessionAttribute("estConnecter") != null) {
                // si l'utilisateur est connecter : récuperer son id
                $context->idUtilisateur = context::getInstance()->getSessionAttribute("estConnecter");
            }
            return context::SUCCESS;
        }
        else
        {
            $context->error = "voyage non trouvé";
            return context::ERROR;
        }


    }
    public static function reservations($request, $context)
    {
        if(isset($request['voyage'])) {
            $context->reservation = reservationTable::getReservationByVoyage($request['voyage']);
        }
        return context::SUCCESS;

    }
    public static function createUser($request, $context)
    {
    $context->userTmp = utilisateurTable::getUserByIdentifiant($request['identifiantSign']);

        if($context->userTmp == true)
        {
            return context::ERROR;
        }
        else {

            $context->user = utilisateurTable::setUser($request);
            //creer une session pour l utilisateur qui vient de s'inscrire
            $context->setSessionAttribute("estConnecter",$context->user->id);
            return context::SUCCESS;

        }
    }
    public static function correspondances($request,$context)
    {
        $context->cor = voyageTable::getCorrespondances($request);
        if($context->cor == true)
        {
            if(context::getInstance()->getSessionAttribute("estConnecter") != null) {
                //si l utilisateur est connecter : récuperer sa session
                $context->idUtilisateur = context::getInstance()->getSessionAttribute("estConnecter");
            }
            return context::SUCCESS;

        }
        else
        {
            $context->error = "correspondances non trouvé";
            return context::ERROR;
        }

    }
    public static function getReservation($request,$context)
    {
        if(isset($request['idConnecte'])) {
            $context->reservation = reservationTable::getReservationByUser($request['idConnecte']);
        }
        return context::SUCCESS;
    }
    public static function ajouterUneReservation($request, $context)
    {
        reservationTable::ajouterReservation($request);
        return context::SUCCESS;
    }
    public static function insertCorr($request, $context)
    {
        reservationTable::ajouterCorrespondance($request);
        return context::SUCCESS;
    }
    public static function deleteReservation($request, $context)
    {
        reservationTable::supprimerReservation($request['idCorr']);
        $context->idUtilisateur = context::getInstance()->getSessionAttribute("estConnecter");
        $context->reservation = reservationTable::getReservationByUser($context->idUtilisateur);
        return context::SUCCESS;
    }
    public static function ajouterUnVoyage($request,$context)
    {
        $request['conducteur'] = context::getInstance()->getSessionAttribute("estConnecter");
        voyageTable::addTrip($request);
        return context::SUCCESS;
    }
    public static function getVoyageProposer($request,$context)
    {
        $request['conducteur'] = context::getInstance()->getSessionAttribute("estConnecter");
        $context->voyage = voyageTable::getVoyageProposer($request);
        return context::SUCCESS;
    }
}

    /* ?action=nomFonction&parametres*/
