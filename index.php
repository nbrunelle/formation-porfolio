<!DOCTYPE html>
<?php

    # Define the API endpoit of the website
    $API_ENDPOINT = "UPDATE WITH YOUR API_ENDPOINT DEFINED BY A READER ROLE YOU CREATED ON COCKPIT";

    /**
     * define a simple fucntion to communicate easily with the API
     * @property string $url - basic route to the API
     * @property array $get - filter of information to get from the return call
     * @property array $options - general options to define the call
     */
    function curl_get($url, array $get = NULL, array $options = array())
    {    
        $defaults = array(
            CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get),
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 4
        );
    
        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));
    
        if( ! $result = curl_exec($ch))
        {
            trigger_error(curl_error($ch));
        }
    
        curl_close($ch);
        return json_decode($result, true);
    
    }
?>
<html lang="en">
<head>
    <!-- Contient les informations générales sur site (la langue, la fiche de style, les plugins et autres à importer) -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Contenu principal du site -->

    <div class="menu">
        <?php include('./modules/_menu.php'); # Inclut un sous-module de menu ?>
    </div>

    <?php
    /**
     * Importe les différents modules selon une valeurs passée dans l'adresse URL
     */
    switch (htmlspecialchars($_GET['d'], ENT_QUOTES, 'UTF-8')) {
        case 'w':
            # Inclut le module qui affiche un travail en particulier 
            include('./modules/works.php');
            break;
        
        default:
            # Cas de base, qui peut être utilisé pour un splashcreen
            break;
    }
    ?>
</body>
</html>