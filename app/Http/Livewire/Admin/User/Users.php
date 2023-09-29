<?php

namespace App\Http\Livewire\Admin\User;

use App\Enums\UserStatus;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public function chaneUserStatus($id)
    {
        $user = User::query()->find($id);
        if($user->status== UserStatus::Active->value){
            $user->update([
                'status'=>UserStatus::InActive->value
            ]);
        }elseif($user->status== UserStatus::InActive->value){
            $user->update([
                'status'=>UserStatus::Banned->value
            ]);
        }elseif($user->status== UserStatus::Banned->value){
            $user->update([
                'status'=>UserStatus::Active->value
            ]);
        }
    }

    public function render()
    {
        $users = User::query()->
        where('name','like','%'.$this->search.'%')->
        Orwhere('mobile','like','%'.$this->search.'%')->
        Orwhere('email','like','%'.$this->search.'%')->
        paginate(10);
        return view('livewire.admin.user.users', compact('users'));
    }
}
