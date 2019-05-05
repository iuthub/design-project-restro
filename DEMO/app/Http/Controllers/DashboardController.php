<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\message;
use App\booking;
use Storage;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->is_admin != 1)
            return back()->with('error','No Authority');
        $messages = message::orderBy('created_at','desc')->orderBy('is_read','desc')->paginate(5,['*'], 'msg_pages');
        $bookings = booking::orderBy('created_at','desc')->paginate(5,['*'], 'bk_pages');
        return view('dashboard')->with('messages', $messages)->with('bookings', $bookings);
    }

    public function show()
    {
        return view('profiles.show')->with('user', auth()->user());
    }

    public function edit()
    {
        return view('profiles.edit');//->with('user', auth()->user());
    }

    public function update(Request $request)
    {
        if(auth()->user()->id != $request->id){
            return redirect('/')->with('error', 'Authentification Privilage Error');
        }
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
            'avatar' => ['image','nullable','max:1999'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        if(!empty($request->file('avatar')))
        {
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('avatar')->storeAs('public/images', $fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'avatar.png';
        }
//        dd($data);
        $user = User::findOrFail($request->id);
        // echo()
        if(!Hash::check($request->cur_password, $user->password))
        {
            return redirect('/profile')->with('error', 'Current Password is Not Correct');   
        }
        
        $user->name = $request->name;//$data['Lname'];
        $user->phone = $request->phone;//$data['Lname'];
        $user->email = $request->email;//$data['email'];
        $user->password = Hash::make($request->password);//$data['password']);
        if($request->hasFile('avatar'))
        {
            Storage::delete('public/images'.$user->avatar);
            $user->avatar = $fileNameToStore;
        }
        $user->avatar = $fileNameToStore;
        $user->save();
        return redirect('/')->with('success','Profile Updated');
    }

    public function destroy()
    {
        $user = auth()->user();
        if($user->avatar != 'noimage.png' && $user->avatar != 'avatar.png')
        {
            Storage::delete('public/images/'.$user->avatar);
        }

        $user->delete();

        return redirect('/logout')->with('success','Profile Removed');
    }

}
