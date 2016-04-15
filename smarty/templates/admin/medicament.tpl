{extends file="admin/skeleton.tpl"}{/extends}
{block name="content"}
<div class="box gradient">
        <div class="title">
                <h2>
                <span>La liste des medicaments</span>
                </h2> 
        </div><!-- Fin .title -->

        <div class="content top">
        <div class="row-fluid control-group">
            <button id="Ajouter" type="button" class="btn inline">
              <ul class="the-icons unstyled">
                <li><i class="gicon-plus-sign"></i> Ajouter</li>
              </ul>
            </button>
            <button type="button" id="Supprimer" class="btn inline btn-danger">
              <ul class="the-icons unstyled">
                <li><i class="gicon-remove-circle"></i> Supprimer</li>
              </ul>
            </button>
        </div>

          <!-- Le dataTable qui contient la liste des medicaments -->
          <table id="data_medicament" class="responsive table table-striped table-bordered dataTable">
              <thead>
                  <tr>
                        <th><input type="checkbox" id="selectionner_tout"/>&nbsp;Selectionner</th>
                        <th>Libellé</th>
                        <th >Prix</th>
                        <th >Description</th>
                        <th >Supprimer</th>
                        <th >Modifier</th>
                  </tr>
              </thead>
            <tbody>
              {foreach from=$tab_medics item=medicament}
                  <tr>
                    <td><input type="checkbox" name="choix" value="{$medicament->id_medicament}"/></td>
                    <td class="libelle">{$medicament->libelle}</td>
                    <td class="prix">{$medicament->prix}</td>
                    <td class="description">{$medicament->desctiption}</td>
                    <td><img src="supprimer.png" id="{$medicament->id_medicament}" class="supp_icon"/></td>
                    <td><img data-id="{$medicament->id_medicament}" class="lien_modif" src="modifier.png"/></td>
                  </tr>
              {/foreach}  
            </tbody>
          </table>

          <!-- Boite de dialogue pour La suppression d'un medicament -->
          <div id="dlg_supp_seul" class="dialogue" title="Suppression d'un medicament" >
              <h3>Voulez vous Supprimer ce Medicament ? </h3>
              <img class="loader" src="load.gif"/>
         </div>

         <!-- Boite de dialogue pour le suppression mutiple des medicaments -->
         <div id="dlg_supp_plus" class="dialogue" title="Suppression de medicaments">
              <h3>ATTENTION : Etes vous surs de vouloir supprimer ce(s) <span id="nbr"></span> medicament(s) ! </h3>
              <img class="loader" src="load.gif"/>
         </div>

         <!-- Boite de dialogue pour l'ajout d'un medicament -->
         <div id="dialog_ajout" class="dialogue" title="Ajout d'un medicament">
            <form method="POST" action="medicament.php" id="ajout_medicament">

              <div class="form-row control-group row-fluid">
                  <label class="control-label span3"> liebelle </label>
                  <div class="controls span7">
                    <input id="libelle" type="text" required="" class="span12">
                  </div>
              </div>
              <div class="form-row control-group row-fluid">
                  <label class="control-label span3"> Prix </label>
                  <div class="controls span7">
                    <input id="prix" type="text" required="" class="span12">
                  </div>
              </div>
              <div class="form-row control-group row-fluid">
                  <label class="control-label span3"> description </label>
                  <div class="controls span7">
                    <input id="description"  type="text" required="" class="span12">
                  </div>
              </div>
              <div class="form-actions row-fluid">
                  <div class="span7 offset3">
                    <input type="submit" class="btn btn-primary" value="Ajouter"/>
                    <button type="button" id="btn_annuler_ajout_medic" class="btn btn-secondary">Annuler</button>
                  </div>
              </div>
              <img class="loader" src="load.gif"/>
            </form>
         </div> <!-- Fin boite de dialogue pour l'ajout de medicament -->

         <!-- Boite de dialogue pour la modification d'un medicament -->
         {literal}
         <div id="dialog_modification" class="dialogue" title="Modification du medicament">
            <form method="POST" action="medicament.php" id="modification_medicament">
              <div class="form-row control-group row-fluid">
                  <label class="control-label span3"> libelle </label>
                  <div class="controls span7">
                    <input id="modif_libelle" type="text" required="required" class="span12">
                  </div>
              </div>
              <div class="form-row control-group row-fluid">
                  <label class="control-label span3"> Prix </label>
                  <div class="controls span7">
                    <input id="modif_prix" type="text" required="" class="span12">
                  </div>
              </div>
              <div class="form-row control-group row-fluid">
                  <label class="control-label span3"> description </label>
                  <div class="controls span7">
                    <input id="modif_description"  type="text" required="" class="span12">
                  </div>
              </div>
              <div class="form-row control-group row-fluid">
                  <div class="controls span7">
                    <input type="text" id="id_medicament" required="" class="span12">
                  </div>
              </div>
              <div class="form-actions row-fluid">
                  <div class="span7 offset3">
                    <input type="submit" class="btn btn-primary" value="Ajouter"/>
                    <button type="button" id="btn_annuler_modif_medic" class="btn btn-secondary">Annuler</button>
                  </div>
              </div>
              <img class="loader" src="load.gif"/>
            </form>
         </div> <!-- Fin boite de dialogue pour l'ajout de medicament -->
         {/literal}
</div>
</div>
<link rel="stylesheet" type="text/css" href="../css/admin/medicament.css">
<script type="text/javascript" src="../scripts/admin/jquery.dataTables.js"></script>
<script type="text/javascript" src="../scripts/admin/medicament.js"></script>
{/block}