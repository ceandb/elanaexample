<?php

include_once("includes/mysql_connect.php");
include_once("includes/shopify.php");

/**
 * =====================================================================================
 *       Crear variables
 *          - $shopify
 *          - $parameters
 * =====================================================================================
 */
// usar Query y Select para tener la información de la tienda

$shopify = new shopify();
$parameters = $_GET;

/**
 * =====================================================================================
 *  cheking the shopify store 
 * =====================================================================================
 */
include_once("includes/check_token.php");
/**
 * =====================================================================================
 *  Display anything of the store 
 * =====================================================================================
 */

 // se puede cambiar el response aca por cada scope
//$access_scopes = $shopify-> rest_api('/admin/oauth/access_scopes.json', array(),'GET');
//$response = json_decode($access_scopes['body'], true);


?>


<?php include_once("headers.php"); ?>
<?php 
        $query =array("query" => "{
            shop {
                id 
                name 
                email
            }
        }");
        $graphql_test = $shopify->graphql($query); 
        $graphql_test = json_decode($graphql_test['body'], true);
        echo print_r ($graphql_test);
 ?>

    <section>
        <div class="alert column twelve">
            <dl>
                <dt>
                    <p>Bienvenidos </P>

                </dt>
            </dl>
        </div>
    </section>
    <footer></footer>


<?php include_once("footer.php"); ?>