<?php
function track($trackingnumber)
{
    $url = "http://production.shippingapis.com/shippingAPI.dll";
    $service = "TrackV2";
    $xml = rawurlencode("
    <TrackRequest USERID='MYUSERID'>
        <TrackID ID=\"".$trackingnumber."\"></TrackID>
    </TrackRequest>");
    $request = $url . "?API=" . $service . "&XML=" . $xml;
    // send the POST values to USPS
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$request);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // parameters to post

   $result = curl_exec($ch);    
   //var_dump($result);  
   curl_close($ch);

   $response = new SimpleXMLElement($result);
   print_r($result);
   //$deliveryStatus = $response->TrackResponse->TrackInfo->TrackSummary;
   //echo $deliveryStatus;
   //return $retval;
}
?>
