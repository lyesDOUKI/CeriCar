
$("#search").on('submit', function (e) {

        $(".loader").show();
        departTmp = $(this).find("input[name=depart]").val();
        arriveeTmp = $(this).find("input[name=arrivee]").val();


        e.preventDefault()
$.ajax({
        type: 'GET',
        url: "ajaxDispatcher.php?action=voyages",
        dataType : "html",
        data : {depart : departTmp, arrivee : arriveeTmp},
        success : function(response,status, xhr) {

            if (xhr.responseText.search("voyage non trouvé") > 0) {
                document.getElementById("correspondance").style.display = "block";
                $("#monBandeau").css("background-color", "red").html("<center>aucun voyage trouvé</center>");
                $("#resultatAjax").html("<h4>aucun voyage vers " + arriveeTmp + " n'a été trouvé</h4>");
            } else if(xhr.responseText.search("pas de trajet") > 0) {
                document.getElementById("correspondance").style.display = "block";
                $("#monBandeau").css("background-color", "red").html("<center>aucun trajet trouvé</center>");
                $("#resultatAjax").html("<h4>Le trajet " + departTmp + "-" + arriveeTmp + " n'existe pas</h4>");
            }
            else {
                document.getElementById("correspondance").style.display = "block";
                $("#monBandeau").css("background-color", "green").html("<center>voyages trouvé</center>");
                $("#resultatAjax").html(response);
            }
            $(".loader").hide();
        }
})

})



