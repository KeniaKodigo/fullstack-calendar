<?php

namespace App\Http\Controllers;

use App\Models\Accomodations;
use App\Models\Bookings;
use App\Models\User;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function get_bookings_by_accomodations(Request $request){
        $accomodations = Accomodations::select('id','name')->get();

        if($request->has('accomodations')){
            $id_accomodation = $request->input('accomodations');
            $bookings = Bookings::where('accomodation_id', $id_accomodation)->get();
        }else{
            $bookings = [];
            $id_accomodation = null;
        }
        
        return view('pages.bookings', array(
            "accomodations" => $accomodations,
            "bookings" => $bookings,
            "selected_accomodation" => $id_accomodation
        ));
    }

    public function form_register(){
        $accomodations = Accomodations::select('id','name as accomodation')->get();
        $users = User::select('id','name')->get();

        return view('pages.register_booking', array(
            "accomodations" => $accomodations,
            "users" => $users
        ));
    }

    public function save(Request $request){
        $request->validate([
            'booking' => 'required|string|max:10',
            'in_date' => 'required|date_format:Y-m-d',
            'out_date' => 'required|date_format:Y-m-d|after:in_date',
            'total_amount' => 'required|numeric',
            'accomodation' => 'required',
            'user' => 'required'
        ]);

        $booking = new Bookings();
        $booking->booking = $request->input('booking');
        $booking->check_in_date = $request->input('in_date');
        $booking->check_out_date = $request->input('out_date');
        $booking->total_amount = $request->input('total_amount');
        $booking->status = "CONFIRMED";
        $booking->user_id = $request->input('user');
        $booking->accomodation_id = $request->input('accomodation');
        $booking->save();

        return redirect()->route('bookingsAccomodation');
    }

    public function updateStatus($id){
        $booking = Bookings::find($id);
        $booking->status = "CANCELLED";
        $booking->update();

        //return redirect()->route('bookingsAccomodation');
        return redirect()->back()->with('success', 'Reserva cancelada con éxito.');
    }
}
