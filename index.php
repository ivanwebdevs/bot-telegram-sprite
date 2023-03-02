<?php

$token = "6026579575:AAGQFS4XtJoqJO3qiYnpf6BlBEbwzjpyAgM";

function kirim_pesan($chat_id,$text){
    
    global $token;
    
    $text = urlencode($text);
    
    file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$text");
    
    
}

$postdata = json_decode(file_get_contents("php://input"));
$chat_id = $postdata->message->from->id;
$text = $postdata->message->text;


if ($text == "/start"){
    kirim_pesan($chat_id,"hello");
}

elseif($text == "/id"){
    kirim_pesan($chat_id,$chat_id);
}

else{
    kirim_pesan($chat_id,"Saya tidak mengerti silahkan ketik /start buat melanjutkan");
}




?>
