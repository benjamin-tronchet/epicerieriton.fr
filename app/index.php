<?php 

$PAGE_name = 'accueil';
//INCLUDE HELPER & HEADER
include 'includes/helper.php'; 
include 'includes/header.php'; 

foreach($SECTIONS as $id => $section)
{
?>
    <section id="<?=$id?>" class="u-section" data-action="section">
        <?php
            include 'includes/sections/'.$id.'.php';
        ?>
    </section>
<?php
}

include 'includes/footer.php'; 

?>