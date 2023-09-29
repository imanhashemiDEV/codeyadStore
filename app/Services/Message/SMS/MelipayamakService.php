<?php

namespace App\Services\Message\SMS;

use Melipayamak;

class MelipayamakService
{

    public function sendSimpleSMS($receiver,$content)
    {
        try{
            $sms = Melipayamak::sms();
            $to = $receiver;
            $from = '50004001014556';
            $text = $content;
            $response = $sms->send($to,$from,$text);
            $json = json_decode($response);
            $json->Value; //RecId or Error Number
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }

}
