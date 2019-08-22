<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\GovernmentResource;

use App\Government;

class GovernmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return GovernmentResource::collection(auth()->user()->governments()->with('members','creator')->latest()->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
        ]);

        $input = $request->all();

        $government = auth()->user()->governments()->create($input);

        return new GovernmentResource($government);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new GovernmentResource(auth()->user()->governments()->with('members')->where('id',$id)->get());
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Government $government)
    {
        $request->validate([
            'name'=>'required|max:255',
        ]);

        $government->update($request->all());

        return new GovernmentResource($government);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Government $government)
    {
        $government->delete();

        return response(['message'=>'Deleted!']);
    }
}
