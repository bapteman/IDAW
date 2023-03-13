<?php
function renderMenuToHTML($currentPageId) {
// un tableau qui d\'efinit la structure du site
$mymenu = array(
// idPage titre
    'accueil' => array( 'Accueil' ),
    'cv' => array( 'Cv' ),
    'projets' => array('Mes Projets')
);
// ...

foreach($mymenu as $pageId => $pageParameters) {
    if($pageId==$currentPageId){
       echo "<li><a id = 'currentPage' class = 'navbar-link' href='http://localhost/SitePro/v3/index.php?page={$pageId}.php'>$pageParameters[0]</a></li>";
    }
    else{
        echo "<li><a class = 'navbar-link' href='http://localhost/SitePro/v3/index.php?page={$pageId}.php'>$pageParameters[0]</a></li>";
    } 
}
// ...
}
?>
