$("#connecte").on('submit', function (e) {
    $(".loader").show();
    identifiant = $(this).find("input[name=identifiantConnex]").val();
    motDePasse = $(this).find("input[name=psw]").val();
    e.preventDefault()
    $.ajax({
        type: 'post',
        url: "ajaxDispatcher.php?",
        dataType: "html",
        data: {action : 'getutil',
            identifiantConnex: identifiant, psw: motDePasse},
        success: function (response, status, xhr) {
            //window.location.reload();
            if (xhr.responseText.search("identifiant ou mot de passe incorrects") > 0) {

                $("#r").html(response);
            }
            else {

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
                $("#resultatAjax").html("");
                document.getElementById("correspondance").style.display = "none";
                a = document.getElementById("idConnecte");
                a.setAttribute("value", response);
                /* a = document.getElementById('idConnecte');
                 //alert("bienvenue " + identifiant);
                 a.setAttribute("value", response);*/
            }
            $(".loader").hide();
        }
        })
    })



