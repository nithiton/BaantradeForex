<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ads::withTrashed()->paginate(env('per_page'));
        return view('admin.ads.index',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['slug' => Str::slug($request->input('title'),'_')]);
        $validatedData = $request->validate([
            'title' => ['bail','required', 'unique:ads', 'max:255'],
            'slug' => ['bail','required', 'unique:ads', 'max:255'],
            'url' => ['bail','required','active_url', 'max:255'],
            'image' => ['bail','required','image','mimes:jpeg,png,jpg','max:2048']
        ]);

        $ad = new Ads();
        $ad->title = $validatedData['title'];
        $ad->slug = $validatedData['slug'];
        $ad->url = $validatedData['url'];
        $imageName = 'upload/images/ads/'.$ad->getNextId().'/image.'.$validatedData['image']->extension();
        $ad->image = $imageName;
        //check if move file image fail
        if(!$request->file('image')->move(public_path('upload/images/ads/'.$ad->getNextId().'/'), $imageName)){
            return redirect(route('admin.ads.create'))->with(['error' => 'move file failed.']);
        }
        if($ad->save()) {
            return redirect(route('admin.ads.index'))->with(['success' => 'create success.']);
        }else{
            return redirect(route('admin.ads.create'))->with(['error' => 'create failed.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Ads  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ads $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Ads  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ads $ad)
    {
        return view('admin.ads.edit',['ad'=>$ad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Ads  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ads $ad)
    {
        $request->merge(['slug' => Str::slug($request->input('title'),'_')]);
        $validatedData = $request->validate([
            'title' => ['bail','required', 'unique:ads,title,'.$ad->id, 'max:255'],
            'slug' => ['bail','required', 'unique:ads,slug,'.$ad->id, 'max:255'],
            'url' => ['bail','required','active_url', 'max:255'],
            'image' => ['sometimes','required','bail','image','mimes:jpeg,png,jpg','max:2048']
        ]);

        $ad->title = $validatedData['title'];
        $ad->slug = $validatedData['slug'];
        $ad->url = $validatedData['url'];
        if($request->has('image') && isset($validatedData['image'])){
            $imageName = 'upload/images/ads/'.$ad->id.'/image.'.$validatedData['image']->extension();
            $ad->image = $imageName;
            //check if move file image fail
            if(!$request->file('image')->move(public_path('upload/images/ads/'.$ad->id.'/'), $imageName)){
                return redirect(route('admin.ads.create'))->with(['error' => 'move file failed.']);
            }
        }
        if($ad->save()) {
            return redirect(route('admin.ads.edit',[$ad->slug]))->with(['success' => 'update success.']);
        }else{
            return redirect(route('admin.ads.edit',[$ad->slug]))->with(['error' => 'update failed.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Ads  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ads $ad)
    {
        if($ad->delete()) {
            return redirect(route('admin.ads.index'))->with(['success' => 'delete success.']);
        }else{
            return redirect(route('admin.ads.index'))->with(['error' => 'delete failed.']);
        }
    }

    /**
     * Restore the specified resource from trash.
     *
     * @param  Ads  $ad
     * @return \Illuminate\Http\Response
     */
    public function restore(Ads  $ad)
    {
        if($ad->restore()) {
            return redirect(route('admin.ads.index'))->with(['success' => 'restore success.']);
        }else{
            return redirect(route('admin.ads.index'))->with(['error' => 'restore failed.']);
        }
    }
}
