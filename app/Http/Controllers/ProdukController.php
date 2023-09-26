<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use App\Models\status;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

        date_default_timezone_set('Asia/Jakarta');
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

        date_default_timezone_set('Asia/Jakarta');
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

    public function getProdukJson()
    {
        $url = 'https://recruitment.fastprint.co.id/tes/api_tes_programmer';

        date_default_timezone_set('Asia/Jakarta');
        $jam = date("H") + 1;
        $data = [
            'username' => 'tesprogrammer' . date("dmy") . 'C' . $jam,
            'password' => md5('bisacoding-' . date("d-m-y")),
        ];

        $response = Http::asForm()->post($url, $data)->json();
        if ($response['error'] == 0) {
            produk::truncate();
            foreach ($response['data'] as $r) {
                $kategori = kategori::where('nama_kategori', $r['kategori'])->get();
                // dd($kategori);
                $status = status::where('nama_status', $r['status'])->get();

                produk::create([
                    'id_produk' => $r['id_produk'],
                    'nama_produk' => $r['nama_produk'],
                    'harga' => $r['harga'],
                    'kategori_id' => $kategori[0]['id_kategori'],
                    'status_id' => $status[0]['id_status'],
                ]);
            }
            return redirect()->route('produk')->with('success', 'Data dari API Telah di Simpan pada Database');
        } else {
            return redirect()->route('produk')->with('error', $response);
        }
    }
}
