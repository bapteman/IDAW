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
                        renderMenuToHTML('projets');
                    ?> 
                    </ul>
                </div>
            </div>
        </nav>

        <section class="page-section bg-primary text-white mb-0" id="projets">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">Projets</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ms-auto"><p class="lead">actuellement en module IDAW à l'IMT Nord Europe</p></div>
                    <div class="col-lg-4 me-auto"><p class="lead">mise en place d'un projet d'application web pour le suivi d'activité à destination de l'école</p></div>
                </div>
            </div>
        </section>
<?php
  require_once('template_footer.php');
?>
