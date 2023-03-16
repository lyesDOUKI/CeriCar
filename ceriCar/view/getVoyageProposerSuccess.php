<h3>Vos Propositions</h3>
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
if($context->voyage != null) {
    foreach ($context->voyage as $v) {
        echo '<tr> <td>', $v->trajet->depart,
        ' </td> <td> ', $v->trajet->arrivee,
        ' </td> <td> ', $v->tarif, ' Euro',
        '</td> <td>', $v->heureDepart, ' Heure', '</td><tr>';

    }
}
?>
        </tbody>
    </table>
</div>
