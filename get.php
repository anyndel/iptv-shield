<?
    $provs = array(
        "itb" => "http://srv19648.noip.network:8080/get.php?username=xaosssfz&password=zKjhflgjKLK&type=m3u_plus&output=mpegts",
        "wrp" => "http://cdn-w.cc/get.php?username=3SC8541&password=98326615&output=ts&type=m3u_plus"
    )

    $pass = "dunst34l"
    $c = file_get_contents("./pass.word");

    if ( $c !== FALSE )
    {
        $pass = $c;
    }

    if (!isset($_GET["u"]) || $_GET["u"] != $pass)
        return;

    $ch =  curl_init('https://api.iptoasn.com/v1/as/ip/'.$_SERVER['REMOTE_ADDR']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
    $result = curl_exec($ch);

    if ( $result === FALSE )
        return;
    
    $asn = json_decode($result);

    //MELITA PLC ASN
    if ( $asn['as_number'] != 12709 )
        return;

    $ret = isset($_GET["l"]) ? $_GET["l"] : 'itb';

    header('Location: '.$provs[$ret]);
?>