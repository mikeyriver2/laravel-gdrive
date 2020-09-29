<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    $dir = '/';
    $recursive = false; // Get subdirectories also?
    //$contentsGoogle = Storage::cloud()->listContents($dir, $recursive);
    // $content = Storage::get('DD Dinosaur.mp4');

    // Storage::cloud()->put('movie.mp4',$content);
    dd(Storage::disk('extDisk')->allDirectories('./'));

    //return $contents->where('type', '=', 'dir'); // directories
    //return $contents->where('type', '=', 'file'); // files
    //return view('welcome');
});
