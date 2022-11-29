<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar ;
class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Kamar::all();
        // return $data;
        return response()->json([
            "message" => "Load data success",
            "data" => $table
        ], 200);
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
        $table = Kamar::create([
            "nama_kamar" => $request->nama_kamar,
            "deskripsi" => $request->deskripsi,
            "fasilitas" => $request->fasilitas,
            "jumlah" => $request->jumlah,
        ]);
        // return $table;
        return response()->json([
            "message" => "Store success",
            "data" => $table
        ], 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Kamar::find($id);
        if ($table){
            return $table;
        }else{
            return ["message" => "Data Not Found"];
        }
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
        $table = Kamar::find($id);
        if($table){
            $table->nama_kamar = $request->nama_kamar ? $request->nama_kamar : $table->nama_kamar;
            $table->deskripsi = $request->deskripsi ? $request->deskripsi : $table->deskripsi;
            $table->fasilitas = $request->fasilitas ? $request->fasilitas : $table->fasilitas;
            $table->jumlah = $request->jumlah ? $request->jumlah : $table->jumlah;
            $table->save();

            return $table;
        }else{
            return ["message" => "Data not found"];
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
        $table = Kamar::find($id);
        if($table){
            $table->delete();
            return ["message" => "Delete success"];
        }else{
            return ["message" => "Data not found"];
        }
    }

}