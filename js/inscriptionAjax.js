
$("#sign").on('submit', function (e) {
    $(".loader").show();
    nomTmp = $(this).find("input[name=nom]").val();
    prenomTmp = $(this).find("input[name=prenom]").val();
    identifiant = $(this).find("input[name=identifiantSign]").val();
    motDePasseA = $(this).find("input[name=motDePasse1]").val();
    motDePasseB = $(this).find("input[name=motDePasse2]").val();

    e.preventDefault()
    $.ajax({
        type: 'POST',
        url: "ajaxDispatcher.php",
        dataType : "html",
        data : {action : 'createUser', nom : nomTmp, prenom : prenomTmp,
        identifiantSign : identifiant, motDePasse1 : motDePasseA, motDePasse2 : motDePasseB},
        success : function(response,status, xhr) {

            if(xhr.responseText.search("vuErreur")>0)
            {
                $("#rInsc").html("identifiant déja éxistant");
            }else
            {
                document.getElementById("index").style.display = "none";
                document.getElementById("monBandeau").style.display = "block";
                $("#monBandeau").css("background-color", "green").html("<center>bienvenue "+ identifiant + "</center>");
                var anchor = document.getElementById("monBandeau");
                anchor.scrollIntoView();
                $("#exampleModal").modal("hide");
                document.getElementById("divCo").style.display = "none";
                document.getElementById("divDeco").style.display = "block";
                document.getElementById("ajouteUnVoyage").style.display = "block";
                document.getElementById("reserve").style.display = "block";
                a = document.getElementById("idConnecte");

                a.setAttribute("value", response);
            }
            $(".loader").hide();
        }
    })

})



