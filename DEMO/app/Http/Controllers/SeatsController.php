<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\seat;

class SeatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function update(Request $request, $id)
    {
        
        if(auth()->user()->is_admin == 0){
            return redirect('/')->with('error', 'Authentification Privilage Error');
        }
        $this->validate($request, [
            'total' => ['required','numeric', 'min:1'],
            'aviable' => ['required','numeric', 'min:0'],
        ]);
        $seat = seat::findOrFail($id);
        $seat->total = $request->total;
        $seat->aviable = $request->aviable;
        $seat->save();
        return back()->with('success','New Comment Added');
    }
}
