<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return response()->view('index');
    
});

Route::get('/index', function (Request $request) {
    // $dir = '/';
    // $recursive = false; // Get subdirectories also?
    // //$contentsGoogle = Storage::cloud()->listContents($dir, $recursive);
    // // $content = Storage::get('DD Dinosaur.mp4');

    // // Storage::cloud()->put('movie.mp4',$content);
    // dd(Storage::disk('extDisk')->allDirectories('./'));

    // //return $contents->where('type', '=', 'dir'); // directories
    // //return $contents->where('type', '=', 'file'); // files
    // //return view('welcome');

    $directory = './';
    if (isset($request->dir)) {
        $directory = "./$request->dir";
    }


    $local = Storage::disk('extDisk')->listContents($directory);
    $local = collect($local)->sortBy('type')->values()->all();

    return response()->json([
        "path" => $directory,
        "items" => $local
    ]);
});