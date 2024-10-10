<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function index(){
        $bookings = Bookings::all();

        $data = [
            'title' => 'Reservaciones FullStack FSJ22',
            'date' => now(),
            'bookings' => $bookings
        ];

        $pdf = PDF::loadView('PDF.reporte', $data);
        return $pdf->stream('reservaciones.pdf');
    }
}
