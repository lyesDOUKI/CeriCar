<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/myCss.css">
    <link rel="stylesheet" type="text/css" href="css/modalCSS.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        ceriCar
    </title>
</head>
<body class="bodyClass">
<div id="MAJnavbar">
<nav class="cc-navbar navbar navbar-expand-lg position-fixed navbar-light bg-light w-100" id="navbar">

    <div class="container ">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item pe-4">
                    <a class="nav-link active" aria-current="page" href="#">CeriCar</a>
                </li>
                <li class="nav-item pe-4">
                    <a class="nav-link active" aria-current="page" href="#search">Chercher</a>
                </li>
                <li class="nav-item pe-4">
                    <?php
                    if($context->getSessionAttribute("estConnecter") == null)
                    {
                    ?>
                    <a id="ajouteUnVoyage" class="nav-link active" aria-current="page"
                       data-bs-toggle="modal" data-bs-target="#addTripModal" style="display: none"
                    >Proposer</a>
                    <?php
                    }
                    else
                    {
                        ?>
                    <a id="ajouteUnVoyage" class="nav-link active" aria-current="page"
                       data-bs-toggle="modal" data-bs-target="#addTripModal" style="display: block"
                    >Proposer</a>
                    <?php
                    }
                    ?>
                </li>
            </ul>
            <!-- Button trigger modal -->
            <?php
            if($context->getSessionAttribute("estConnecter") == null)
            {
            ?>
            <div id="divCo">
                <button type="button" class="btn btn-oder me-3" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                 Se connecter
                    </button>
            </div>
            <div id="reserve" style="display: none">
                <form id="remplir" >
                    <input type="hidden" name="idConnecte" id="idConnecte"
                    />
                    <button class="btn btn-oder me-3"
                            type="submit"
                            data-bs-toggle="modal" data-bs-target="#monPanier">Profil</button>
                </form>
            </div>
            <div id="divDeco" style="display: none">
                <form id="deconect" method="post">
                    <input type="hidden" name="deconnexion"/>
                    <button type="submit" class="btn btn-oder" name="action" value="deco"
                            >
                    Se Deconnecter
                    </button>
                </form>
            </div>
         <?php
         }
            else
            {
                ?>
            <div id="divCo" style="display: none">
                <button type="button" class="btn btn-oder me-3" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                    Se connecter
                </button>
            </div>
            <div id="reserve" style="display: block">
                <form id="remplir" >
                    <input type="hidden" name="idConnecte" id="idConnecte"
                           value="<?php echo $context->getSessionAttribute("estConnecter");?>"
                    />
                    <button class="btn btn-oder me-3"
                            type="submit"
                            data-bs-toggle="modal" data-bs-target="#monPanier">Panier</button>
                </form>
            </div>
            <div id="divDeco" style="display: block">
                <form id="deconect" method="post">
                    <input type="hidden" name="deconnexion"/>
                    <button type="submit" class="btn btn-oder" name="action" value="deco"
                    >
                        Se Deconnecter
                    </button>
                </form>
            </div>
            <?php
            }
         ?>
            <script type="text/javascript" src="js/getPanierAjax.js"></script>
            
        </div>
    </div>
</nav>
</div>

<script type="text/javascript" src="js/scrollJs.js"></script>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form">
                    <ul class="tab-group">
                        <li class="tab"><a href="#login">Se connecter</a></li>
                        <li class="tab active"><a href="#signup">S'inscrire</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="login">
                            <h1>Connectez vous</h1>
                            <form class="was-validated" id="connecte">
                                <div class="mb-3 mt-3">
                                    <label for="identifiantConnex" class="form-label">Identifiant</label>
                                    <input type="text" class="form-control" id="identifiantConnex"
                                           placeholder="votre identifiant" name="identifiantConnex" required>
                                    <div class="invalid-feedback">Veuillez saisir votre identifiant</div>
                                </div>
                                <div class="mb-3">
                                    <label for="psw" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" id="psw"
                                           placeholder="mot de passe" name="psw" required>
                                    <div class="invalid-feedback">Veuillez saisir votre mot de passe</div>
                                </div>
                                <div id="r">
                                </div>
                                <br>
                                <button id="b1" type="submit" class="btn btn-oder"
                                    >Se connecter</button>
                            </form>

                        </div>

                        <div id="signup">
                            <h1>Inscrivez vous</h1>
                            <form method="post" class="was-validated" id="sign">
                                <div class="mb-3 mt-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="nom" placeholder="votre nom"
                                           name="nom" required>
                                    <div class="invalid-feedback">Veuillez saisir votre nom</div>
                                </div>
                                <div class="mb-3">
                                    <label for="prenom" class="form-label">Prénom</label>
                                    <input type="text" class="form-control" id="prenom" placeholder="votre prénom"
                                           name="prenom" required>
                                    <div class="invalid-feedback">Veuillez saisir votre prénom</div>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="identifiantSign" class="form-label">Identifiant</label>
                                    <input type="text" class="form-control" id="identifiantSign"
                                           placeholder="votre identifiant" name="identifiantSign" required>
                                    <div class="invalid-feedback">Veuillez saisir votre identifiant</div>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="motDePasse1" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" id="motDePasse1"
                                           placeholder="votre mot de passe" name="motDePasse1" required>
                                    <div class="invalid-feedback">Veuillez saisir votre mot de passe</div>
                                </div>
                                <div class="mb-3 mt-3">
                                    <div id="result">
                                    </div>
                                    <label for="motDePasse2" class="form-label">Confirmez votre mot de passe</label>
                                    <input type="password" class="form-control" id="motDePasse2"
                                           placeholder="votre mot de passe" name="motDePasse2"
                                          onkeyup="verif()"  required>
                                    <div class="invalid-feedback">Veuillez confirmez votre mot de passe</div>
                                </div>


                                <div id="rInsc">

                                </div>
                                <br>
                                <button id="b" type="submit" class="btn btn-oder">S'inscrire</button>
                            </form>

                        </div>

                    </div><!-- tab-content -->

                </div> <!-- /form -->
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="js/checkPsw.js"></script>
<script type="text/javascript" src="js/modalJs.js"></script>

<!-- mon papier !-->
<div class="modal" id="monPanier">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h2 class="modal-title">Votre Profil</h2>
            </div>
            <!-- Modal body -->
                <div id="profil" class="container">
                    <p id="nomProfil"> </p>
                    <p id="prenomProfil"></p>
                    <p id="identProfil" ></p>
                </div>

            <div id="resaUtil" class="container">
            </div>
            <div id="mesVoyage" class="container"></div>
            <script type="text/javascript" src="js/supprimerResa.js"></script>
        </div>
    </div>
</div>
<!-- ajouter un voyage !-->
<div class="modal fade" id="addTripModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTripModalLabel">Ajouter un voyage</h5>

            </div>
            <div class="modal-body">
                <!-- Formulaire pour ajouter un voyage -->
                <form class="was-validated" id="addTrip">
                    <div class="form-group">
                        <label for="departure">Départ</label>
                        <input type="text" class="form-control" id="departure" name="departure" required>
                        <div class="invalid-feedback">Veuillez saisir une ville de départ</div>
                    </div>
                    <div class="form-group">
                        <label for="arrival">Arrivée</label>
                        <input type="text" class="form-control" id="arrival" name="arrival" required>
                        <div class="invalid-feedback">Veuillez saisir une ville d'arrivée</div>
                    </div>
                    <div class="form-group">
                        <label for="seats">Nombre de places</label>
                        <input type="number" class="form-control" id="seats" name="seats" min=1 required>
                        <div class="invalid-feedback">Veuillez saisir le nombre de place</div>
                    </div>
                    <div class="form-group">
                        <label for="price">Tarif (en Euro)</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                        <div class="invalid-feedback">Veuillez saisir le tarif</div>
                    </div>
                    <div class="form-group">
                        <label for="departureTime">Heure de départ</label>
                        <input type="number" class="form-control" id="departureTime" name="departureTime" required>
                        <div class="invalid-feedback">Veuillez saisir l'heure de départ</div>
                    </div>
                    <div class="form-group">
                        <label for="constraints">contraintes</label>
                        <textarea class="form-control" id="constraints" name="constraints" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-oder">Ajouter</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="js/ajouterUnVoyageAjax.js"></script>
<section class="banner pt-5">
    <div class="container">
        <div class="row">
            <div class="form col-md-4"></div>
            <div class="col-md-4"></div>
            <div class = "col-md-4 pt-5 banner-desc">
                <h2>Pas de BlaBlaCar?<br>
                    Pas de panique <br>
                    CeriCar est là<br>
                    Pour vous! <br>


                </h2>
                <p>
                    <a class="btn btn-oder" style="font-family: sans-serif" href="#search">selectionner un voyage</a>

                </p>
            </div>

        </div>
    </div>
</section>

<div  id="monBandeau">
</div>
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <br>
            <h2>Voyager en toute facilité</h2>
            <p>Paris Nice ou Biarritz Amiens
                <br>
                voyager à petit prix dans toute la france
                <br>
                réserver facilement votre voyage!
            </p>
            <br>
            <img src="images/load.gif" class="loader" style="display:none">
        </div>
        <div class = "col-md-5">
            <form class="was-validated" id="search">
                <div class="mb-3 mt-3">
                    <label for="depart" class="form-label">Depart</label>
                    <input type="text" class="form-control" id="depart" placeholder="ville de depart" name="depart" required>
                    <div class="invalid-feedback">Veuillez saisir une ville de depart</div>
                </div>
                <div class="mb-3">
                    <label for="arrivee" class="form-label">Arrivée</label>
                    <input type="text" class="form-control" id="arrivee" placeholder="ville d'arrivée" name="arrivee" required>
                    <div class="invalid-feedback">Veuillez saisir une ville d'arrivée</div>
                </div>
                <br>
                <button id="trajet" type="submit" class="btn btn-oder me-3" name="action" value="voyages">chercher</button>
            </form>
            <form class="pt-3 was-validated" id="cor">
                <div id="correspondance" style="display: none">
                    <button type="submit" class="btn btn-oder">voir Correspondances</button>
                </div>
            </form>

        </div>
    </div>
</div>
<br>
<br>

<script type="text/javascript" src="js/AjoutePanierVoyageAjax.js"></script>
<script type="text/javascript" src="js/ajouterUneCorrespondanceAjax.js"></script>
<script type="text/javascript" src="js/supprimerResa.js"></script>

<?php if($context->getSessionAttribute('user_id')): ?>
    <?php echo $context->getSessionAttribute('user_id')." est connecte"; ?>
<?php endif; ?>

<div id="page">
    <?php if($context->error): ?>
        <div id="flash_error" class="error">
            <?php echo " $context->error !!!!!" ?>
        </div>
    <?php endif; ?>
    <div class="pt-5" id="page_maincontent">

        <?php
        if($context->getSessionAttribute("estConnecter") == null)
        {
            ?>
        <div id="index" style="display: block">
            <?php
            include($template_view);
            ?>
        </div>
        <?php
        }
        else
        {
            ?>
            <div id="index" style="display: none">
            <?php
            include($template_view);
        }
        ?>
    </div>
</div>
<br>
<div class="container">
    <br>

    <div id="resultatAjax">
        <?php
        
        ?>
    </div>
</div>


<script type="text/javascript" src="js/recupereVoyageAjax.js"></script>
<script type="text/javascript" src="js/correspondanceAjax.js"></script>
<script type="text/javascript" src="js/connexionAjax.js"></script>
<script type="text/javascript" src="js/inscriptionAjax.js"></script>
<script type="text/javascript" src="js/decoAjax.js"></script>
<footer class="text-center text-white py-3">
    <!-- Grid container -->
    <div class="container pt-5">
        <!-- Section: Images -->
        <section class="">
            <div class="foot">
                    <img src="./images/fondPage.jpg" class="w-50"/>
        </section>
        <!-- Section: Images -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center text-dark p-3" >
        © 2022 Copyright
    </div>
    <!-- Copyright -->
</footer>
</body>
</html>
