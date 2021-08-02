<?php

Use App\Folder;
use App\Http\Controllers\FolderController;
use Illuminate\Http\Request;


Route::group([
    'prefix' => 'auth'
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signUp');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
       
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');

        Route::get('folders', function() {
            return Folder::all();
        });
        
        Route::get('folders/{id}', function($id) {
            return Folder::find($id);
        });

        Route::get('foldersParent/{id}', function($id) {
            return Folder::where("parent","=",$id)->get();
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
        

    });
});