<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Pesanan::all();
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
        $table = Pesanan::create([
            "username" => $request->username,
            "email" => $request->email,
            "nama_kamar" => $request->nama_kamar,
            "harga" => $request->harga,
            "jumlah_pesan" => $request->jumlah_pesan,
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
        $table = Pesanan::find($id);
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
        $table = Pesanan::find($id);
        if($table){
            $table->username = $request->username ? $request->username : $table->username;
            $table->email = $request->email ? $request->email : $table->email;
            $table->nama_kamar = $request->nama_kamar ? $request->nama_kamar : $table->nama_kamar;
            $table->harga = $request->harga ? $request->harga : $table->harga;
            $table->jumlah_pesan = $request->jumlah_pesan ? $request->jumlah_pesan : $table->jumlah_pesan;
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
        $table = Pesanan::find($id);
        if($table){
            $table->delete();
            return ["message" => "Delete success"];
        }else{
            return ["message" => "Data not found"];
        }
    }

}