<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Exports\BukuExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $buku = buku::join('Jenis_Buku', 'buku.id', '=', 'Jenis_Buku.id')->get();
        return view('buku0235', ['buku'=> $buku]);
    }
    /**
     * buat excel
     */
    public function export(){
        return Excel::download(new BukuExport, 'Data_1461900235.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('bukutambah0235');
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
        buku::create([
            'id' => $request->id,
            'judul' => $request->judul,
            'tahun_terbit' => $request->tahun_terbit,
        ]);
        return redirect('buku0235');
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
        $buku = buku::find($id);
        return view('bukuedit0235', ['buku0235' => $buku]);
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
        $buku = buku::find($id);
        $buku->id = $request->id;
        $buku->judul = $request->judul;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->save();

        return redirect('buku0235');
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
        $buku = buku::find($id);
        $buku->delete();

        return redirect ('buku0235');
    }
}
