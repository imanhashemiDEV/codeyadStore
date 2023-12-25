<?php

namespace App\Http\Livewire\Admin\Permission;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Permissions extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'destroyPermission',
        'refreshPermission' => '$refresh'
    ];

    public function deletePermission($id)
    {
        $this->dispatchBrowserEvent('deletePermission',['id'=>$id]);
    }

    public function destroyPermission($id)
    {
        Permission::destroy($id);
        $this->emit('refreshPermission');
    }
    public function render()
    {
        $permissions = Permission::query()->
        where('name','like','%'.$this->search.'%')->
        paginate(10);
        return view('livewire.admin.permission.permissions', compact('permissions'));
    }

}
