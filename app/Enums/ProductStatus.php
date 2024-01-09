<?php

namespace App\Enums;
enum ProductStatus:string{
    case Waiting ='waiting';
    case Available ='available';
    case UnAvailable ='unavailable';
    case StopProduction ='stop_production';

    case Rejected ='rejected';
}
