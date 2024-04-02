<!-- A simple menu sub-modules, list works as links -->
<div class="menu">
<?php
$data = curl_get($API_ENDPOINT . "/content/item/Works");
foreach ($data as $key => $v) {
    echo '<a href="?w=' . htmlentities($v['_id']) . '">'. htmlentities($v['Title']) .'</a><br />';
}
?>
</div>