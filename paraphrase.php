<?php



error_reporting(E_ERROR);
function request($text)
{
    $data = '{"mode":"creative","text":"'. $text .'"}';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.paraphrase.app/paraphrase-modes");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $headers = array();
    $headers[] = "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36";
    $headers[] = "Accept: */*";
    $headers[] = "Accept-Language: en-US,en;q=0.9,id;q=0.8";
    $headers[] = "Accept-Encoding: gzip, deflate, br";
    $headers[] = "Referer: https://paraphrasetool.com/";
    $headers[] = "Origin: https://paraphrasetool.com";
    $headers[] = "Content-Type: application/json";




    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_HEADER, 1);

    curl_setopt($ch, CURLOPT_ENCODING, "GZIP");
    $exec = curl_exec($ch);
    return $exec;
    curl_close($ch);
}

echo "Text : ";
$text = trim(fgets(STDIN));
$str =  request($text);

$cok = explode('"',$str);
echo "Result :".$cok[7];
?>
