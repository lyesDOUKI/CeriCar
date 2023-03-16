function sendRequestCorr(buttonValue1, buttonValue2) {
    $(".loader").show();
    $.ajax({
        type: 'POST',
        url: "ajaxDispatcher.php?",
        dataType: "html",
        data : {action : "insertCorr", idVoyages : buttonValue1, idConnecter : buttonValue2},
        success: function (response, status, xhr) {
            departTmp = $("#search").find("input[name=depart]").val();
            arriveeTmp = $("#search").find("input[name=arrivee]").val();
            document.getElementById("monBandeau").style.display = "block";
            $("#monBandeau").css("background-color", "green").html("<center>Cette correspondance a été ajouter à votre panier</center>");
            $.ajax({
                type: 'GET',
                url: "ajaxDispatcher.php?action=correspondances",
                dataType : "html",
                data : {depart : departTmp, arrivee : arriveeTmp},
                success : function(response,status, xhr) {


                        $("#resultatAjax").html(response);
                }
            })

            // alert("Cette Correspondance à été ajouter à votre panier");
            $(".loader").hide();
        }
    })

}



