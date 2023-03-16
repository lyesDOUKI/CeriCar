function sendRequest(buttonValue1, buttonValue2, buttonValue3) {
    $(".loader").show();

    $.ajax({
        type: 'POST',
        url: "ajaxDispatcher.php?",
        dataType: "html",
        data : {action : "ajouterUneReservation",
            idVoyage : buttonValue1, idConnecter : buttonValue2, nombreDePlace : buttonValue3},
        success: function (response, status, xhr) {
            departTmp = $("#search").find("input[name=depart]").val();
            arriveeTmp = $("#search").find("input[name=arrivee]").val();
            //alert("Ce voyage à été ajouter à votre panier");
            //alert(buttonValue3);
            document.getElementById("monBandeau").style.display = "block";
            $("#monBandeau").css("background-color", "green").html("<center>Ce voyage a été ajouter à votre panier</center>");
            $.ajax({
                type: 'GET',
                url: "ajaxDispatcher.php?action=voyages",
                dataType : "html",
                data : {depart : departTmp, arrivee : arriveeTmp},
                success : function(response,status, xhr) {

                        $("#resultatAjax").html(response);

                }
            })
            $(".loader").hide();
        }
    })

}




