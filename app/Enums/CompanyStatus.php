<?php

namespace App\Enums;
enum CompanyStatus:string{

    case Request ='request';

    case Active ='active';
    case Banned ='banned';
}
