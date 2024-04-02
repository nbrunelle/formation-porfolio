<!-- A SIMPLE WORK MODULE, LISTING SOME FIELDS OF A SPECIFIC ENTRY OF THE WORKS MODEL -->
<?php
$title = htmlspecialchars($_GET['w']);
$data = curl_get($API_ENDPOINT . "/content/item/Works/" . $title ,[]);
?>

<div class="works">
    <!-- EXAMPLE OF DISPLAYING A FIELD -->
    <div class="FIELD">
        <p>
            <?php echo $data['FIELD']; ?>
        </p>
    </div>

    <!-- EXAMPLE OF DISPLAYING AN IMAGE -->
    <div class="FIELD">
        <img src="<?php echo $data['IMG']['path']; ?>" alt="<?php echo $data['IMG']['description']; ?>">
    </div>

</div>