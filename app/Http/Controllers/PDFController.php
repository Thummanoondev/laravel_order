<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\FR_MK_02;
use Illuminate\Support\Facades\Storage;
 

class PDFController extends Controller
{
  
  function sticker($index){

    $sticker = FR_MK_02::query()
    ->where('id', $index)
    ->first();
    if (!$sticker) {
      return abort(404, 'Sticker not found');
  }
$pdf = Pdf::loadView('pdf.sticker',['sticker' => $sticker]);
$pdf->set_option('isHtml5ParserEnabled', true);
$pdf->set_option('isRemoteEnabled', true);
return $pdf->stream();

  }


  public function pdf_doc05($index){
    $date = str_replace('-', '/', $index);
    $doc05 = FR_MK_02::query()
    ->where('stm',$date)
    ->where('mk05', '1')
    ->get();
    $pdf = Pdf::loadView('pdf.doc05_pdf',['doc05' => $doc05]);
    $pdf->set_option('isHtml5ParserEnabled', true);
    $pdf->set_option('isRemoteEnabled', true);
    return $pdf->setPaper('a5', 'landscape')->stream();
    //return view('pdf.doc05_pdf');

  }
    public function pdf_doc02($index){
        $doc02 = FR_MK_02::query()
        ->where('id', $index)
        ->first();
        if (!$doc02) {
          return abort(404, 'Sticker not found');
      }
    $pdf = Pdf::loadView('pdf.doc02_pdf',['doc02' => $doc02]);
    $pdf->set_option('isHtml5ParserEnabled', true);
    $pdf->set_option('isRemoteEnabled', true);
    return $pdf->setPaper('a5', 'landscape')->stream();

//return view('pdf.doc02_pdf', compact('doc02'));
    }

    public function pdf_doc01($index){    

      $date = str_replace('-', '/', $index);

      $doc01 = FR_MK_02::query()->where('stm', $date)->get();
      $pdf = Pdf::loadView('pdf.doc01_pdf',['doc01' => $doc01]);;
      $pdf->set_option('isHtml5ParserEnabled', true);
      return $pdf->setPaper('A4', 'landscape')->stream('invoice.pdf');

    return view('pdf.doc01_pdf');

  }
  
  
}