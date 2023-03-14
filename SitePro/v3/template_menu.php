<?php
function renderMenuToHTML($currentPageId, $lang) {
// un tableau qui d\'efinit la structure du site
if($lang=='fr'){
    $mymenu = array(
// idPage titre
        'accueil' => array( 'Accueil' ),
        'cv' => array( 'Cv' ),
        'projets' => array('Mes Projets'),
        'contact' => array('Me contacter')
    );
} else if($lang=='en'){
    $mymenu = array(
        // idPage titre
                'accueil' => array( 'Home' ),
                'cv' => array( 'Cv' ),
                'projets' => array('My Hobbies'),
                'contact' => array('To contact me')
            );
}

// ...
echo ('<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
<div class="container">
    <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">');
foreach($mymenu as $pageId => $pageParameters) {
    if($pageId==$currentPageId){
       echo "<li><a id = 'currentPage' class = 'navbar-link' href='http://localhost/IDAW/SitePro/v3/index.php?page={$pageId}&lang={$lang}'>$pageParameters[0]</a></li>";
    }
    else{
        echo "<li><a class = 'navbar-link' href='http://localhost/IDAW/SitePro/v3/index.php?page={$pageId}&lang={$lang}'>$pageParameters[0]</a></li>";
    } 
}
if($lang=='fr'){
    echo ("<li><a href='index.php?page={$currentPageId}&lang=en'>Anglais</a>");
}elseif($lang=='en'){
    echo ("<li><a href='index.php?page={$currentPageId}&lang=fr'>Français</a>");
}
echo ('</ul>
</div>
</div>
</nav>');
// ...
}
?>
