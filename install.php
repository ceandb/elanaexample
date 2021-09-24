<?php
$_API_KEY = 'e6ab6265e31ce653ea02ad34560b0858';
$_NGROK_URL =  'http://6ca8-190-104-119-240.ngrok.io';
$shop = $_GET['shop'];
$scopes = 'read_products,write_products,read_orders,write_orders,read_script_tags,write_script_tags';
$redirect_uri = $_NGROK_URL . '/elana/token.php';
$nonce = bin2hex( random_bytes( 12 ) );
$acces_mode = 'per-user';

$oauth_url = 'https://' . $shop . '/admin/oauth/authorize?client_id=' . $_API_KEY . '&scope=' . $scopes . '&redirect_uri=' . urlencode($redirect_uri) .'&state=' . $nonce . '&grant_options[]=' . $acces_mode;

header("Location:" . $oauth_url);
exit;