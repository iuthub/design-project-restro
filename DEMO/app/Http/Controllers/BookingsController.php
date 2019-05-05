<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\booking;
use App\seats;

class BookingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate(request(), [
            'date' => ['required', 'date_format:"d/m/Y"'],
            'time' => ['required','date_format:"H:i"'],
            'guests' => ['required'],
        ]);
        $seat = seats::orderBy('updated_at', 'desc')->first();
        if($seat->aviable < $request->guests)
            return back()->with('error','Only '.$seat->aviable.' aviable seats');
        $booking = new booking;
        $booking->day = $request->date;
        $booking->time = $request->time;
        $booking->gnumber = $request->guests;
        $booking->user_id = auth()->user()->id;
        $booking->save();
        $seat->aviable -= $request->guests;
        $seat->update();
        return back()->with('success','Successfully Booked');
    }

    public function destroy($id)
    {

        if(auth()->user()->is_admin == 0){
            return redirect('/')->with('error', 'Authentification Privilage Error');
        }
        $booking = booking::findOrFail($id);
        if(auth()->user()->id != $booking->user_id){
            return back()->with('error', 'Authentification Privilage Error');
        }
        $seat = seats::orderBy('updated_at', 'desc')->first();
        $seat->aviable += $booking->gnumber;
        $seat->update();

        $booking->delete();
        return back()->with('success','The Booking Canceled');
    }
}
