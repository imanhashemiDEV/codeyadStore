<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        //phpinfo();
        //extension=php_imagick.dll
//        $permissions = $user->getPermissionsViaRoles();
//        dd($permissions);
        return view('admin.index');
    }

}
