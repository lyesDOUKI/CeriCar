
$("#addTrip").on('submit', function (e) {
    $(".loader").show();
    depart = $(this).find("input[name=departure]").val();
    arrivee = $(this).find("input[name=arrival]").val();
    places = $(this).find("input[name=seats]").val();
    tarif = $(this).find("input[name=price]").val();
    heure = $(this).find("input[name=departureTime]").val();
    contraintes = $(this).find("textarea[name=constraints]").val();
    e.preventDefault()
    $.ajax({
        type: 'POST',
        url: "ajaxDispatcher.php?",
        dataType : "html",
        data : {action : "ajouterUnVoyage",
            departure : depart, arrival : arrivee,
            seats : places, price : tarif,
            departureTime : heure, constraints : contraintes
        },
        success : function(response,status, xhr) {


           //alert("votre voyage à bien été ajouté");
            document.getElementById("monBandeau").style.display = "block";
            $("#monBandeau").css("background-color", "green").html("<center>Votre voyage a bien été ajouté</center>");
            $("#addTripModal").modal("hide");
            $(".loader").hide();
        }
    })

})



