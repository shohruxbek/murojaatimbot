<?php
/*define('API_KEY',''); */
define('API_KEY',''); 
  include_once('db.php');

function bot($method,$datas=[]){
    $url = "https://api.Telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$message_id = $message->message_id;
$chat_id = $message->chat->id;
$firstname = $message->from->first_name;
$username = $message->from->username;
$username2 = $callback->message->from->username;
$first_name2 = $callback->message->from->first_name;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id2 = $callback->message->message_id;
$callback = $update->callback_query;
$cap2 = $update->callback_query->message->caption;
$sdg = $update->callback_query->message->from->first_name;
$data = $update->callback_query->data;
$datas = $update->callback_query->data;
$chdi = $update->callback_query->message->message_id;
$cqid = $update->callback_query->id;
$text = $message->text;
$soat = date('H:i');
$kun = date ('d.m.Y');

$admin1 = "892127216";//admin idsi
$admin2 = "582306383";//admin idsi
$guruh = '-1001204943733';//guruh idsi


$key = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🖥 Компютер техник хизмати масаласи 🖥"],],
[['text'=>"🌐 Интернет хизмати масаласи 🌐"],],
[['text'=>"📶 Сайт ёки moodle масаласи Ⓜ️"],],
]
]);



function qadam($a,$b){
    global $db;
   mysqli_query($db,"UPDATE `fishmark_log`.`full` SET `qadam` = '$b' WHERE `full`.`chat_id` = '$a'");   
}
function tanlov($a,$b){
    global $db;
   mysqli_query($db,"UPDATE `fishmark_log`.`full` SET `tanlov` = '$b' WHERE `full`.`chat_id` = '$a'");   
}
function yul1($a,$b){
    global $db;
   mysqli_query($db,"UPDATE `fishmark_log`.`full` SET `bir` = '$b' WHERE `full`.`chat_id` = '$a'");   
}
function yul2($a,$b){
    global $db;
   mysqli_query($db,"UPDATE `fishmark_log`.`full` SET `ikki` = '$b' WHERE `full`.`chat_id` = '$a'");   
}
function yul3($a,$b){
    global $db;
   mysqli_query($db,"UPDATE `fishmark_log`.`full` SET `uch` = '$b' WHERE `full`.`chat_id` = '$a'");   
}
function file_doc($a,$b){
    global $db;
   mysqli_query($db,"UPDATE `fishmark_log`.`full` SET `file_doc` = '$b' WHERE `full`.`chat_id` = '$a'");   
}
function file_photo($a,$b){
    global $db;
   mysqli_query($db,"UPDATE `fishmark_log`.`full` SET `file_photo` = '$b' WHERE `full`.`chat_id` = '$a'");   
}
function restart($a){
    global $db;
   mysqli_query($db,"UPDATE `fishmark_log`.`full` SET  `tanlov` = '0', `bir` = '', `ikki` = '', `uch` = '', `file_doc` = '' WHERE `full`.`chat_id` = '$a'");   
}
function delname($a,$b){
    global $db;
   mysqli_query($db,"UPDATE `fishmark_log`.`full` SET  `$b` = '' WHERE `full`.`chat_id` = '$a'");   
}
function del($a,$b){
	bot('deleteMessage',[ 
	     'chat_id'=>$a,
	       'message_id'=>$b,
	      ]);
}



if($chat_id){
   $sqlqadam = "SELECT * FROM `fishmark_log`.`full` WHERE `chat_id` = $chat_id"; 
}
elseif($chat_id2){
	$chat_id=$chat_id2;
	$message_id=$message_id2;
	$firstname=$first_name2;
	$username=$username2;
	$sqlqadam = "SELECT * FROM `fishmark_log`.`full` WHERE `chat_id` = $chat_id"; 
}


$resqadam= mysqli_query($db,$sqlqadam);
$rowqadam = mysqli_fetch_assoc($resqadam);

$id=$rowqadam['id'];
$qadam=$rowqadam['qadam'];
$shikoyat=$rowqadam['shikoyat'];
$taklif=$rowqadam['taklif'];
$status=$rowqadam['status'];
$yul1=$rowqadam['bir'];
$yul2=$rowqadam['ikki'];
$yul3=$rowqadam['uch'];
$tanlov=$rowqadam['tanlov'];
$file_other=$rowqadam['file_other'];

if($tanlov==1){
$tanlovsuz="🖥 Компютер техник хизмати масаласи 🖥";
}elseif($tanlov==2){
	$tanlovsuz="🌐 Интернет хизмати масаласи 🌐"
;}elseif ($tanlov==3) {
	$tanlovsuz="📶 Сайт ёки moodle масаласи Ⓜ️";
}
//boshlang'ich holat
 	if($text == "/start" or $text=="start" or $text=="Start" or $text=="START" or $text=="старт"  or $text=="Старт"){
	restart($chat_id);

	bot('sendMessage',[
	     'chat_id'=>$chat_id,
	       'message_id'=>$message_id,
	       'parse_mode'=>"Markdown",
	       'text'=>"*Ҳурматли деканлар, кафедра мудирлари ҳамда бўлим бошлиқлари.*\n\n Сиз фаолият олиб бораётган кафедра ёки бўлимда интернет, компьютер ҳамда сайт (moodle) юзасидан муаммолар бўлиб қолса, СИЗ қуйида келтирилган бўлимлардан бирини танлаб ўз мурожаатингизни ёзиб юборишингиз мумкин.\n\n
*Эслатма *\n
⚠️ Факультет, кафедра, бўлим номи, исми шарифингиз ҳамда телефон рақамингиз тўлиқ ёзилиши шарт.",
               'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['callback_data'=>"shr","text"=>"Мурожаат юбориш"],],
],
])
]);
	 if(!mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `fishmark_log`.`full` WHERE `chat_id` = $chat_id"))){
      mysqli_query($db,"INSERT INTO `full` (`id`, `chat_id`, `firstname`, `username`, `qadam`, `tanlov`, `bir`, `ikki`, `uch`, `file_doc`, `file_photo`, `file_other`, `status`) VALUES (NULL, '$chat_id', '$firstname', '$username', 'bm', '0', '', '', '', '', '', '', '1')"); 
  }
	}
 

 if($data=="shr"  or $text=="⬅️ Ортга" and $qadam=="ktx" and $status==1 or $text=="⬅️⬅️ Бош меню" and $status==1){
 	restart($chat_id);
 	qadam($chat_id,"bm");
del($chat_id,$chdi);
 	bot('sendMessage',[ 
	     'chat_id'=>$chat_id,
	       'message_id'=>$message_id,
	          'parse_mode'=>"Markdown",
	       'text'=>"* Хуш келибсиз * - Бўлимлардан бирини танланг👇",
	'reply_markup'=>$key, 
	      ]); 
 }
/*INSERT INTO `full` (`id`, `chat_id`, `firstname`, `username`, `qadam`, `tanlov`, `bir`, `ikki`, `uch`, `file_doc`, `file_photo`, `file_other`, `status`) VALUES (NULL, '12345678', 'ismi', 'userismi', 'bosh menyu', 'bir', 'ikki', 'uch', 'doc adresi', 'rasm adres', 'hamma adres', '1');*/






   //shikoyat qoldirish
	if($text=="🖥 Компютер техник хизмати масаласи 🖥" and $status==1 or $text=="⬅️ Ортга" and $qadam=="bir" and $status==1 and $tanlov==1){
	if($text=="⬅️ Ортга"){
delname($chat_id,"bir");
}	
qadam($chat_id,"ktx");
tanlov($chat_id,"1");
	 if(!mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `fishmark_log`.`full` WHERE `chat_id` = $chat_id"))){
      mysqli_query($db,"INSERT INTO `full` (`id`, `chat_id`, `firstname`, `username`, `qadam`, `tanlov`, `bir`, `ikki`, `uch`, `file_doc`, `file_photo`, `file_other`, `status`) VALUES (NULL, '$chat_id', '$firstname', '$username', 'ktx', '1', '1', '', '', '', '', '', '1')"); 
  }


		bot('sendMessage',[
	     'chat_id'=>$chat_id,
	       'message_id'=>$message_id,
	          'parse_mode'=>"Markdown",
	       'text'=>"*🖥 Компютер техник хизмати масаласи 🖥* \n\n*⚠️Бўлим ёки кафедра номини ёзинг🖌*",
	           'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"⬅️ Ортга"]],
]
])
	      ]);
	}

	elseif($text=="🖥 Компютер техник хизмати масаласи 🖥" and $status==0){
	bot('sendMessage',[ 
	     'chat_id'=>$chat_id,
	       'message_id'=>$message_id,
	          'parse_mode'=>"Markdown",
	       'text'=>"⚠️Сиз маълум бир сабабларга кўра ёзолмайсиз...",
	'reply_markup'=>$key, 
	      ]); 	
	}








	if($text=="🌐 Интернет хизмати масаласи 🌐" and $status==1 or $text=="⬅️ Ортга" and $qadam=="bir" and $status==1 and $tanlov==2){
	if($text=="⬅️ Ортга"){
delname($chat_id,"bir");
}	
qadam($chat_id,"ktx");
tanlov($chat_id,"2");
	 if(!mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `fishmark_log`.`full` WHERE `chat_id` = $chat_id"))){
      mysqli_query($db,"INSERT INTO `full` (`id`, `chat_id`, `firstname`, `username`, `qadam`, `tanlov`, `bir`, `ikki`, `uch`, `file_doc`, `file_photo`, `file_other`, `status`) VALUES (NULL, '$chat_id', '$firstname', '$username', 'ktx', '2', '1', '', '', '', '', '', '1')"); 
  }


		bot('sendMessage',[
	     'chat_id'=>$chat_id,
	       'message_id'=>$message_id,
	          'parse_mode'=>"Markdown",
	       'text'=>"*🌐 Интернет хизмати масаласи 🌐* \n\n*Бўлим ёки кафедра номини ёзинг🖌*",
	           'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"⬅️ Ортга"]],
]
])
	      ]);
	}

	elseif($text=="🌐 Интернет хизмати масаласи 🌐" and $status==0){
	bot('sendMessage',[ 
	     'chat_id'=>$chat_id,
	       'message_id'=>$message_id,
	       'text'=>"⚠️Сиз маълум бир сабабларга кўра ёзолмайсиз...",
	'reply_markup'=>$key, 
	      ]); 	
	}





if($text=="📶 Сайт ёки moodle масаласи Ⓜ️" and $status==1 or $text=="⬅️ Ортга" and $qadam=="bir" and $status==1 and $tanlov==3){
	if($text=="⬅️ Ортга"){
delname($chat_id,"bir");
}	
qadam($chat_id,"ktx");
tanlov($chat_id,"3");
	 if(!mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `fishmark_log`.`full` WHERE `chat_id` = $chat_id"))){
      mysqli_query($db,"INSERT INTO `full` (`id`, `chat_id`, `firstname`, `username`, `qadam`, `tanlov`, `bir`, `ikki`, `uch`, `file_doc`, `file_photo`, `file_other`, `status`) VALUES (NULL, '$chat_id', '$firstname', '$username', 'ktx', '3', '1', '', '', '', '', '', '1')"); 
  }


		bot('sendMessage',[
	     'chat_id'=>$chat_id,
	       'message_id'=>$message_id,
	          'parse_mode'=>"Markdown",
	       'text'=>"*📶 Сайт ёки moodle масаласи Ⓜ️* \n\n*⚠️ Бўлим ёки кафедра номини ёзинг🖌*",
	           'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"⬅️ Ортга"]], 
]
])
	      ]);
	}

	elseif($text=="📶 Сайт ёки moodle масаласи Ⓜ️" and $status==0){
	bot('sendMessage',[ 
	     'chat_id'=>$chat_id,
	       'message_id'=>$message_id,
	       'text'=>"⚠️Сиз маълум бир сабабларга кўра ёзолмайсиз...",
	'reply_markup'=>$key, 
	      ]); 	
	}







//shikoyat qoldirish texti
if($text and $qadam=="ktx" and $status==1  and $text!="⬅️ Ортга" and $text!="⬅️⬅️ Бош меню" and $text!="/start" or $text=="⬅️ Ортга" and $qadam=="ikki" and $status==1){
	qadam($chat_id,"bir");
	$texty=$text;
		if($text=="⬅️ Ортга"){
delname($chat_id,"ikki");
$texty=$yul1;
}
	
	yul1($chat_id,"$texty");
		
	bot('sendMessage',[
	     'chat_id'=>$chat_id,
	       'message_id'=>$message_id,
	          'parse_mode'=>"Markdown",
	       'text'=>"*$tanlovsuz* \n*✅ Бўлим ёки кафедра номи*- $texty \n\n*⚠️ Бўлим ёки кафедра мудири исмини ёзинг🖌*",
	      'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"⬅️ Ортга"]], [['text'=>"⬅️⬅️ Бош меню"]],
]
])
]);
	
}


if($text and $qadam=="bir" and $status==1 and $text!="⬅️ Ортга" and $text!="⬅️⬅️ Бош меню" and $text!="/start" or $text=="⬅️ Ортга" and $qadam=="uch" and $status==1){
$texty=$text;
		if($text=="⬅️ Ортга"){
delname($chat_id,"uch");
$texty=$yul2;
}
	
	yul2($chat_id,"$texty");

	qadam($chat_id,"ikki");
		
	bot('sendMessage',[
	     'chat_id'=>$chat_id,
	       'message_id'=>$message_id,
	          'parse_mode'=>"Markdown",
	       'text'=>"*$tanlovsuz* \n*✅ Бўлим ёки кафедра номи*- $yul1 \n*✅ Бўлим ёки кафедра мудири исми* - $texty \n\n*⚠️ Телефон рақамини ёзинг🖌*",
	         'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"⬅️ Ортга"]], [['text'=>"⬅️⬅️ Бош меню"]],
]
])
	      ]);
	
}

if($text!="⬅️ Ортга" and $text!="⬅️⬅️ Бош меню" and $text and $qadam=="ikki" and $status==1 and $text!="/start"){
	
	qadam($chat_id,"uch");
	yul3($chat_id,"$text");
		
	bot('sendMessage',[
	     'chat_id'=>$chat_id,
	       'message_id'=>$message_id,
	          'parse_mode'=>"Markdown",
	       'text'=>"*$tanlovsuz* \n*✅ Бўлим ёки кафедра номи*- $yul1 \n*✅ Бўлим ёки кафедра мудири исми* - $yul2 \n*✅ Телефон рақами* - $text \n\n*⚠️ Мурожаат электрон шаклини, расмини ёки қўлда ёзиб юборинг🗂*",
	          'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"⬅️ Ортга"]], [['text'=>"⬅️⬅️ Бош меню"]],
]
])
	      ]);
	
}



if($message->document and $status==1 and $qadam=="uch" or $message->photo and $status==1 and $qadam=="uch"  or $message->text and $status==1 and $qadam=="uch" and $text!="⬅️ Ортга" and $text!="⬅️⬅️ Бош меню" and $text!="/start"){


if($message->document){
	$aa = $message->document->file_name;
$rtd = $message->document->file_id;
file_doc($chat_id,$rtd);
bot('sendDocument',[
	     'chat_id'=>$chat_id,
	       'message_id'=>$message_id,
	       'document'=>$rtd,
	       'parse_mode'=>"Markdown",
	      'caption'=>"*Юборилди...($kun - $soat)*\n\n*$tanlovsuz* \n*✅ Бўлим ёки кафедра номи*- $yul1 \n*✅ Бўлим ёки кафедра мудири исми* - $yul2 \n*✅ Телефон рақами* - $yul3 \n*✅ Мурожаат электрон шакли* - $aa",
	      'reply_markup'=>$key, 
	      ]);

bot('sendDocument',[
	     'chat_id'=>$guruh,
	       'message_id'=>$message_id,
	       'document'=>$rtd,
	       'parse_mode'=>"Markdown",
	      'caption'=>"*Юборилди...($kun - $soat)*\n\n*$tanlovsuz* \n*✅ Бўлим ёки кафедра номи*- $yul1 \n*✅ Бўлим ёки кафедра мудири исми* - $yul2 \n*✅ Телефон рақами* - $yul3 \n*✅ Мурожаат электрон шакли* - $aa",
	     'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"жавоб ёзиш",'url'=>"https://telegram.me/murojaatim_bot?start=$chat_id=1"]],
[['text'=>"фойдаланувчини блоклаш",'url'=>"https://telegram.me/murojaatim_bot?start=$chat_id=2"]],
]
])
	      ]);
	}
	elseif($message->photo){

		$aa = $message->photo[0]->file_name;
$rtd = $message->photo[0]->file_id;

file_photo($chat_id,$rtd);
bot('sendPhoto',[
	     'chat_id'=>$guruh,
	       'message_id'=>$message_id,
	       'photo'=>$rtd,
	       'parse_mode'=>"Markdown",
	       'caption'=>"*Юборилди...($kun - $soat)*\n\n*$tanlovsuz* \n*✅ Бўлим ёки кафедра номи*- $yul1 \n*✅ Бўлим ёки кафедра мудири исми* - $yul2 \n*✅ Телефон рақами* - $yul3 \n*✅ Мурожаат расм шаклида*",
	       'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"жавоб ёзиш",'url'=>"https://telegram.me/murojaatim_bot?start=$chat_id=1"]],
[['text'=>"фойдаланувчини блоклаш",'url'=>"https://telegram.me/murojaatim_bot?start=$chat_id=2"]],
]
]) 
	      ]);
bot('sendPhoto',[
	     'chat_id'=>$chat_id,
	       'message_id'=>$message_id,
	       'photo'=>$rtd,
	       'parse_mode'=>"Markdown",
	       'caption'=>"*Юборилди...($kun - $soat)*\n\n*$tanlovsuz* \n*✅ Бўлим ёки кафедра номи*- $yul1 \n*✅ Бўлим ёки кафедра мудири исми* - $yul2 \n*✅ Телефон рақами* - $yul3 \n*✅ Мурожаат расм шаклида*",'reply_markup'=>$key, 
	      ]);
	}elseif($message->text){
bot('sendMessage',[
	     'chat_id'=>$guruh,
	       'message_id'=>$message_id,
	       'parse_mode'=>"Markdown",
	       'text'=>"*Юборилди...($kun - $soat)*\n\n*$tanlovsuz* \n*✅ Бўлим ёки кафедра номи*- $yul1 \n*✅ Бўлим ёки кафедра мудири исми* - $yul2 \n*✅ Телефон рақами* - $yul3 \n*✅ Мурожаат шакли техт* - $text",
	       'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"жавоб ёзиш",'url'=>"https://telegram.me/murojaatim_bot?start=$chat_id=1"]],
[['text'=>"фойдаланувчини блоклаш",'url'=>"https://telegram.me/murojaatim_bot?start=$chat_id=2"]],
]
]) 
	      ]);
bot('sendMessage',[
	     'chat_id'=>$chat_id,
	       'message_id'=>$message_id,
	       'parse_mode'=>"Markdown",
	       'text'=>"*Юборилди...($kun - $soat)*\n\n*$tanlovsuz* \n*✅ Бўлим ёки кафедра номи*- $yul1 \n*✅ Бўлим ёки кафедра мудири исми* - $yul2 \n*✅ Телефон рақами* - $yul3 \n*✅ Мурожаат шакли техт* - $text",'reply_markup'=>$key, 
	      ]);
	}
restart($chat_id);
	qadam($chat_id,"bm");

/*	'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"жавоб ёзиш",'url'=>"https://telegram.me/shikoyattaklifbot?start=$chat_id=1"]],
[['text'=>"фойдаланувчини блоклаш",'url'=>"https://telegram.me/shikoyattaklifbot?start=$chat_id=2"]],
]
])*/
}

























//жавоб ёзиш va bloklash
if(mb_stripos($text,"/start")!==false and mb_stripos(trim($text)," ")!==false and $chat_id==$admin1 or mb_stripos($text,"/start")!==false and mb_stripos(trim($text)," ")!==false and $chat_id==$admin2){
$refid = explode(" ",$text);
$refid = $refid[1];
$refid = explode("=",$refid);
$fet = $refid[1];
$refid = $refid[0];

if($fet==1){
	  mysqli_query($db,"UPDATE `fishmark_log`.`full` SET `file_other`='$refid' WHERE `chat_id`='$chat_id'");
	bot('sendMessage',[ 
	     'chat_id'=>$chat_id,
	       'text'=>"Жавоб хабар матнини юборинг...",
         ]);
qadam($chat_id,"jx");
}elseif($fet==2){
	mysqli_query($db,"UPDATE `fishmark_log`.`full` SET `status`='0' WHERE `chat_id`='$refid'");

	bot('sendMessage',[ 
	     'chat_id'=>$chat_id,
	       'text'=>"#{$refid} блокланди...",
	                  'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"блокдан чиқариш",'url'=>"https://Telegram.me/murojaatim_bot?start=$chat_id=3"]],
]
])
]);
}
elseif($fet==3){
	mysqli_query($db,"UPDATE `fishmark_log`.`full` SET `status`='1' WHERE `chat_id`='$refid'");
	bot('sendMessage',[ 
	     'chat_id'=>$chat_id,
	       'text'=>"#{$refid} блокдан олинди...",
         ]);
}
}


if($text and $qadam=="jx" and $chat_id==$admin1 or $text and $qadam=="jx" and $chat_id==$admin2){

	bot('sendMessage',[
	     'chat_id'=>$file_other,
	       'text'=>"$text",
         ]);
	bot('sendMessage',[ 
	     'chat_id'=>$chat_id,
	       'text'=>"Хабар манзилига Юборилди",
         ]);
	qadam($chat_id,"bm");
}