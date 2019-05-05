<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\message;

class MessagesController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'email','max:191'],
            'phone' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/'],
            'email' => ['required', 'string', 'email','max:191'],
            'body' => ['required'],
        ]);
        $message = new message;
        $message->name = $request->name;
        $message->body = $request->body;
        $message->phone = $request->phone;
        $message->email = $request->email;
        $message->save();
        return back()->with('success','Message Sent');              
    }
    public function update(Request $request, $id)
    {
        $message = message::findOrFail($id);
        if($message->is_read == 0)
            $message->is_read = 1;
        else if($message->is_read == 1)
            $message->is_read = 0; 
        $message->update();
        return back()->with('success','Message Changed');              
    }
}
