<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Barryvdh\Snappy\Facades\SnappyPdf;

class PdfGenerateController extends Controller
{
    public function GeneratePdf(Request $body){
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
    }
}
