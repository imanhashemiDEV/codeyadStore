<?php

namespace App\Enums;
enum VendorEventType:string{
    case Enter ='enter';
    case Exit ='exit';
    case Reject ='reject';
    case AddToVendor ='add_to_vendor';
    case RemoveFromVendor ='remove_from_vendor';
}
