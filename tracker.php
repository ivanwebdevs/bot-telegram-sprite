<?php

$user_agent = $_SERVER['HTTP_USER_AGENT'];
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$ip = get_client_ip();
$token = "";

function kirim_pesan($chat_id,$text){
    
    global $token;
    
    $text = urlencode($text);
    
    file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&parse_mode=HTML&text=
$text");
    
    
}


$iplookup = json_decode(file_get_contents("https://www.iplocate.io/api/lookup/$ip"));


 kirim_pesan("5866413877","
 <b>Laporan pengunjung situs</b>
User Agent : $user_agent
Ip ADDRESS : $ip

Negara : $iplookup->country
Kota : $iplookup->city
ORG : $iplookup->org
Time/Zone : $iplookup->time_zone
 ");

?>



<h1>Hello world</h1>
