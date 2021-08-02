<?php

namespace App\Http\Controllers;

Use App\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function index()
    {
        return Folder::all();
    }

    public function show(Folder $folder)
    {
        return $folder;
    }

    public function store(Request $request)
    {
       // $folder = Folder::create($request->all());
        //return response()->json($folder, 201);
        $folder = Folder::save();
        return response()->json($folder, 201);
    }

    public function update(Request $request, $id)
    {
        $folder = Folder::findOrFail($id);
        $folder->update($request->all());

        return $folder;
    
    }

    public function delete(Folder $folder)
    {
        $folder->delete();

        return response()->json(null, 204);
    }

    public function url($id_parent,$name){
        $path = "";
        if($id_parent == 0){
            $path = $name;
        } else {
            $data = Folder::select('*')->where('id','=',$id_parent)->first(); 
            if($data){
                if($data->parent != 0){
                    $parent = $this->url($data->parent);
                    $path = $parent."/".$data->name;
                } else {
                    $path = $data->name."/".$name;
                }
            }else{
                 $path = $name;
            }      
        }

        return public_path()."/folders/".$path;
    }
}
