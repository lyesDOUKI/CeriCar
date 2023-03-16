$("#cor").on('submit', function (e) {
    $(".loader").show();
    departTmp = $("#search").find("input[name=depart]").val();
    arriveeTmp = $("#search").find("input[name=arrivee]").val();
    e.preventDefault()
    $.ajax({
        type: 'GET',
        url: "ajaxDispatcher.php?action=correspondances",
        dataType : "html",
        data : {depart : departTmp, arrivee : arriveeTmp},
        success : function(response,status, xhr) {
            if (xhr.responseText.search("correspondances non trouvé") > 0) {

                $("#monBandeau").css("background-color", "red").html("<center>aucune correspondance trouvé</center>");
                $("#resultatAjax").html("<h4>aucune correspondance pour le trajet " + departTmp +"-"+arriveeTmp+ " n'a été trouvé</h4>");
            }
            else
            {
                    $("#monBandeau").css("background-color", "green").html("<center>correspondances trouvé</center>");
                    $("#resultatAjax").html(response);


                }
            $(".loader").hide();
            }

    })

})



