<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $user = Auth::user();
        $data = [
            'user' => $user,
        ];
        return view('projects.index')->with($data);
    }
    public function create() {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
        
        Project::create([
            'nama_projek' => $request->nama_projek,
            'deskripsi_projek' => $request->deskripsi_projek,
            'tujuan_projek' => $request->tujuan_projek,
            'tanggal_dimulai' => $request->tanggal_dimulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'hasil_projek' => $request->hasil_projek,
            'user_id' => $user->id,
            'file_name' => $nama_file,
            'file_path' => '/storage/sertifikat'
        ]);

        return redirect()->route('project.index')->withMessage('Project baru berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $project = Project::where('id', $id)->first();
        $data = [
            'project' => $project,
        ];

        return view('projects.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $project = Project::where('id', $id)->first();
        $data = [
            'project' => $project,
        ];
        return view('projects.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $project = Project::where('id', $id)->first();
        if($request->has('sertifikat')){
            $file=$request->file('sertifikat');
            $direktori=public_path().'/storage/sertifikat/';          
            $nama_file=str_replace(' ','-',$request->sertifikat->getClientOriginalName());
            $file_format= $request->sertifikat->getClientOriginalExtension();
            $uploadSuccess = $request->sertifikat->move($direktori,$nama_file);
            File::delete($direktori.$project->file_name); 
            $project->update([
                'file_name' => $nama_file,
            ]); 
        }
        $project->update($request->all());

        return redirect()->route('project.index')->withMessage('Project berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $project = Project::where('id', $id)->first();
        $project->delete();
        return redirect()->back()->withMessage('Project berhasil dihapus');
    }
}
