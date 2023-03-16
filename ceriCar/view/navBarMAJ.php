<div id="MAJnavbar">
    <nav class="cc-navbar navbar navbar-expand-lg position-fixed navbar-light bg-light w-100" id="navbar">
        <div class="container ">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a id="ajouteUnVoyage" class="nav-link active" aria-current="page"
                           data-bs-toggle="modal" data-bs-target="#addTripModal" style="display:block;"
                        >Proposer</a>
                    </li>
                </ul>
                <!-- Button trigger modal -->
                <div id="divCo" style="display: none">
                    <button type="button" class="btn btn-oder me-3" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                        Se connecter
                    </button>
                </div>
                <div id="reserve" style="display: block;">
                    <form id="remplir" >
                        <input type="hidden" name="idConnecte" id="idConnecte"
                        />
                        <button class="btn btn-oder me-3"
                                type="submit"
                                data-bs-toggle="modal" data-bs-target="#monPanier">Panier</button>
                    </form>
                </div>
                <script type="text/javascript" src="js/remplirPanierAjax.js"></script>
                <div id="divDeco" style="display:block;">
                    <form method="post">
                        <button type="submit" class="btn btn-oder" id="deconnexion" name="deconnexion" value="deco" onclick="document.location.href='#'">
                            Se Deconnecter
                        </button>
                    </form>


                </div>
            </div>
        </div>
    </nav>
</div>