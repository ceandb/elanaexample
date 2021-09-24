<?php
/**
 * =====================================================================================
 *  cheking the shopify store 
 * =====================================================================================
 */
$query = "SELECT * FROM shops WHERE shop_url= '" . $parameters ['shop'] . "' LIMIT 1";
$result = $mysql -> query($query);

// verificar que las filas es menor que 1 asi redirecciona a la pagina de instalación
if ($result ->num_rows < 1)
{
        header("Location: install.php?shop=" .$_GET['shop']);
        exit;
}
// usar fetch assoc para obtener los records
$store_data = $result-> fetch_assoc();

$shopify->set_url($parameters['shop']);
$shopify->set_token($store_data['access_token']);

$shop = $shopify-> rest_api('/admin/api/2021-04/shop.json', array(),'GET');
$response = json_decode($shop['body'], true);

if (array_key_exists('errors',$response)){
    header("Location: install.php?shop=" .$_GET['shop']);
    exit;
}
