? php 

// token maydoni
define ( 'bot_token' , '993240170: AAFv8CY8rqY8J6OStJPpF8E7yLq37HolJsE' );

     XabarYubor funktsiyasi ( massiv  $ tarkib )
    {
        return  endpoint ( 'sendMessage' , $ tarkib );
    }

    funktsiya  buildKeyBoard ( array  $ imkoniyatlari , $ martalik = false , $ o'lchamlarini = rost , $ tanlab = rost )
    {
        $ answerMarkup = [
            'keyboard'           => $ variantlari ,
            "one_time_keyboard ' => $ martalik ,
            'resize_keyboard'    => $ hajmini o'zgartirish ,
            'selektiv'          => $ tanlangan ,
        ];
        $ encodedMarkup = json_encode ( $ javobMarkup , to'g'ri );
        qaytish  $ encodedMarkup ;
    }

    funktsiya  oxirgi nuqtasi ( $ API , array  $ kontent , $ post = rost )
    {
        $ url = 'https://api.telegram.org/bot' .bot_token. '/' . $ api ;
        agar ( $ post ) {
            $ Javob = sendAPIRequest ( $ url , $ kontent );
        } else {
            $ javob = sendAPIRequest ( $ url , [], noto'g'ri );
        }
         json_decode-ni qaytarish ( $ javob , to'g'ri );
    }

     sendAPIRequest funktsiyasi ( $ url , $ tarkib qatori  , $ post = true )
    {
        if ( isset ( $ content [ 'chat_id' ]))) {
            $ url = $ url . '? chat_id =' . $ tarkib [ 'chat_id' ];

            // $ url = $ url. '?' http_build_query ($ tarkib);

            o'chirilmagan ( $ content [ 'chat_id' ]);
            // sozlanmagan ($ tarkib);
        }
        $ ch = curl_init ();
        curl_setopt ( $ ch , CURLOPT_URL , $ url );
        curl_setopt ( $ ch , CURLOPT_HEADER , yolg'on );
        curl_setopt ( $ ch , CURLOPT_RETURNTRANSFER , 1 );
        agar ( $ post ) {
            curl_setopt ( $ ch , CURLOPT_POST , 1 );
            curl_setopt ( $ ch , CURLOPT_POSTFIELDS , $ tarkib );
        }
        curl_setopt ( $ ch , CURLOPT_SSL_VERIFYPEER , yolg'on );
        $ natija = curl_exec ( $ ch );
        agar ( $ natija === noto'g'ri ) {
            $ result = json_encode ([ 'ok' => noto'g'ri , 'curl_error_code' => curl_errno ( $ ch ), 'curl_error' => curl_error ( $ ch )]);
        }
        curl_close ( $ ch );
         $ natijasini qaytarish ;
    }


// uzizni ID raqamini kiritasiz
$ admin = "737938387" ;

// BOT iz foydalanuvchi nomi
$ bot_name = "@pagodauzrobot" ;


$ efede = json_decode ( file_get_contents ( 'php: // input' ), true );

//Asosiy
$ text = $ efede [ "xabar" ] [ "matn" ];
$ photo = $ efede [ "xabar" ] [ "fotosurat" ];
$ sana = $ efede [ "xabar" ] [ "sana" ];
$ chat_id = $ efede [ "xabar" ] [ "chat" ] [ "id" ];

// suhbat
$ cfname = $ efede [ 'message' ] [ 'chat' ] [ 'first_name' ];
$ To'sish = $ efede [ "Xabar" ] [ "suhbat" ] [ "id" ];
$ clast_name = $ efede [ 'message' ] [ 'chat' ] [ 'last_name' ];
$ turi = $ efede [ "xabar" ] [ "chat" ] [ "turi" ];

// foydalanuvchi haqida ma'lumot
$ ufname = $ efede [ 'message' ] [ 'from' ] [ 'first_name' ];
$ Uname = $ efede [ Xabar ] [ "dan" ] [ "last_name ' ];
$ ulogin = $ efede [ 'message' ] [ 'from' ] [ 'username' ];
$ uid = $ efede [ 'message' ] [ 'from' ] [ 'id' ];
$ user_id = $ efede [ 'message' ] [ 'from' ] [ 'id' ];

// javob ma'lumot
$ sreply = $ efede [ 'message' ] [ 'answer_to_message' ] [ 'text' ];


    // umumiy menyu
    $ menyu = [[ "salom" ], [ 'Men haqimda' ]];

    if ( $ text == '/ start' ) {

        $ content = [ 'chat_id' => $ chat_id , 'text' => "Assalomu alaykum $ ufname $ noma'lum." , 'parse_mode' => 'markirovka ' ];
        xabarYubor ( $ tarkib );
    }

    if ( $ text == 'salom' ) {

        $ content = [ 'chat_id' => $ chat_id , 'text' => "Sizga ham salom" , 'parse_mode' => 'markdown' ];
        xabarYubor ( $ tarkib );
    }

    if ( $ text == 'Men haqimda' ) {

        $ content = [ 'chat_id' => $ chat_id , 'text' => "Men @xvest kanali uchun tayyorlandim" , 'parse_mode' => 'markdown' ];
        xabarYubor ( $ tarkib );
    }
