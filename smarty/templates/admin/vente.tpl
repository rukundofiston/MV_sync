{extends file="admin/skeleton.tpl"}{/extends}
{block name="content"}
				<button id="ajouter" type="button" class="btn inline">
					<ul class="the-icons unstyled">
						<li><i class="gicon-plus-sign"></i> Ajouter</li>
					</ul>
				</button>
			<form action="pdf.php" method="post" id="vente_form">
	             <div class="form-row control-group row-fluid">
	                <label class="control-label span3" for="default-select">Zone</label>
	                <div class="controls span7">
	                  <select id="secteur" name="id_secteur">
	                  	{foreach from=$secteurs item=secteur}
	                    <option value="{$secteur->id_secteur}">{$secteur->libelle}</option>
	                    {/foreach}
	                  </select>
	                </div>
	              </div>
	              <div class="form-row control-group row-fluid">
	                <label class="control-label span3" for="default-select">Medicament</label>
	                <div class="controls span7">
	                  <select id="medicament" name="id_medicament">
	                  	{foreach from=$medicaments item=medicament}
	                    	<option value="{$medicament->id_medicament}">{$medicament->libelle}</option>
	                    {/foreach}
	                  </select>
	                </div>
	              </div>
	          	  <div class="form-row control-group row-fluid">
					<label class="control-label span3">
						Du 
					</label>
					<div class="controls span7">
						<input id="debut" type="text" name="date_debut" class="span12">
					</div>
				</div>
				<div class="form-row control-group row-fluid">
					<label class="control-label span3">
						Fin
					</label>
					<div class="controls span7">
						<input id="fin"  name="date_fin" type="text" class="span12">
					</div>
				</div>
				<button id="btn_consult_vente" type="button" class="btn inline">
					<ul class="the-icons unstyled">
						<li> Consulter les statitiques</li>
					</ul>
				</button>
				<button type="submit" id="btn_generer_etat" type="button" class="btn inline">
					<ul class="the-icons unstyled">
						<li> Générer L'état</li>
					</ul>
				</button>
			</form>
				<br>
				  <img class="loader load" src="loader.gif"/>
	              <div id="chart_div"></div>
	              <!--Boite de dialogue pour l'ajout d'une vente -->
	              <div id="dialog_ajout_vente" title="Ajout d'une vente">
					<form action="vente.php" method="POST" id="ajout_vente">
						 <div class="form-row control-group row-fluid">
			                <label class="control-label span3" for="default-select">Zone</label>
			                <div class="controls span7">
			                  	<select id="sect"></select>
	               			</div>
	              		 </div>
	              		 <div class="form-row control-group row-fluid">
			                <label class="control-label span3" for="default-select">Medicament</label>
			                <div class="controls span7">
	                  			<select id="med"> </select>
	               		    </div>
	             		 </div>
	             		 <div class="form-row control-group row-fluid">
							<label class="control-label span3">
								Date
							</label>
							<div class="controls span7">
								<input id="date" type="text" class="span12">
							</div>
						</div>
						<div class="form-row control-group row-fluid">
							<label class="control-label span3">
								Quantité
							</label>
							<div class="controls span7">
								<input type="text" id="amount" style="border: 0; color: gray; font-weight: bold;" />
								<div id="slider-range-min"></div>
							</div>
						</div>
						<div class="form-actions row-fluid">
							<div class="span7 offset3">
								<input id="btn_ajout_vnt" type="submit" class="btn btn-primary" value="Ajouter"/>
								<button type="button" id="btn_annuler_ajout_vnt" class="btn btn-secondary">Annuler</button>
							</div>
						</div>
						<img class="loader" src="load.gif"/>
					</form>
				</div><!--Fin de boite de dialogue -->
<link rel="stylesheet" type="text/css" href="../css/admin/vente.css">
<script type="text/javascript" src="../scripts/admin/jquery.flot.js"></script>
<script type="text/javascript" src="../scripts/admin/vente.js"></script>
{/block}