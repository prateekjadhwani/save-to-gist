<?php
header('Access-Control-Allow-Origin: YOUT_CLIENT_URL');
header('Content-Type: application/json');

$data = 'client_id=' . 'YOUR_CLIENT_ID' . '&' .
		'client_secret=' . 'YOUR_CLIENT_SECRET' . '&' .
		'code=' . urlencode($_GET['code']);

$ch = curl_init('https://github.com/login/oauth/access_token');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

preg_match('/access_token=([0-9a-f]+)/', $response, $out);
echo json_encode($out[1]);
curl_close($ch);
?>
