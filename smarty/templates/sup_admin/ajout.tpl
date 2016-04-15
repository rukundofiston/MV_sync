<form id="_form" class="form-horizontal row-fluid" method="post" enctype="multipart/form-data" >
      <fieldset id="first_div" class="ui-widget-content ui-corner-all">
        <legend>Information concernant le compte</legend>
              <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="default-select">Type de l'utilisateur</label>
                  <div class="controls span7">
                      <select data-placeholder="Choisir le type de l'utilisateur" name="user_type"
                      class="chzn-select" id="user_type">
                          <option value=""></option>
                          <option value="Delegue" id="Delegue">D&eacute;legu&eacute; m&eacute;dical
                          </option>
                          <option value="Superviseur" id="Superviseur">Superviseur</option>
                          <option value="Administrateur" id="Administrateur">Administrateur</option>
                      </select>
                  </div>
              </div>
              <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="user_name">Nom d'utilisateur</label>
                  <div class="controls span7">
                           <input type="text" id="user_name" name="user_name" class="row-fluid" placeholder="Taper votre nom d'utilisateur">
                      </div>
                 </div>
                 <div class="form-row control-group row-fluid">
                            <label class="control-label span3" for="password">Mot de passe</label>
                            <div class="controls span7">
                              <input type="password" id="password" name="password" class="row-fluid password" 
                              placeholder="taper votre mot de passe">
                            </div>
                  </div> 
                  
                 <div class="form-row control-group row-fluid ">
                            <label class="control-label span3">Séléctionner les droits</label></br>
                      <div class="controls span7">
                           <label class="checkbox ">
                            <input type="checkbox" value="delegue" name="droits[]" id="gest_delegues">Gestion des delegues</label>
                            <label class="checkbox ">
                                <input type="checkbox" value="medecin" name="droits[]" id="gest_medecins" >Gestion des médecins</label>
                            <label class="checkbox ">
                                <input type="checkbox" value="statistique" name="droits[]" id="gest_statistiques">Gestion des statistiques</label>
                            <label class="checkbox ">
                                <input type="checkbox" value="medicaments" name="droits[]" id="gest_medicaments">Gestion des médicaments</label>
                            <label class="checkbox ">
                                <input type="checkbox" value="evenements" name="droits[]" id="gest_evenements">Gestion des événements</label>
                      </div>
                 </div>
                 <div class="form-row control-group row-fluid">
                    <label class="control-label span3" for="default-select">Etat de l'utilisateur</label>
                      <div class="controls span7">
                          <select name="etat" class="chzn-select" id="etat">
                                <option value="0">Active</option>
                                <option value="1">Désactivé</option>
                          </select>
                      </div>
                  </div>
    <!--</div> -->
  </fieldset>
    <fieldset id="second_div" style="display:none">
      <legend>Information concernant l'utilisateur</legend>
              Image:<input type="file" name="imgfile"><br>
          <div class="form-row control-group row-fluid">
                    <label class="control-label span3" for="nom">Nom</label>
                    <div class="controls span7">
                         <input type="text" id="nom" name="nom" class="row-fluid" placeholder="Le nom de l'utilisateur">
                    </div>
               </div>
               <div class="form-row control-group row-fluid">
                    <label class="control-label span3" for="prenom">Prénom
                    </label>
                    <div class="controls span7">
                      <input type="text" id="prenom" name="prenom" class="row-fluid" 
                      placeholder="Le prénom de l'utilisateur">
                    </div>
               </div>
               <div class="form-row control-group row-fluid">
                    <label class="control-label span3" for="adresse">Adresse</label>
                    <div class="controls span7">
                         <input type="text" id="adresse" name="adresse" class="row-fluid" 
                         placeholder="adresse de l'utilisateur">
                    </div>
               </div>
               <div class="form-row control-group row-fluid">
                    <label class="control-label span3" for="tel">Téléphone</label>
                    <div class="controls span7">
                         <input type="text" id="tel" name="tel" class="row-fluid" placeholder="le numero de téléphone">
                    </div>
               </div>
               <div class="form-row control-group row-fluid">
                    <label class="control-label span3" for="fax">Fax</label>
                    <div class="controls span7">
                         <input type="text" id="fax" name="fax" class="row-fluid" placeholder="fax">
                    </div>
               </div>
               <div class="form-row control-group row-fluid">
                    <label class="control-label span3" for="email">Email</label>
                    <div class="controls span7">
                         <input type="text" id="email" name="email" class="row-fluid" placeholder="Email">
                    </div>
               </div>
               <div class="form-row control-group row-fluid">
                    <label class="control-label span3">Date de naissance
                    </label>
                    <div class="controls span7">
                         <input type="text" id="dataNaissance" name="dataNaissance" value="" class="row-fluid"
                         placeholder="veuillez donner la date de naissance">
                    </div>
               </div> 
             <div class="form-row control-group row-fluid">
                    <label class="control-label span3">Date d'embauche</label>
                    <div class="controls span7">
                         <input type="text" id="dateEmbauche" name="dateEmbauche" value="" class="row-fluid" 
                         placeholder="veuiller donner la date d'embauche">
                    </div>
               </div>
               <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="default-select">Superviseur</label>
                  <div class="controls span7">
                      <select data-placeholder="Choisir son superviseur" name="mySuperviseur"
                      class="chzn-select" id="mySuperviseur">
                      <option></option>
                      {foreach $tabl as $super}
                          <option value="{$super->Delegue->id_delegue}">{$super->Delegue->nom}</option>
                      {/foreach}
                      </select>
                  </div>
              </div>
    </fieldset>
      <div id="icon_next" style="display:none">
          <img src="../sup_admin/img/next.png">
      </div>
      <div id="icon_back" style="display:none">
          <img src="../sup_admin/img/back.png">
      </div>
      <div id="lesButton" style="display:none" class="form-actions row-fluid">
                <div class="span7 offset3">
                  <input type="submit" value="Enregistre" class="btn btn-primary">
                  <input id="Quitter"type="button" value="Quitter" class="btn btn-secondary">
                </div>
      </div>
</form>