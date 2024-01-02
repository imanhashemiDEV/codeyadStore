<?php

namespace App\Http\Livewire\Admin\Tag;

use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class Tags extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'destroyTag',
        'refreshComponent' => '$refresh'
    ];

    public function deleteTag($id)
    {
        $this->dispatchBrowserEvent('deleteTag',['id'=>$id]);
    }

    public function destroyTag($id)
    {
        Tag::destroy($id);
        $this->emit('refreshComponent');
    }
    public function render()
    {
        $tags = Tag::query()->
        where('title','like','%'.$this->search.'%')->
        paginate(10);
        return view('livewire.admin.tag.tags', compact('tags'));
    }
}
