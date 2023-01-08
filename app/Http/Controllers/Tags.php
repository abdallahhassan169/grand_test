<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Tags extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags=Tag::paginate(20);
        if($tags){
           return response()->json([$tags, 'success' ]);
        }
        else{
            return response()->json([ 'No data to show' ]);
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
        $validator = Validator::make($request->all(),  [
            'title' => 'required',
        ]);

       if($validator->fails()){
        $errors=$validator->errors();
        return response()->json(['failed',$errors]);
       }
       else{
        $tag=Tag::create($request->all());
        return response()->json(['success', 'created succefully']);
       }
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
        $tag=Tag::findOrFail($id);
        if($tag){
            $tag->update($request->all());
            return response()->json(['success', 'updated successfully']);
        }
        else{
            return response()->json(['failed', 'something went wrong']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag=Tag::findOrFail($id);
        if($tag){
            $tag->delete();
            return response()->json(['success', 'deleted successfully']);
        }
        else{
            return response()->json(['failed', 'something went wrong']);
        }
    }
}
