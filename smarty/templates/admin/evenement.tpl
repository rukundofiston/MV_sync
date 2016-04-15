{extends file="admin/skeleton.tpl"}{/extends}
{block name="content"}
        <div class="row-fluid control-group">
            <button id="ajouter" type="button" class="btn inline">
              <ul class="the-icons unstyled">
                <li><i class="gicon-plus-sign"></i> Ajouter</li>
              </ul>
        </div>
  <!-- Le dataTable qui contient la liste des demandes -->
          <table id="data_evenement" class="responsive table table-striped table-bordered dataTable">
              <thead>
                  <tr>
                        <th >Titre</th>
                        <th >Description</th>
                        <th>Lieu</th>
                        <th>Date Debut</th>
                        <th>Date Fin</th>
                        <th >Heure debut</th>
                        <th >Heure fin</th>
                        <th >Delegué</th>
                  </tr>
              </thead>
            <tbody>
              {foreach from=$evenements item=evenement}
                  <tr>
                    <td>{$evenement['event']->titre}</td>
                  	<td>{$evenement['event']->description}</td>
                    <td>{$evenement['event']->lieu}</td>
                    <td>{$evenement['event']->dataD}</td>
                    <td>{$evenement['event']->dateF}</td>
                    <td>{$evenement['event']->heureD}</td>
                    <td>{$evenement['event']->heureF}</td>
                    <td>{$evenement['nom']} {$evenement['prenom']}</td>
                  </tr>
              {/foreach}  
            </tbody>
          </table>
         <!-- Boite de dialogue pourl'ajout d'un evenement -->
         <div id="dialog_ajout_event" class="dialogue" title="Ajoutd'un evenement ">
         <form method="POST" action="" id="form_ajout_event">
          <div class="form-row control-group row-fluid">
            <label class="control-label span3" for="titre">
             Titre :
            </label>
            <div class="controls span7">
              <input id="titre" type="text" required="" class="span12">
            </div>
          </div>
          <div class="form-row control-group row-fluid">
            <label class="control-label span3" for="cname">
             Date de debut :
            </label>
            <div class="controls span7">
              <input id="dateD" type="text" required="" class="span12">
            </div>
          </div>

          <div class="form-row control-group row-fluid">
            <label class="control-label span3">
              Date de fin  :
            </label>
            <div class="controls span7">
              <input id="dateF" type="text" required="" class="span12">
            </div>
          </div>
          <div class="form-row control-group row-fluid">
            <label class="control-label span3">
              Heure de debut :
            </label>
            <div class="controls span7">
              <input id="heureD" type="text" required="" placeholder="hh:mm" class="span12">
            </div>
          </div>
           <div class="form-row control-group row-fluid">
            <label class="control-label span3">
              Heure de fin :
            </label>
            <div class="controls span7">
              <input id="heureF" type="text" required="" placeholder="hh:mm" class="span12">
            </div>
          </div>
           <div class="form-row control-group row-fluid">
            <label class="control-label span3">
             Description :
            </label>
            <div class="controls span7">
              <textarea id="description" required="" class="span12"></textarea>
            </div>
          </div>
           <div class="form-row control-group row-fluid">
            <label class="control-label span3">
              Lieu :
            </label>
            <div class="controls span7">
              <input id="lieu" type="text" required="" class="span12">
            </div>
          </div>
           <div class="form-row control-group row-fluid">
            <label class="control-label span3">
              Delegué(<i>optionnel</i>)
            </label>
            <div class="controls span7">
              <input id="delegue" type="text" data-id="" class="span12">
              <div id="display"></div>
            </div>
          </div>
					<div class="form-actions row-fluid">
  						<div class="span7 offset3">
  							<input id="btn_modification_etat" type="submit" class="btn btn-primary" value="Enregister"/>
  							<button type="button" id="btn_annuler_modification_etat" class="btn btn-secondary">Annuler</button>
  					  </div>
					</div>
						<img class="loader" src="load.gif"/>
         </div> <!-- Fin boite de dialogue 
           <script type="text/javascript" src="../scripts/admin/timePicker/lib/base.js"></script>
           <script type="text/javascript" src="../scripts/admin/timePicker/jquery.timepicker.js"></script>
            -->

<link rel="stylesheet" type="text/css" href="../css/admin/evenement.css">
<script type="text/javascript" src="../scripts/admin/jquery.dataTables.js"></script>
<script type="text/javascript" src="../scripts/admin/evenement.js"></script>
{/block}