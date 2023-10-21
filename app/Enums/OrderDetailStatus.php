<?php

namespace App\Enums;
enum OrderDetailStatus:string{

    case Waiting ='waiting';
    case Processing ='processing';
    case Received ='received';
    case Rejected ='rejected';
}
