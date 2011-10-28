<?php 
$cmd = null;
if($_GET){ $cmd = $_GET['cmd']; }

//include("include.php");
include("views/header.php");
include("views/main/top_nav.php");
?>

<div class="container">

<?php 
include("views/welcome.php");
?>

</div>
<?php
include("views/footer.php");
//End of index.php