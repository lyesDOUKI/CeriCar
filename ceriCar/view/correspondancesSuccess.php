<div class="table-responsive-md">
<table class="table table-hover"  style="width: 68%">
    <thead>
    <tr>
        <th>nombre d'escale</th>
        <th>numéro des voyages</th>
        <th>villes à parcourir</th>
        <th>informations sur les voyages</th>
        <th>informations sur les conducteurs</th>
    </tr>
    </thead>
    <tbody>
<?php
foreach ($context->cor as $c)
{
    echo '<tr> <td>',$c['nombre_escale'],'</td><td>',$c['cor_id'],'</td><td>',$c['villes'],'</td>',
                        '<td></td><td></td>';

    $tmp1 = explode(",",$c['cor_id']);
    $tmp2 = explode(" ",$c['villes']);
    $tmp3 = explode("|",$c['information']);
    $tmp4 = explode("|",$c['conduc']);
    echo '<td>';
if($context->idUtilisateur != null)
{
?>

<button class="btn btn-oder" type="submit" id="button<?php echo $c['cor_id'];?>"
        name="ajouteVoyageId" value="<?php echo $c['cor_id']; ?>">
    <input type="hidden" id="in"  name="idConnecter" value="<?php echo  $context->idUtilisateur; ?>">
    ajouter</button>
</td></tr>
<?php
}

    for($i=0;$i<=$c['nombre_escale'];$i++) {
        echo
        '</tr><tr><td></td>',
        '<td>', $tmp1[$i],'</td><td>',$tmp2[$i],
            '</td><td>',$tmp3[$i],'</td><td>',$tmp4[$i],'</td></tr>';
            }


}
echo '<br>';
foreach ($context->cor as $c) {
    $t = $c['cor_id'];
    echo "<script>";
    echo "if(document.getElementById('button$t') != null){";
    echo "document.getElementById('button$t').addEventListener('click', function() {";
    echo "  sendRequestCorr(this.value, document.getElementById('in').value);";
    echo "})};";
    echo "</script>";
}

?>
    </tbody>
</table>
</div>


