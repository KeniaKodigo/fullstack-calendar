<?php

namespace App\Http\Controllers;

use App\Models\Accomodations;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class AccomodationsController extends Controller
{
    public function index(){
        // $accomodations = Accomodations::all();
        $accomodations = Accomodations::orderBy('id','desc')->get();

        return view('pages.accomodations', array("accomodations" => $accomodations));
    }

    //metodo para guardar un alojamiento
    public function save(Request $request){

        $request->validate([
            'accomodation' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Valida que la imagen sea de tipo adecuado
        ]);

        $image = $request->file('image')->storeOnCloudinary('accomodations');
        $url = $image->getSecurePath();

        //insertar alojamiento
        $accomodation = new Accomodations();
        $accomodation->name = $request->input('accomodation');
        $accomodation->address = $request->input('address');
        $accomodation->description = $request->input('description');
        $accomodation->image = $url;
        $accomodation->save();

        return redirect()->route('listAccomodations');
    }
}
