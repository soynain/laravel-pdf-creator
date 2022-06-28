<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
    return view('Form-Inputs-For-Pdf');
});

Route::post('/generate-pdf',function(Request $body){
    Log::info($body->all());
    Log::info(json_decode($body->all()['jsonproducts']));
    return response()->json(['yeison'=>'jaja']);
})->name('post-form');
