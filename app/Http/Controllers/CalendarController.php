<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(){
        $allBookings = Bookings::join('accomodations','bookings.accomodation_id','=','accomodations.id')->select('bookings.*','accomodations.name as accomodation')->get();

        $bookings = [];
        foreach($allBookings as $item){
            //es la estructura que pide el calendar
            $bookings[] = [
                'title' => $item->booking,
                'start' => $item->check_in_date . 'T11:00:00',
                'end' => $item->check_out_date . 'T13:59:59',
                'total_amount' => $item->total_amount,
                'accomodation' => $item->accomodation
            ];
        }

        // dd($bookings);
        return view('pages.calendar', compact('bookings'));
    }
}
