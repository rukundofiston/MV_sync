<!-- Contenu qui va etre affiché dans la boite de dialogue de visualisation du contenu d'une demande d'un medecin-->
<h3><u>Objet </u>: <strong> {$demande->objet}</strong></h3>
<h3><u>Description </u>:<h3>
<p>{$demande->description}</p>
<input id="dem_id" type="hidden" value="{$demande->id_demande}"/>
<div class="form-actions row-fluid">
     <div class="span7 offset3">
       <button id="btn_fermer_voir_demande" class="btn btn-primary">Fermer</button>
     </div>
</div>


