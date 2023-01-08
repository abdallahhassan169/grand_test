<?php

namespace App\Http\Controllers;
use App\Models\Advertise;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Adverister;
use Response;
use Illuminate\Http\Request;

class Ads extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request['tag']){
            $tag=Tag::where('title', 'like', '%'.$request->tag.'%')->first();
            if($tag){
            $ads = $tag->ads;
            }
            else{
                $ads='No tag with this name';
            }

        }
        elseif($request['category']){
            $cat=Category::where('title', 'like', '%'.$request->category.'%')->first();
            if($cat){
            $ads=$cat->ads;}
            else{
                $ads='No category with this name';
            }

        }
        elseif($request['advertiser']){
            $adverister=Adverister::where('name', 'like', '%'.$request->advertiser.'%')->first();
            if($adverister){
                $ads=$adverister->ads;
            }
                else{
                    $ads='No adverister with this name';
                }
        }
        else{
            $ads=Advertise::paginate(15);
        }
        if($ads){
            $all_adds=array();
            foreach ($ads as $ad) {
                $record=['record:',[$ad,$ad->category,$ad->tags,$ad->adverister]];
                array_push($all_adds,$record);

            }
            return  response()->json([$all_adds , 'sucess', 200]);
        }
        else{
            return  response()->json(['No Data To Show']);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


