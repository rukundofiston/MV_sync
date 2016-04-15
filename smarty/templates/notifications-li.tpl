{foreach $visites as $visite}
	<li><strong>{$visite->Delegue->nom} {$visite->Delegue->prenom}</strong> 
		vient de terminer sa visite chez Dr. {$visite->Medecin->nom} {$visite->Medecin->prenom} <span class="right">{$visite->time}</span></li>
{/foreach}