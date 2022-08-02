<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Requests\AdvertisementRequest;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisements = Advertisement::with(['advertiser','category'])->get();
        return response()->json($advertisements);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return response()->json(['tags'=>$tags,'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\AdvertisementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertisementRequest $request)
    {
        $data = $request->validated();
     $data['tags'] =json_encode((request('tags')));
        Advertisement::create($data);
        return response()->json(['success'=>'You added the advertisement successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advertisement = Advertisement::with(['category','advertiser'])->findOrFail($id);

        return response()->json($advertisement);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $advertisement = Advertisement::findOrFail($id);
        $advertisement['tags']=json_decode($advertisement['tags']);

        return response()->json([
           'advertisement' => $advertisement,
           'tags'=>$tags,
           'categories'=>$categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\AdvertisementRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertisementRequest $request, $id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $data = $request->validated();
        $data['tags'] = json_encode($data['tags']);
        $advertisement->update($data);
        return response()->json(['success'=>'You updated the advertisement successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->delete();
        return response()->json(['success'=>'You deleted the advertisement successfully']);
    }
}
