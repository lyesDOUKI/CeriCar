
<div class="table-responsive-md">
<table class="table table-hover" style="width: 50%">
    <thead>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Distance</th>
        <th>Tarif</th>
        <th>Contraintes</th>
        <th>Nombre De place</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <?php
    foreach ($context->voyage as $v)
    {

    echo '<tr> <td>',$v->conducteur->nom,
        ' </td> <td> ', $v->conducteur->prenom,
        ' </td> <td> ', $v->trajet->distance,
        ' Km </td> <td>', $v->tarif,
        ' Euro </td><td> ',$v->contraintes, '</td> <td>',
        $v->nbPlace, '</td><td>';
    ;

        if((($context->idUtilisateur != null) && ($context->idUtilisateur != $v->conducteur->id)))
        {
        ?>
            <button class="btn btn-oder" type="button" id="button<?php echo $v->id?>"
                    name="ajouteVoyageId" value="<?php echo $v->id; ?>">
         
                <input type="hidden" id="in"  name="idConnecte" value="<?php echo  $context->idUtilisateur; ?>"/>
                Réserver</button>
        </td><td>
                <input type="number" id="nombreDePlace<?php echo $v->id?>" name= "nombreDePlace" style="max-width: 70px" min=0
                                            max="<?=$v->nbPlace ?>"/>
    </td></tr>
        <?php
                }

        }
       foreach ($context->voyage as $v) {
            echo "<script>";
            echo "if(document.getElementById('button$v->id') != null){";
            echo "document.getElementById('button$v->id').addEventListener('click', function() {";
            echo "  sendRequest(this.value, document.getElementById('in').value, document.getElementById('nombreDePlace$v->id').value);";
            echo "})};";
            echo "</script>";
        }


    ?>
    </tbody>
</table>
</div>
<!--
<script type="text/javascript" src="js/panierAjax.js"></script>
!-->
