<?php

namespace App\Enums;
enum OrderDetailStatus:string{

    case Waiting ='waiting';
    case Received ='received';
    case Rejected ='rejected';
}
