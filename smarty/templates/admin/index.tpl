		<div class="content">
			<form method="POST" action="" enctype="multipart/form-data">
				<div class="form-row control-group row-fluid">
					<label class="control-label span3" for="cname">
						Nom 
					</label>
					<div class="controls span7">
						<input id="nom" name="nom" type="text" required="" class="span12">
					</div>
				</div>
				<div class="form-row control-group row-fluid">
					<label class="control-label span3">
						Prenom
					</label>
					<div class="controls span7">
						<input id="prenom" name="prenom" type="text" required="" class="span12">
					</div>
				</div>
				<div class="form-row control-group row-fluid">
					<label class="control-label span3">
						Adresse
					</label>
					<div class="controls span7">
						<input id="adr" name="adresse" type="text" required="" class="span12">
					</div>
				</div>
				<div class="form-row control-group row-fluid">
					<label class="control-label span3">
						Email
					</label>
					<div class="controls span7">
						<input id="email" name="email" type="text" required="" class="span12">
					</div>
				</div>
				<div class="form-row control-group row-fluid">
					<label class="control-label span3">
						Telephone
					</label>
					<div class="controls span7">
						<input id="tel" name="tel" type="text" required="" class="span12">
					</div>
				</div>
				<div class="form-row control-group row-fluid">
					<label class="control-label span3">
						Fax
					</label>
					<div class="controls span7">
						<input id="fax" name="fax" type="text" required="" class="span12">
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
	         <!--  <div class="form-row control-group row-fluid">
					<label class="control-label span3">
						photo
					</label>
					<div class="controls span7">
						<input id="photo" name="photo" type="file" class="span12">
					</div>
				</div>
			-->
				<div id="mainWrapper">
					<div id="uploads"><p>Glisser la photo ICI</p></div>
				</div><!--end mainWrapper-->


				<div class="form-actions row-fluid">
					<div class="span7 offset3">
						<input id="btn_ajout_med" type="submit" class="btn btn-primary" value="Suivant"/>
						<button type="button" id="btn_annuler_ajout_med" class="btn btn-secondary">Annuler</button>
					</div>
				</div>
				<img class="loader" src="load.gif"/>
			</form>
		</div>
		<style type="text/css">
		#uploads{
			width: 300px;
			margin: auto;
			height: 200px;
			border: 4px dashed gray;
			position: relative;
			border-radius: 10px 10px 10px 10px;
			font-size: 1.5em;
		    font-weight: bold;
		    text-align: center;
		    color: gray;
		}
		.image{
			width: 400px;
			height: 200px;
		
		}
		#uploads p{
			padding-top: 80px;
		}
		
	</style>
	<script type="text/javascript" src="../scripts/admin/file.drop.js"></script>
	<script type="text/javascript">$(function(){
		$('#btn_annuler_ajout_med').click(function(){
			$('#dialog_ajout').dialog('close');
		});
	$('#uploads').filedrop({
		url: 'upload.php',
		paramname: 'imagefile',
		fallbackid: 'upload_button',
		maxfiles: 5,
		maxfilessize: 2,
		error: function(err,file)
		{
			switch(err)
			{
				case 'BrowserNotSupported':
				$('#filesarea').append('Your browser does not support this uploader');
				break;
				 case 'FileTypeNotAllowed':
				 alert('Vous devez Glisser un fichier de type : jpeg,png,gif');
                break;
			}
		},
		allowedfiletypes: ['image/jpeg','image/png','image/gif'],  
		 beforeSend: function(file, i, done) {
		 	alert('hello world !');
        	
   		 },
		uploadFinished: function(i,file,response)
		{
			//alert(response);
			var nom=response;
			$('#uploads').html('<img src="img/uploaded/'+nom+'" style="width: 100%; height: 100%;" data-nom="'+nom+'"/>');
		}
	});
});</script>