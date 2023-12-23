<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Models\Favorite;
use Livewire\Component;

class Favorites extends Component
{

    public function deleteFavorite($product_id)
    {
       $fav =  Favorite::query()->where([
            'user_id'=>auth()->user()->id,
            'product_id'=>$product_id
        ])->first();
        $fav->delete();
    }
    public function render()
    {
        $favorites = Favorite::query()->where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.profile.favorites',compact('favorites'));
    }
}
