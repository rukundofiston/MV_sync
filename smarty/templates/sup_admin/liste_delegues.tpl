<table>
	<thead>
		<tr>
			<th>Nom</th>
			<th>Prenom</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$tab item=delegue}
			<tr>
				<td>{$delegue->nom}</td>
				<td>{$delegue->prenom}</td>
			</tr>
		{/foreach}
	</tbody>
</table>