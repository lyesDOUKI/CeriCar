function sendRequestDelete(buttonValue1) {
    $(".loader").show();
    $.ajax({
        type: 'POST',
        url: "ajaxDispatcher.php?",
        dataType: "html",
        data : {action : "deleteReservation",idCorr : buttonValue1},
        success: function (response, status, xhr) {
            //alert("Ce voyage à été supprimer de votre panier");
            document.getElementById("monBandeau").style.display = "block";
            $("#monBandeau").css("background-color", "green").html("<center>Votre voyage a bien été supprimer</center>");
            $("#monPanier").modal("hide");
            $("#resaUtil").html(response);
            $("#resultatAjax").html("");
            $(".loader").hide();
        }
    })

}




