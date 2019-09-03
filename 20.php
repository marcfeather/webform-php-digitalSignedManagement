<?php
    if (isset($_GET['sms'])) {
        $message = $_GET['sms'];
    }else {
        $message = '';
    }

    $page_content = "views/html_zip_list.php";
    include("views/_masterpage.php");
?>

<!-- Addition Scripts -->
<script src="script/html_zip_list.js"></script>

<script> 
    var message = "<?php echo $message; ?>";
</script>