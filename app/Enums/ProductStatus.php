<?php

namespace App\Enums;
enum ProductStatus:string{
    case Waiting ='waiting';
    case Verified ='verified';
    case StopProduction ='stop_production';

    case Rejected ='rejected';
}
