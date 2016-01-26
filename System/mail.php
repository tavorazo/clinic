<?php

// Función que envía correos a través de mailgun con cURL


function send_mail($email,$subject,$msg) {
 $api_key="key-4cc8a5409db6d1a732f2850419c5cc84";/* Api Key got from https://mailgun.com/cp/my_account */
 $domain ="sandboxd5c4c04ed485445485f21e5fba950d81.mailgun.org";/* Domain Name you given to Mailgun */
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
 curl_setopt($ch, CURLOPT_USERPWD, 'api:'.$api_key);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
 curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/'.$domain.'/messages');
 curl_setopt($ch, CURLOPT_POSTFIELDS, array(
  'from' => 'Endoperio <endoperio@endoperio.com.mx>',
  'to' => $email,
  'subject' => $subject,
  'html' => $msg
 ));
 $result = curl_exec($ch);
 curl_close($ch);
 return $result;
}

?>