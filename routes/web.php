<?php

use Barryvdh\Snappy\Facades\SnappyPdf;
use Barryvdh\Snappy\IlluminateSnappyPdf;
use Barryvdh\Snappy\PdfWrapper;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
    $invoiceData=$body->all();
    Log::info($invoiceData);
    $jsonProductsArray=json_decode($body->all()['jsonproducts']);
    Log::info($jsonProductsArray);
  //  Storage::disk('local')->put('example.txt', 'Contents');
    $pdf=SnappyPdf::loadView('PdfDoc',array('invoiceData'=>$invoiceData,'jsonProductsArray'=>$jsonProductsArray));
    $randomPdfFileName=Str::random(12).'.pdf';
    Storage::disk('public')->put($randomPdfFileName,$pdf->download()->getOriginalContent());
    $url=Storage::disk('public')->url($randomPdfFileName);
    Log::info($url);
    return response()->redirectTo($url);
})->name('post-form');
