<?php

Use App\Folder;
use App\Http\Controllers\FolderController;
use Illuminate\Http\Request;

Route::get('folders', function() {
    return Folder::all();
});

Route::get('folders/{id}', function($id) {
    return Folder::find($id);
});

Route::post('folders', function(Request $request) {
    $data = $request->all();
    $folder = new FolderController;
    $path = $folder->url($data['parent'],$data['name']);

    File::makeDirectory($path, $mode = 0777, true, true);
    return Folder::create([
        'name' => $data['name'],
        'parent' => $data['parent'],
    ]);   
});

Route::put('folders/{id}', function(Request $request, $id) {
    $folder = Folder::findOrFail($id);
    $folder->update($request->all());
    return $folder;
});

Route::delete('folders/{id}', function($id) {
    Folder::find($id)->delete();
    return 204;
});