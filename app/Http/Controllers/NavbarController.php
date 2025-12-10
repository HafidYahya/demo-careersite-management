<?php

namespace App\Http\Controllers;

use App\Models\Navbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NavbarController extends Controller
{
    public function index(){
        $navbar=Navbar::all();
        return view('careersite.navbar.index', compact('navbar'));
    }

    public function edit($id)
    {
        // Ambil data berdasarkan ID
        $item = Navbar::findOrFail($id);
        
        return view('careersite.navbar.edit', compact('item'));
    }
    
    // Proses update data
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // max 2MB
        ]);
        
        // Cari data
        $item = Navbar::findOrFail($id);
        
        // Jika ada upload image baru
        if ($request->hasFile('image')) {
            // Hapus image lama jika ada
            if ($item->image && File::exists(public_path('storage/' . $item->image))) {
                File::delete(public_path('storage/' . $item->image));
            }
            
            // Upload image baru
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('storage'), $imageName);
            
            // Update kolom image
            $item->image = $imageName;
        }
        
        // Update data lainnya jika ada
        $item->save();
        
        // Redirect dengan pesan sukses
        return redirect()->route('navbar.index')->with('success', 'Data berhasil diupdate!');
    }
}