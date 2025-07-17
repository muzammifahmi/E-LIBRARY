<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggotas = Anggota::all();
        return view('anggota.index', compact('anggotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $positions = ['Pembina', 'Ketua', 'Wakil Ketua', 'Sekretaris', 'Bendahara', 'Anggota'];
        return view('anggota.create', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'year_joined' => 'required|digits:4|integer',
            'position' => 'required|in:Pembina,Ketua,Wakil Ketua,Sekretaris,Bendahara,Anggota',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')){
            $data['image'] = $request ->file('image')->store('anggota', 'public');
        }

        Anggota::create($data);

        return redirect()->route('anggota.index')->with('success', 'Anggota created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggota)
    {
        $positions = ['Pembina', 'Ketua', 'Wakil Ketua', 'Sekretaris', 'Bendahara', 'Anggota'];
        return view('anggota.edit', compact('anggota', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anggota $anggota)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'year_joined' => 'required|digits:4|integer',
            'position' => 'required|in:Pembina,Ketua,Wakil Ketua,Sekretaris,Bendahara,Anggota',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->hasFile('image')){
            if($anggota->image){
                Storage::disk('public')->delete($anggota->image);
            }
            $data['image'] = $request->file('image')->store('anggota', 'public');
        }

        $anggota->update($data);
        return redirect()->route('anggota.index')->with('success', 'Anggota updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggota)
    {
        if($anggota->image){
            Storage::disk('public')->delete($anggota->image);
        }
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Anggota deleted successfully.');
    }
}
