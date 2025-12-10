<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FooterController extends Controller
{
    public function index(){
        $footer=Footer::all();
        return view('careersite.footer.index', compact('footer'));
    }

    public function edit($id)
    {
        // Ambil data berdasarkan ID
        $item = Footer::findOrFail($id);
        
        return view('careersite.footer.edit', compact('item'));
    }
    
    // Proses update data
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'url' => 'nullable', // max 2MB
        ]);
        
        // Cari data
        $item = Footer::findOrFail($id);


        $item->url = $request->url;
        
        // Update data lainnya jika ada
        $item->save();
        
        // Redirect dengan pesan sukses
        return redirect()->route('footer.index')->with('success', 'Data berhasil diupdate!');
    }
}