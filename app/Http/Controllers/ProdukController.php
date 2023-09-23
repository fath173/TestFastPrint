<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use App\Models\status;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $status = status::all();
        $kategori = kategori::all();
        $idstatus = 0;
        foreach ($status as $s) {
            if ($s->nama_status == 'bisa dijual') { // cek nama status "bisa dijual"
                $idstatus = $s->id_status; // simpan id dari nama status "bisa dijual"
            }
        }
        $produk = produk::where('status_id', $idstatus)->orderBy('created_at', 'DESC')->get();
        // $produk = produk::orderBy('created_at', 'DESC')->get();

        return view('produk.produk', compact('produk', 'kategori', 'status'));
    }

    public function create()
    {
        $status = status::all();
        $kategori = kategori::all();
        return view('produk.tambah', compact('status', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga_produk' => 'required|numeric',
            'kategori_produk' => 'required',
            'status_produk' => 'required',
        ]);

        produk::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga_produk,
            'kategori_id' => $request->kategori_produk,
            'status_id' => $request->status_produk,
        ]);

        return redirect()->route('produk');
    }

    public function edit(string $id)
    {
        $status = status::all();
        $kategori = kategori::all();
        $produk = produk::where('id_produk', $id)->get()[0];

        return view('produk.edit', compact('status', 'kategori', 'produk'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga_produk' => 'required|numeric',
            'kategori_produk' => 'required',
            'status_produk' => 'required',
        ]);

        $produk = produk::where('id_produk', $id);
        $produk->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga_produk,
            'kategori_id' => $request->kategori_produk,
            'status_id' => $request->status_produk,
        ]);

        return redirect()->route('produk');
    }

    public function destroy(string $id)
    {
        $produk = produk::where('id_produk', $id);
        $produk->delete();

        return redirect()->route('produk');
    }
}
