$("#deconect").on('submit', function (e) {
    $(".loader").show();
    e.preventDefault()
    $.ajax({
        type: 'POST',
        url: "ajaxDispatcher.php?",
        dataType: "html",
        data : {action : "deco"},
        success: function (response, status, xhr) {
            //window.location.reload();
            document.getElementById("divCo").style.display = "block";
            document.getElementById("divDeco").style.display = "none";
            document.getElementById("ajouteUnVoyage").style.display = "none";
            document.getElementById("reserve").style.display = "none";
            document.getElementById("correspondance").style.display = "none";
            $("#resultatAjax").html("");

            document.getElementById("monBandeau").style.display = "none";
            document.getElementById("monBandeau").style.display = "block";
            $("#monBandeau").css("background-color", "green").html("<center> Au revoir ! </center>");
            var anchor = document.getElementById("monBandeau");
            anchor.scrollIntoView();
            setTimeout(function() {
                document.getElementById("monBandeau").style.display = "none";
                document.getElementById("index").style.display = "block";
            }, 2000); // Exécute la fonction après 1 seconde (1000 milliseconds)

            $(".loader").hide();
        }
    })
})

