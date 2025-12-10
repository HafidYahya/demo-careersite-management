<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        $home = Home::select(
            'section_name',
            DB::raw('MIN(created_at) as created_at'),
            DB::raw('MAX(updated_at) as updated_at')
            )->groupBy('section_name')->get();
            return view('careersite.home.index', compact('home'));
        }

    public function detail($section){
        $subSections = Home::where('section_name', $section)->get();
        return view('careersite.home.detail', compact('subSections', 'section'));
    }
    public function edit($id)
    {
        // Ambil data berdasarkan ID
        $item = Home::findOrFail($id);
        
        return view('careersite.home.edit', compact('item'));
    }
    
    // Proses update data
public function update(Request $request, $id)
{
    $item = Home::findOrFail($id);

    /**
     * ===============================
     * VALIDASI BERDASARKAN DATA TYPE
     * ===============================
     */
    if ($item->data_type === 'img') {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    }

    if ($item->data_type === 'text') {
        $request->validate([
            'text' => 'required|string',
        ]);
    }

    if ($item->data_type === 'url') {
        $request->validate([
            'url' => 'required|url',
        ]);
    }

    /**
     * ===============================
     * HANDLE IMAGE
     * ===============================
     */
    if ($item->data_type === 'img' && $request->hasFile('image')) {

        if ($item->image && File::exists(public_path('storage/' . $item->image))) {
            File::delete(public_path('storage/' . $item->image));
        }

        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('storage'), $imageName);

        $item->image = $imageName;
    }

    /**
     * ===============================
     * HANDLE TEXT
     * ===============================
     */
    if ($item->data_type === 'text') {
        $item->text = $request->text;
    }

    /**
     * ===============================
     * HANDLE URL
     * ===============================
     */
    if ($item->data_type === 'url') {
        $item->url = $request->url;
    }

    /**
     * ===============================
     * META
     * ===============================
     */
    $item->save();

    return redirect()->route('detail', $item->section_name)->with('success', 'Data berhasil diupdate!');
}


}