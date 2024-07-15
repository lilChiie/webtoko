<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ListProdukController extends Controller
{
    public function show()
    {
        $data = Produk::get();
        $nama = [];
        $desc = [];
        $harga = [];
        $id = []; // Menyimpan ID produk

        foreach ($data as $produk) {
            $nama[] = $produk->nama;
            $desc[] = $produk->deskripsi;
            $harga[] = $produk->harga;
            $id[] = $produk->id; // Menyimpan ID produk
        }

        return response()->json('list_produk', compact('nama', 'desc', 'harga', 'id'));
    }


    public function simpan(request $request)
    {
        $produk = new produk;
        $produk->nama = $request->input('nama');
        $produk->deskripsi = $request->input('deskripsi');
        $produk->harga = $request->input('harga');
        $produk->save();

        return redirect()->back()->with('success', 'Data Berhasil Disimpan!');
    }

    public function delete($id)
    {
        $produk = Produk::where('id', $id)->first();

        if ($produk) {
            $produk->delete();
            return redirect()->back()->with('success', 'Produk berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }
    }
}
