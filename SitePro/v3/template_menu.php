<?php
function renderMenuToHTML($currentPageId, $lang) {
// un tableau qui d\'efinit la structure du site

$mymenu = array(
// idPage titre
    'accueil' => array( 'Accueil','Home' ),
    'cv' => array( 'Mon Cv','My Cv' ),
    'projets' => array('Mes Projets/hobbies', 'My Project/Hobbies'),
    'contact' => array('Me contacter', 'To contact me')
);

$indice = 0;
switch($lang){
    case 'fr':
        $indice = 0;
        break;
    case 'en':
        $indice = 1;
        break;
}

// ...
echo ('<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
<div class="container">
<a class="navbar-brand" href="#page-top">Baptiste SENECLAUZE</a>
<button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    Menu
    <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">');
foreach($mymenu as $pageId => $pageParameters) {
    if($pageId==$currentPageId){
       echo "<li><a id = 'currentPage' class = 'navbar-link' href='http://localhost/IDAW/SitePro/v3/index.php?page={$pageId}&lang={$lang}'>$pageParameters[$indice]</a></li>";
    }
    else{
        echo "<li><a class = 'navbar-link' href='http://localhost/IDAW/SitePro/v3/index.php?page={$pageId}&lang={$lang}'>$pageParameters[$indice]</a></li>";
    } 
}
if($lang=='fr'){
    echo ("<li><a class='navbar-link' href='index.php?page={$currentPageId}&lang=en'>Anglais</a>");
}elseif($lang=='en'){
    echo ("<li><a class='navbar-link' href='index.php?page={$currentPageId}&lang=fr'>Français</a>");
}
echo ('</ul>
</div>
</div>
</nav>');
// ...
}
?>
