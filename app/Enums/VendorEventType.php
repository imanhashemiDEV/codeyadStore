<?php

namespace App\Enums;
enum VendorEventType:string{
    case Enter ='enter';
    case Exit ='exit';
    case Reject ='reject';
}
