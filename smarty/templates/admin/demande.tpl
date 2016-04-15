{extends file="admin/skeleton.tpl"}{/extends}
{block name="content"}
  <!-- Le dataTable qui contient la liste des demandes -->
          <table id="data_demande" class="responsive table table-striped table-bordered dataTable">
              <thead>
                  <tr>
                  		<th>Visualiser</th>
                        <th>Date</th>
                        <th >Medecin</th>
                        <th >Objet</th>
                        <th >Description</th>
                        <th >Etat</th>
                  </tr>
              </thead>
            <tbody>
              {foreach from=$demandes item=demande}
                  <tr>
                  	<td class="voir">Voir</td>
                    <td>{$demande['date']}</td>
                    <td>{$demande['medecin']}</td>
                    <td>{$demande['objet']}</td>
                    <td>{$demande['description']}</td>
                    {if $demande['etat']=="En cours"}
                    {assign var="class" value="en_cours"}
                    {else if $demande['etat']=="Non vue"}
                    {assign var="class" value="non_vue"}
                    {else if $demande['etat']=="Acceptée"}
                    {assign var="class" value="accept"}
                    {else if $demande['etat']=="Refusée"}
                    {assign var="class" value="refus"}
                    {/if}
                    <td class="etat " id="{$demande['id']}"><div class="{$class} status">{$demande['etat']}</div></td>
                  </tr>
              {/foreach}  
            </tbody>
          </table>
           <!-- Boite de dialogue pour la modification de l'etat d'une demande -->
         <div id="dialog_modification_etat" class="dialogue" title="Modification de l'etat d'une demande">
							 <div class="form-row control-group row-fluid">
				                <label class="control-label span3" for="default-select">Etat</label>
				                <div class="controls span7">
				                  	<select id="etat">
				                  			<option value="0">En cours</option>
				                  			<option value="1">Acceptée</option>
				                  			<option value="2">Refusée</option>
				                  	</select>
		               			</div>
	              		 </div>
	              		 <input id="demande_id" type="hidden"/>
					   	<div class="form-actions row-fluid">
  							<div class="span7 offset3">
  								<input id="btn_modification_etat" type="submit" class="btn btn-primary" value="Enregister"/>
  								<button type="button" id="btn_annuler_modification_etat" class="btn btn-secondary">Annuler</button>
  					  	</div>
						</div>
						<img class="loader" src="load.gif"/>
         </div> <!-- Fin boite de dialogue -->

         <!--Boite de dialogue dans la quelle on visulise en detail les demandes des medecins -->
          <div id="dialog_voir_demande" class="dialogue" title="Visualisation d'une demande">      	
         </div> <!-- Fin boite de dialogue -->
         <img class="load" src="loader.gif"/>
<link rel="stylesheet" type="text/css" href="../css/admin/demande.css">
<link rel="stylesheet" type="text/css" href="../css/admin/style.css">
<script type="text/javascript" src="../scripts/admin/jquery.dataTables.js"></script>
<script type="text/javascript" src="../scripts/admin/demande.js"></script>
{/block}