<?php
    session_start();
    require_once("templates/template_header.php");
?>


<section style="background-color: #eee;">
  <div class="container py-5">
    <h1>Informations du profil</h1>
    </div>

    <div class="row">
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">nom</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo($_SESSION['nom_user'])?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Prenom</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo($_SESSION['prenom_user'])?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">login</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo($_SESSION['login'])?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">niveau d'activité</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo($_SESSION['niveau'])?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">date de naissance</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo($_SESSION['date_naissance'])?></p>
              </div>
            </div>
            <hr>
          </div>
        </div>
        

    <?php
require_once("templates/template_footer.php");
?>