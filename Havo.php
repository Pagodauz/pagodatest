<?php 

// token maydoni
define('bot_token','993240170:AAFv8CY8rqY8J6OStJPpF8E7yLq37HolJsE');
// manba @Pagoda_Uz kanalidan olingan

    function xabarYubor(array $content)
    {
        return endpoint('sendMessage', $content);
   
  bot('sendChatAction',[
'chat_id'=>$chat_id,
'action'=>"typing",
]);

}
    function buildKeyBoard(array $options, $onetime = false, $resize = true, $selective = true)
    {
        $replyMarkup = [
            'keyboard'          => $options,
            'one_time_keyboard' => $onetime,
            'resize_keyboard'   => $resize,
            'selective'         => $selective,
        ];
        $encodedMarkup = json_encode($replyMarkup, true);

        return $encodedMarkup;
    }

    function endpoint($api, array $content, $post = true)
    {
        $url = 'https://api.telegram.org/bot'.bot_token.'/'.$api;
        if ($post) {
            $reply = sendAPIRequest($url, $content);
        } else {
            $reply = sendAPIRequest($url, [], false);
        }
        return json_decode($reply, true);
    }

    function sendAPIRequest($url, array $content, $post = true)
    {
        if (isset($content['chat_id'])) {
            $url = $url.'?chat_id='.$content['chat_id'];

            //$url = $url.'?'.http_build_query($content);

            unset($content['chat_id']);
            //unset($content);
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if ($post) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        if ($result === false) {
            $result = json_encode(['ok'=>false, 'curl_error_code' => curl_errno($ch), 'curl_error' => curl_error($ch)]);
        }
        curl_close($ch);

        return $result;
    }

     function buildForceReply($selective = true)
    {
        $replyMarkup = [
            'force_reply' => true,
            'selective'   => $selective,
        ];
        $encodedMarkup = json_encode($replyMarkup, true);

        return $encodedMarkup;
    }
    
// uzizni ID raqamingizni kiritasiz
$admin = "737938387";

// BOT iz username si
$bot_name = "@botiz user namesi";
 $pic = "http://rasm.biz/get/getImage.php?width=100&img=c3lzL3RtcC9SYXNtLkJpel8wZjVkYWJjMWViZTQ5MmViMWUzYWJjYzRmMzM4ODNjOC5qcGc="; 
 
$efede = json_decode(file_get_contents('php://input'), true);
//basic        
$text = $efede["message"]["text"];
$text1 = $efede["message"]["text"]; 
$photo = $efede["message"]["photo"];
$sana = $efede["message"]["date"];
$chat_id = $efede["message"]["chat"]["id"];
 $sayt = "https://ob-havo.uz/fargona"; 
 $rs = simplexml_load_file($sayt);
foreach ($rs->channel->item as $item) {   $line_rsss =  ' '.$item->title.' ';
    break;
} 
// chat
$cfname = $efede['message']['chat']['first_name'];
$cid = $efede["message"]["chat"]["id"];
$clast_name = $efede['message']['chat']['last_name'];
$turi = $efede["message"]["chat"]["type"];

 $url = 'https://daryo.uz/feed/';
$rss = simplexml_load_file($url);
foreach ($rss->channel->item as $item) {

    $line_rss =  ' '.$item->title.' ';
   $line_rss .= ' '.$item->link.' ';
    break;
} 
 
//user info
$ufname = $efede['message']['from']['first_name'];
$uname = $efede['message']['from']['last_name'];
$ulogin = $efede['message']['from']['username'];
$uid = $efede['message']['from']['id'];
$user_id = $efede['message']['from']['id'];
//reply info
$sreply = $efede['message']['reply_to_message']['text'];
    // umumiy menu
    $menu = [["Vaqt haqida","Siz haqingizda"],["Bot haqida","Qoshimcha menyu"],["Yangiliklar"]];
    $menu3 = [["Uzbekiston","Rossiya"],["Ortga qaytish"]]; 
 
$soat11 = date('H:i:s ',strtotime('3 hour')); 
 $bugun11 = date('d-M Y',strtotime('3 hour')); 
 $userId = 'user_id.txt';
$userId2 = file_get_contents($userId);

if(mb_stripos($userId2, "$chat_id") !== false ){

} else {

$id = "$chat_id\n";

$handle = fopen($userId, 'a+');
fwrite($handle, $id);
fclose($handle);
} 
  $private = substr_count($userId2,"\n");
 
 $menu1 = [["Ramazon taqvimi","馃挜 Bot azolari 馃懕"],["馃帺 Admin bilan bog'lanish 馃帺","Ortga qaytish"]];
$soat = date('H:i:s ',strtotime('5 hour')); 
 $bugun = date('d-M Y',strtotime('5 hour')); 
   if ($text == 'Vaqt haqida') {
        $keyfd = buildKeyBoard($menu3, $onetime = false, $resize = false);
        $content = ['chat_id' => $chat_id, 'reply_markup' => $keyfd, 'text' => "*O'zingizga kerakli davlatni tanlang va vaqtni bilib oling!*", 'parse_mode' => 'markdown'];
        xabarYubor($content);
    } 

 if ($text == 'Tv') {
        $keyfd = buildKeyBoard($menu, $onetime = false, $resize = false);
        $content = ['chat_id' => $chat_id, 'reply_markup' => $keyfd, 'text' => "$line_rsss

Manba: [@xvest]", 'parse_mode' => 'markdown'];
        xabarYubor($content);
    } 
 if ($text == '/start') {
        $keyfd = buildKeyBoard($menu, $onetime = false, $resize = false);
        $content = ['chat_id' => $chat_id, 'reply_markup' => $keyfd, 'text' => "Assalomu aleykum [$ufname $uname](telegram.me/$ulogin)", 'parse_mode' => 'markdown'];
        xabarYubor($content); 
 
} 
 if ($text == 'Yangiliklar') {
        $keyfd = buildKeyBoard($menu, $onetime = false, $resize = false);
        $content = ['chat_id' => $chat_id, 'reply_markup' => $keyfd, 'text' => "$line_rss \n
Batafsil o'qish uchun linkga bosing!\n \n
Manba: [Pagoda_Uz](telegram.me/pagoda_Uz) [@Pagoda_Uz]", 'parse_mode' => 'markdown'];
        xabarYubor($content); 
 
} 

 if ($text == 'Uzbekiston') {
        $keyfd = buildKeyBoard($menu3, $onetime = false, $resize = false);
        $content = ['chat_id' => $chat_id, 'reply_markup' => $keyfd, 'text' => "* O'zbekistonda Bugun* `$bugun-yil` *soat* `$soat` *bo'ldi!*", 'parse_mode' => 'markdown'];
        xabarYubor($content);
    } 
 
 if ($text == 'Rossiya') {
        $keyfd = buildKeyBoard($menu3, $onetime = false, $resize = false);
        $content = ['chat_id' => $chat_id, 'reply_markup' => $keyfd, 'text' => "*Rossiyada Bugun* `$bugun11-yil` *soat* `$soat11` *bo'ldi!*", 'parse_mode' => 'markdown'];
        xabarYubor($content);
    } 
 if ($text == 'Rasm') {
        $keyfd = buildKeyBoard($menu, $onetime = false, $resize = false);
        $content = ['chat_id' => $chat_id, 'reply_markup' => $keyfd, '$photo' => "$pic", 'parse_mode' => 'markdown'];
        xabarYubor($content); 
 }
        if ($text == '/stat' || $text == "馃挜 Bot azolari 馃懕"){ 
        $keyfd = buildKeyBoard($menu1, $onetime = false, $resize = false);
        $content = ['chat_id' => $chat_id, 'reply_markup' => $keyfd, 'text' => "*馃挜Bot azolari:* \n _馃懕Foydalanuvchilar:_  *$private*ta  \n _馃憫Admin_  @xvest

_So'nggi yangilanish:_
`$bugun $soat`
 @Pagoda_Uz" , 'parse_mode' => 'markdown'];
        xabarYubor($content);
    } 

 
  if ($text == 'Siz haqingizda') {
        $keyfd = buildKeyBoard($menu, $onetime = false, $resize = false);
        $content = ['chat_id' => $chat_id, 'reply_markup' => $keyfd, 'text' => "*Siz haqingizda!*
_鈩癸笍Ismingiz: _*$ufname*
_Familiyangiz:_ *$uname*
_Username'iz:_ @$ulogin 
_馃啍Id raqamingiz:_ *$uid*
@Pagoda_Uz", 'parse_mode' => 'markdown'];
        xabarYubor($content);
    }
    if ($text == 'Bekor qilish') {
        $keyfd = buildKeyBoard($menu, $onetime = false, $resize = false);
        $content = ['chat_id' => $chat_id, 'reply_markup' => $keyfd, 'text' => "Bekor qilindi.", 'parse_mode' => 'markdown'];
        xabarYubor($content);
    } 
 if ($text == 'Qoshimcha menyu') {
        $keyfd = buildKeyBoard($menu1, $onetime = false, $resize = false);
        $content = ['chat_id' => $cid, 'reply_markup' => $keyfd, 'text' => "Siz qoshimcha menyudasiz", 'parse_mode' => 'markdown'];
        xabarYubor($content);
    } 
 if ($text == 'Ortga qaytish') {
        $keyfd = buildKeyBoard($menu, $onetime = false, $resize = false);
        $content = ['chat_id' => $cid, 'reply_markup' => $keyfd, 'text' => "*Salom $ufname siz asosiy menyudasiz*", 'parse_mode' => 'markdown'];
        xabarYubor($content);
    } 
  if ($text == 'Ramazon taqvimi') {
        $keyfd = buildKeyBoard($menu1, $onetime = false, $resize = false);
        $content = ['chat_id' => $chat_id, 'reply_markup' => $keyfd, 'text' => "*Ramazon taqvimi rasm formatida*[.](https://t.me/pagoda_uz/1)", 'parse_mode' => 'markdown'];
        xabarYubor($content);
    } 
 
    if ($text == 'Bot haqida') {
        
        $keyfd = buildKeyBoard($menu, $onetime = false, $resize = false);
        $content = ['chat_id' => $chat_id,  'reply_markup'=> $keyfd, 'text' => "*Assalomu aleykum* $ufname.
*Bu botda asosan soat va o'zingiz haqingizdagi ma'lumotlarni bilib olishingiz mumkin!*
@Pagoda_Uz ", 'parse_mode' => 'markdown'];
        xabarYubor($content);
    }
 if ($text == 'Soat') {
        $keyfd = buildKeyBoard($menu, $onetime = false, $resize = false);
        $content = ['chat_id' => $cid, 'reply_markup' => $keyfd, 'text' => "*$soat*", 'parse_mode' => 'markdown'];
        xabarYubor($content);
    } 
        if ($text == '/feedback' || $text == "馃帺 Admin bilan bog'lanish 馃帺"){
            $keyfd = buildForceReply($selective=false);
            $content = ['chat_id' => $chat_id, 'reply_markup' => $keyfd, 'text' => "Xabar matnini kiriting", 'parse_mode' => 'markdown'];
            xabarYubor($content);
        }

        if ($sreply == 'Xabar matnini kiriting'){

            $option = $menu;
            $keyfd = buildKeyBoard($option, $onetime = false);
            $content = ['chat_id' => $chat_id, 'reply_markup' => $keyfd, 'text' => "**Xabaringiz yaqin fursatda ko'rib chiqiladi!**", 'parse_mode' => 'markdown'];
            xabarYubor($content);

            $option = [["javob#$chat_id"],["Bekor qilish"]];
            $keyfd = buildKeyBoard($option, $onetime = false);
            $content = ['chat_id' => $admin, 'reply_markup' => $keyfd, 'text' => "*Sizga $ufname dan xabar keldi:*

*Xabar kelgan vaxti:*  `$bugun $soat`

*Xabar matni:*
$text \n \n \n \n鈩癸笍*Ismi:*`$ufname` \n *Familiyasi:* `$uname` \n *Login:* @$ulogin \n * 馃啍 ID:* $uid \n\n ", 'parse_mode' => 'markdown'];
            xabarYubor($content);
        }

        $inreg = explode("#",$text);
        $intype  = $inreg[0];
        $us_id  = $inreg[1];

        if ($intype == 'javob') {

            $keyfd = buildForceReply($selective=true);
            $content = ['chat_id' => $chat_id, 'reply_markup' => $keyfd, 'text' => "javob matnini kiriting#$us_id", 'parse_mode' => 'markdown'];
            xabarYubor($content);
        }

        $inreg = explode("#",$sreply);
        $intype  = $inreg[0];
        $us_id  = $inreg[1];

        if ($intype == 'Tez orada javob olasiz'){

            $option = $menu;
            $keyfd = buildKeyBoard($option, $onetime = false);
            $content = ['chat_id' => $us_id, 'reply_markup' => $keyfd, 'text' => $text, 'parse_mode' => 'markdown'];
            xabarYubor($content);

            $option = $menu;
            $keyfd = buildKeyBoard($option, $onetime = false);
            $content = ['chat_id' => $admin, 'reply_markup' => $keyfd, 'text' => "Xabar yetkazildi", 'parse_mode' => 'markdown'];
            xabarYubor($content);
        }
