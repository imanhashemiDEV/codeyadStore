<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Helpers\ImageManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_name',
        'email',
        'password',
        'mobile',
        'phone',
        'image',
        'is_admin',
        'whatsapp',
        'telegram',
        'instagram',
        'eita',
        'status',
        'mobile_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function productGuaranties()
    {
        return $this->hasMany(ProductGuaranty::class);
    }

    public function userInfos()
    {
        return $this->hasOne(UserInfo::class);
    }

    public function seller()
    {
        return $this->hasOne(Seller::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

     // @imo_developer
    public static function createUser($request)
    {
        User::query()->create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'mobile'=>$request->input('mobile'),
            'password'=> Hash::make($request->input('password')) ,
            'image'=>ImageManager::saveImage('users',$request->image),
        ]);
    }

    public static function updateUser($request, $user)
    {
        $user->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'mobile'=>$request->input('mobile'),
            'password'=>$request->input('password') ? Hash::make($request->input('password')) : $user->password,
            'image'=> $request->image ? ImageManager::saveImage('users',$request->image) : $user->image,
        ]);
    }
}
