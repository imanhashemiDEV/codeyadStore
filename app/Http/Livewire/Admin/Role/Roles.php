<?php

namespace App\Http\Livewire\Admin\Role;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Roles extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'destroyRole',
        'refreshComponent' => '$refresh'
    ];

    public function deleteRole($id)
    {
        $this->dispatchBrowserEvent('deleteRole',['id'=>$id]);
    }

    public function destroyRole($id)
    {
        Role::destroy($id);
        $this->emit('refreshComponent');
    }
    public function render()
    {
        $roles = Role::query()->
        where('name','like','%'.$this->search.'%')->
        paginate(10);
        return view('livewire.admin.role.roles', compact('roles'));
    }
}
