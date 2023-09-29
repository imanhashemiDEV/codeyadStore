<?php

namespace App\Services\Message\SMS;

use App\Services\Message\MessageInterface;

class SMSService implements MessageInterface
{
    private $reciever;
    private $content;


    public function getReciever()
    {
        return $this->reciever;
    }

    public function setReciever($reciever): void
    {
        $this->reciever = $reciever;
    }

    public function getContent()
    {
        return $this->content;
    }


    public function setContent($content): void
    {
        $this->content = $content;
    }


    public function sendMessage()
    {
       $melipayamak = new MelipayamakService();
       $melipayamak->sendSimpleSMS($this->reciever, $this->content);
    }
}
