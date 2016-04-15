<tr>
	<td><input type="checkbox" name="choix" value="{$medicament->id_medicament}"/></td>
	<td>{$medicament->libelle}</td>
	<td>{$medicament->prix}</td>
	<td>{$medicament->desctiption}</td>
	<td><img src="supprimer.png" id="{$medicament->id_medicament}" class="supp_icon"/></td>
	<td><img data-id="{$medicament->id_medicament}" class="lien_modif" src="modifier.png"/></td>
</tr>