<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Http\Request;

class AdvertiserAdvertisementsController extends Controller
{
    public function getAdvertiserAdvertisements($id)
    {
        $tags = request()->has('tags')
        ? explode(',',request('tags'))
        : null;

        $category = request()->has('category')
        ? Category::where('category_name', request('category'))->first()
        : null;

     $advertisements = Advertisement::with(['advertiser','category'])
     ->where('advertiser', $id)
     ->when($category, function ($query) use ($category) {
            return $query->where('category', $category->id);
        })
    ->when($tags, function ($query) use ($tags) {
            return $query->whereJsonContains("tags",$tags);
        })
    ->get();

        return response()->json($advertisements);

    }
}
