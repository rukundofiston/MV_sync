<tr>
	<td><input type="checkbox" name="choix" value="{$med->id_medecin}"/></td>
	<td>{$med->nom}</td>
	<td>{$med->prenom}</td>
	<td>{$med->adresse}</td>
	<td>{$med->fax}</td>
	<td>{$med->tel}</td>
	<td>{$med->email}</td>
	<td data-type1="{$id_type}">{$type}</td>
	<td>{$med->sexe}</td>
	<td>{$med->civilite}</td>
	<td class=" "><img id="{$med->id_medecin}" class="lien_supp" src="supprimer.png" /></td>
	<td><img id="{$med->id_medecin}" data-photo="{$med->photo}" class="lien_modif" src="modifier.png"/></td>
</tr>