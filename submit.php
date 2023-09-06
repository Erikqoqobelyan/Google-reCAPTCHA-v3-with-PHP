
<?php

$captcha = real_escape_string($_POST['googlerecaptcha']);

$request_url = 'https://www.google.com/recaptcha/api/siteverify';

$request_data = [
    'secret' => 'reCAPTCHA_secret_key',
    'response' => $captcha
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $request_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response_body = curl_exec($ch);

curl_close ($ch);

$response_data = json_decode($response_body, true);

if ($response_data['success'] == false) {
    // return back with error that captcha is invalid
} else {
    // captcha is valid and proceed for next
}
?>
