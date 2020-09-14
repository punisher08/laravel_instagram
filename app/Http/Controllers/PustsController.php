<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Resources\PostCollection;
use App\Pust;

class PustsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        //
        return view('vueApp');
    }
    public function index()
    {
        //
        $pusts = Pust::all()->toArray();

        return array_reverse($pusts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        $pust = new Pust([
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);
        $pust->save();
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
        $pust = Pust::find($id);
        $pust->update($request->all());
 
        return response()->json('The post successfully updated');
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
    public function delete($id)
    {
        //
        $pust = Pust::find($id);
        $pust->delete();
 
        return response()->json('The post successfully deleted');
    }
}
