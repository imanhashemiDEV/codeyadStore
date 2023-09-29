<?php

namespace App\Enums;
enum CommentStatus:string{
    case Draft ='draft';
    case Approved ='approved';
    case Rejected ='rejected';
}
