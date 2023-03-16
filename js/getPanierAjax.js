$("#remplir").on('submit', function (e) {
    $(".loader").show();
        // Empêchez le formulaire de soumettre de manière normale
        var util = $(this).find("input[name=idConnecte]").val();
        e.preventDefault();

    $.ajax({
        type: 'GET',
        url: "ajaxDispatcher.php?action=utilisateurById",
        dataType: "json",
        data: {id: util},
        success: function (response, status, xhr) {
          $("#nomProfil").html("<strong>Nom : </strong>" + response.nom);
            $("#prenomProfil").html("<strong>Prénom : </strong>" + response.prenom);
            $("#identProfil").html("<strong>Identifiant : </strong>" + response.identifiant);

            $.ajax({
                type: 'GET',
                url: "ajaxDispatcher.php?action=getReservation",
                dataType: "html",
                data: {idConnecte: util},
                success: function (response, status, xhr) {

                    $("#resaUtil").html(response);
                    $.ajax({
                        type: 'GET',
                        url: "ajaxDispatcher.php?action=getVoyageProposer",
                        dataType: "html",
                        data: {idConnecte: util},
                        success: function (response, status, xhr) {
                            $("#mesVoyage").html(response);
                        }
                })}
            })
            $(".loader").hide();
        }
    })
    })