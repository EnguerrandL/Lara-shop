<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoicePdfController extends Controller
{
    

    public function makeInvoicePdf(Order $order){

     

   $data = [
        'title' => 'Mon document PDF',
        'content' => 'Contenu du document PDF.',
        'order' => $order,
    ];

    $pdf = PDF::loadView('invoice.pdf', $data);

         return $pdf->stream();




    }



}
