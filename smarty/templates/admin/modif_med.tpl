			<form method="POST" action="" enctype="multipart/form-data">
				<div id="mainWrapper">
					<div id="uploads_modif"></div>
				</div><!--end mainWrapper-->
				<div class="form-row control-group row-fluid">
					<label class="control-label span3" for="cname">
						Nom 
					</label>
					<div class="controls span7">
						<input id="nom" type="text" required="" class="span12">
					</div>
				</div>
				<div class="form-row control-group row-fluid">
					<label class="control-label span3">
						Prenom
					</label>
					<div class="controls span7">
						<input id="prenom" type="text" required="" class="span12">
					</div>
				</div>
				<div class="form-row control-group row-fluid">
					<label class="control-label span3">
						Adresse
					</label>
					<div class="controls span7">
						<input id="adr" type="text" required="" class="span12">
					</div>
				</div>
				<div class="form-row control-group row-fluid">
					<label class="control-label span3">
						Email
					</label>
					<div class="controls span7">
						<input id="email" type="text" required="" class="span12">
					</div>
				</div>
				<div class="form-row control-group row-fluid">
					<label class="control-label span3">
						Telephone
					</label>
					<div class="controls span7">
						<input id="tel" type="text" required="" class="span12">
					</div>
				</div>
				<div class="form-row control-group row-fluid">
					<label class="control-label span3">
						Fax
					</label>
					<div class="controls span7">
						<input id="fax" type="text" required="" class="span12">
					</div>
				</div>
				<div class="form-row control-group row-fluid">
                <label class="control-label span3">Sexe</label>
                <div class="controls span7">
                  <label class="inline radio">
                  <input type="radio" name="sexe" value="f"/> Femme</label>
                  <label class="inline radio">
                  <input type="radio" name="sexe" value="h" checked="CHECKED"/> Homme </label>
                </div>
              </div>
	             <div class="form-row control-group row-fluid">
	                <label class="control-label span3" for="default-select">Civilité</label>
	                <div class="controls span7">
	                  <select id="civilite">
	                    <option value="mr">Monsieur</option>
	                    <option value="mme">Madame</option>
	                    <option value="mzelle">Demoizelle</option>
	                  </select>
	                </div>
	              </div>
				<div class="form-actions row-fluid">
					<div class="span7 offset3">
						<input id="btn_modif_med" type="submit" class="btn btn-primary" value="Suivant"/>
						<button type="button" id="btn_annuler_modif_med" class="btn btn-secondary">Annuler</button>
					</div>
				</div>
				<img class="loader" src="load.gif"/>
			</form>
			<script type="text/javascript">
			$('.lien_modif').click(function(){
				var id=$(this).attr('data-id');
				var cel =$(this).parent();
				var lign=cel.parent();
				//jQuery('lign',this);
				var nom=lign.children('td').html();
				alert(nom);
				//var nom=lign.
				//$('#dialog_modif').dialog('open');
				//var txt=$('this:fist-child').html();
				//alert(txt);

			});

			</script>