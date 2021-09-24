<?php
include_once("includes/mysql_connect.php");
include_once("includes/shopify.php");

$shopify = new shopify();
$parameters = $_GET;

include_once("includes/check_token.php");

$script_url = 'https://6ca8-190-104-119-240.ngrok.io/elana/scripts/elana.js';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if($_POST ['action_type'] == 'create_script'){

        $mutation = array ("mutation" => 'mutation {
            scriptTagCreate (input:{
              src:"' . $script_url . '"
              displayScope : ALL
            }) {
              scriptTag {
                id
              }
              userErrors{
                field
                message
              }
            }
            }' );
        $create_script = $shopify -> graphql($mutation);

    //     $scriptTag_data = array(
    //         "script_tag" => array(
    //             "event" => "onload",
    //             "src" => $script_url
    //         )
    //     );
    //    $create_script = $shopify ->rest_api('/admin/api/2021-07/script_tags.json', $scriptTag_data, 'POST');
    //    $create_script = json_decode ($create_script['body'], true);
       //echo print_r($create_script);

    }

    if($_POST ['action_type'] == 'delete_script'){
        $script_tag = array('src' => $script_url);
        $get_script = $shopify ->rest_api('/admin/api/2021-07/script_tags.json', $script_tag, 'GET');
        $get_script = json_decode ($get_script['body'], true);
      

       foreach ($get_script ['script_tags']  as $script) {
        $delete_script = $shopify ->rest_api('/admin/api/2021-07/script_tags/' . $script['id'] .  '.json', array(), 'DELETE');
       }
    }
}

 $scriptTags = $shopify ->rest_api('/admin/api/2021-04/script_tags.json', array(), 'GET');
 $scriptTags = json_decode ($scriptTags['body'], true);
// echo print_r($scriptTags);
 ?>
<?php include_once("headers.php")?>

 <section >
     <aside>
         <h2> Install script tag </h2>
         <p>click install button to apply your script</p>
     </aside>
     <article>
         <div class="card">
             <form action="" method="post">
                <input type="hidden" name="action_type" value ="create_script"> 
                <button type="submit">Crear Script tag</button>
             </form>
         </div>
     </article>
 </section>
 <section >
     <aside>
         <h2> Delete script tag </h2>
         <p>click install button to apply your script</p>
     </aside>
     <article>
         <div class="card">
             <form action="" method="post">
                <input type="hidden" name="action_type" value ="delete_script"> 
                <button type="submit">Borrar Script tag</button>
             </form>
         </div>
     </article>
 </section>

 <?php include_once("footer.php")?>