<?php

    require ('lang.php');

    $a = $_POST['a'];   // AD
    $b = $_POST['b'];   // SOYAD
    $c = $_POST['c'];   // TC Kimlik Numarası
    $d = $_POST['d'];   // Doğum Yılı

    foreach ($_POST as $index => $value){
        $_POST[$index] = trim($value);
        if (strlen($value) < 1) returnJSON($j['EmptyFields']);
    }

    $xml = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope
                    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                    xmlns:xsd="http://www.w3.org/2001/XMLSchema"
                    xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
                >
                <soap:Body>
                    <TCKimlikNoDogrula xmlns="http://tckimlik.nvi.gov.tr/WS">
                        <TCKimlikNo>'.$c.'</TCKimlikNo>
                        <Ad>'.$a.'</Ad>
                        <Soyad>'.$b.'</Soyad>
                        <DogumYili>'.$d.'</DogumYili>
                    </TCKimlikNoDogrula>
                </soap:Body>
            </soap:Envelope>';

    $headers = array(
        'POST /Service/KPSPublic.asmx HTTP/1.1',
        'Host: tckimlik.nvi.gov.tr',
        'Content-Type: text/xml; charset=utf-8',
        'Content-length: '.strlen($xml),
        'SOAPAction: "http://tckimlik.nvi.gov.tr/WS/TCKimlikNoDogrula"'
    );

    $ch = curl_init('https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL');
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    $output = strip_tags(curl_exec($ch));
    curl_close($ch);

    $output = $output === 'true' ? true:false;

    if ($output) returnJSON($j['API']['Success']);
    
    returnJSON($j['API']['Failed']);