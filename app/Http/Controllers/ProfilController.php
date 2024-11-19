<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $user = Auth::user();
        $data = [
            'user' => $user,
        ];
        return view('/profil')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user = Auth::user();
        if ($request->has('sertifikat')) {
            $file=$request->file('sertifikat');
            $direktori=public_path().'/storage/sertifikat/';          
            $nama_file=str_replace(' ','-',$request->sertifikat->getClientOriginalName());
            $file_format= $request->sertifikat->getClientOriginalExtension();
            $uploadSuccess = $request->sertifikat->move($direktori,$nama_file);
        }

        $user->update($request->all());
        $user->update([
            'file_name' => $nama_file,
            'file_path' => '/storage/sertifikat',
        ]);
        return redirect()->route('profil.index')->withMessage('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
