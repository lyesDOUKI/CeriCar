<h3>Vos reservations</h3>
<div class="table-responsive-md">
<table class="table table-hover" style="width: 50%">
    <thead>
    <tr>
        <th>depart</th>
        <th>arrivee</th>
        <th>Tarif</th>
        <th>heure</th>
    </tr>
    </thead>
    <tbody>
<?php
if($context->reservation != null)
{
foreach ($context->reservation as $r) {

    echo '<tr> <td>', $r->voyage->trajet->depart,
    ' </td> <td> ', $r->voyage->trajet->arrivee,
    ' </td> <td> ', $r->voyage->tarif, ' Euro',
    '</td> <td>', $r->voyage->heureDepart, ' Heure', '</td><td>';
    ?>
<button class="btn btn-oder" type="submit" id="button<?php echo $r->id;?>"
        name="idCorr" value="<?php echo $r->id ?>">
    supprimer</button>
</td></tr>
<?php
}
foreach ($context->reservation as $r) {
    echo "<script>";
    echo "document.getElementById('button$r->id').addEventListener('click', function() {";
    echo "  sendRequestDelete(this.value);";
    echo "});";
    echo "</script>";
}
}
?>
    </tbody>
</table>
</div>
