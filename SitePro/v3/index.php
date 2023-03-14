<?php
require_once("template_header.php");
$currentPageId = 'accueil';
if(isset($_GET['page'])) {
$currentPageId = $_GET['page'];
}
if(isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    }
?>
<?php
    require_once('template_menu.php');
    renderMenuToHTML($currentPageId,$lang);
?>
<section class="corps">
<?php
$pageToInclude =$lang . "/" . $currentPageId . ".php";
if(is_readable($pageToInclude))
require_once($pageToInclude);
else
require_once("error.php");
?>
</section>
<?php
require_once("template_footer.php");
?>