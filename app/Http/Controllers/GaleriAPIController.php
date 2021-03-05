<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;
class GaleriAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri=Galeri::all();

        return  $galeri;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();

        return $input;

        $galeri=Galeri::create($input);

        return $galeri;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galeria=Galeri::find($id);

        return $galeri;
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
        $input=$request->all(); 

        return $input;

        $galeri=Galeri::find($id);

        if(empty($galeri)){
            return response()->json(['message'=>'data tidak di temukan'], 404);
        }
        $galeri->update($input);
        
        return response()->json($galeri);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeri=Galeri::find($id);

        if(empty($galeri)){
            return response()->json(['message'=>'data tidak di temukan'], 404);
        }
        $galeri->delete();
        return response()->json(['message'=>'data telah di hapus']);
    }
}
