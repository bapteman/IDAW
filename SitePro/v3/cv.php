<?php
  require_once('template_header.php');
?>
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                    <?php
                        require_once('template_menu.php');
                        renderMenuToHTML('cv');
                    ?> 
                    </ul>
                </div>
            </div>
        </nav>

        <section class="page-section bg-primary text-white mb-0" id="CV">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">CV</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                  <h1 class = 'cv_title'>Profil :</h1>
                    <div class=""><p class="lead">Étudiant en 4éme année d’ingénieur, passionné d’informatique, convaincu de l’importance d’agir pour l’environnement et de la transition énergétique. Je compte me spécialiser dans l’informatique grâce à la filière numérique de mon Ecole.</p></div>
                  <h1 class = 'cv-title ms-auto'>Experience :</h1> 
                  <h2>Developpeur stagiaire chez Audion</h2>
                    <div class="col-lg-4 me-auto"><p class="lead">2022, Durée : 12 semaines <br> <br>
                      Développement d’extensions chrome en HTML/CSS/JavaScript <br>
                      intégration au sein d’une equipe de développeurs agile (scrum) : réunion quotidienne et sprint review. <br>
                      prise en charge d’intégration des technologies de l’entreprise chez des clients </p></div>
                  </div>
            </div>
        </section>
<?php
  require_once('template_footer.php');
?>
</body>

</html>