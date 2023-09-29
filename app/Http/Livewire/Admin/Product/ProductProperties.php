<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use App\Models\Property;
use App\Models\PropertyGroup;
use Livewire\Component;

class ProductProperties extends Component
{
    public $product;
    public $property_group_id;
    public $title;

    protected $listeners = [
        'destroyProductPropertyGroup',
        'destroyProductProperty',
        'refreshComponent' => '$refresh'
    ];


    public function submit()
    {
        $exist = $this->product->whereHas('propertyGroups',function ($q){
            $q->where('property_group_id',$this->property_group_id)->where('product_id',$this->product->id);
        })->exists();
        if(!$exist){
            $this->product->propertyGroups()->attach($this->property_group_id);
        }

        Property::query()->create([
            'title'=>$this->title,
            'property_group_id'=>$this->property_group_id,
            'product_id'=>$this->product->id
        ]);

        $this->emit('refreshComponent');
    }


    public function deleteProductProperty($property_id, $property_group_id)
    {
        $this->dispatchBrowserEvent('deleteProductProperty',['property_id'=>$property_id , 'property_group_id'=>$property_group_id]);
    }

    public function destroyProductProperty($property_id,$property_group_id)
    {
        Property::destroy($property_id);
        $exist = Property::query()->where('property_group_id', $property_group_id)->where( 'product_id',$this->product->id)->first();
        if(!$exist){
            $this->product->propertyGroups()->detach($property_group_id);
        }
        $this->emit('refreshComponent');
    }

    public function deleteProductPropertyGroup($property_group_id)
    {
        $this->dispatchBrowserEvent('deleteProductPropertyGroup',['property_group_id'=>$property_group_id]);
    }

    public function destroyProductPropertyGroup($property_group_id)
    {
        $exist = $this->product->whereHas('propertyGroups',function ($q) use($property_group_id){
            $q->where('property_group_id',$property_group_id)->where('product_id',$this->product->id);
        })->exists();
        if($exist){
            $properties = Property::query()->where( 'property_group_id', $property_group_id)->where('product_id', $this->product->id)->get();
            foreach($properties as $property){
                $property->delete();
            }
            $this->product->propertyGroups()->detach($property_group_id);
        }
        $this->emit('refreshComponent');
    }

    public function render()
    {
        $property_groups = PropertyGroup::query()->where('category_id', $this->product->category->parentCategory->id)->get();
        $product_property_groups = collect($this->product->propertyGroups);
        return view('livewire.admin.product.product-properties', compact('property_groups','product_property_groups'));
    }
}
