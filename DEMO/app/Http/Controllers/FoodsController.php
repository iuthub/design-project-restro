<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\food;
use App\like;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index()
    {
        $foods = food::all();
        $foodtype = food::orderByLikesCount()->where('type', 'food')->skip(0)->take(2)->get();
        $saladtype = food::orderByLikesCount()->where('type', 'salad')->skip(0)->take(2)->get();
        $snacktype = food::orderByLikesCount()->where('type', 'snack')->skip(0)->take(2)->get();
        $desserttype = food::orderByLikesCount()->where('type', 'dessert')->skip(0)->take(2)->get();
        $menu = food::orderBy('created_at', 'desc')->paginate(6);
        return view('foods.index')
        ->with('foods', $foods)
        ->with('foodtype', $foodtype)
        ->with('saladtype', $saladtype)
        ->with('snacktype', $snacktype)
        ->with('desserttype', $desserttype)
        ->with('menu', $menu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->is_admin == 0){
            return redirect('/')->with('error', 'Authentification Privilage Error');
        }
        return view('foods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->is_admin == 0){
            return redirect('/')->with('error', 'Authentification Privilage Error');
        }
        $this->validate($request, [
            'name' => ['required','string','max:191'],
            'price' => ['required','numeric', 'min:1'],
            'nationality' => ['required','string','max:191'],
            'type' => ['required','in:food,snack, dessert, salad'],
            'ingredients' => ['required','string','max:191'],
            'image' => 'image|nullable|max:1999',
        ]);

        if($request->hasFile('image'))
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.png';
        }

        $food = new food;
        $food->name = $request->name;
        $food->image = $fileNameToStore;
        $food->nationality = $request->nationality;
        $food->type = $request->type;
        $food->ingredients = $request->ingredients;
        $food->price = $request->price;
        $food->save();

        return back()->with('success','Food Added to Menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     if(auth()->user()->is_admin == 0){
    //         return redirect('/')->with('error', 'Authentification Privilage Error');
    //     }
    //     $food = food::findOrFail($id);
    //     return view('foods.show')->with('food', $food);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->is_admin == 0){
            return redirect('/')->with('error', 'Authentification Privilage Error');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(auth()->user()->is_admin == 0){
            return redirect('/')->with('error', 'Authentification Privilage Error');
        }
        $this->validate($request, [
            'name' => ['required','string','max:191'],
            'price' => ['required','numeric', 'min:1'],
            'nationality' => ['required','string','max:191'],
            'type' => ['required','in:food,snack, dessert, salad'],
            'ingredients' => ['required','string','max:191'],
            'image' => 'image|nullable|max:1999',
        ]);

        if($request->hasFile('image'))
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.png';
        }

        $food = food::findOrFail($id);
        $food->name = $request->name;
        if($request->hasFile('image'))
        {
            Storage::delete('public/images'.$food->image);
            $food->image = $fileNameToStore;
        }
        $food->image = $fileNameToStore;
        $food->nationality = $request->nationality;
        $food->type = $request->type;
        $food->ingredients = $request->ingredients;
        $food->price = $request->price;
        $food->save();

        return redirect('/')->with('success','Food Updated in Menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->is_admin == 0){
            return redirect('/')->with('error', 'Authentification Privilage Error');
        }
        $food = food::findOrFail($id);
        if($food->image != 'noimage.png' && $food->image != 'noimage.png')
        {
            Storage::delete('public/images/'.$food->image);
        }

        $food->delete();
        return redirect('/')->with('success','Food Removed from Menu');
    }
    
    public function like(Request $request) {
        // dd($request);
        $food = food::where('id', $request->id)->first();
        // dd($food);
        if($food->liked){
            $food->unlike();
        }else{
            $food->like();
        }
        return back();//response()->json(['success'=>'Like is successfully added']);//redirect('/'.$request->toggle);//->json(['success'=>'Like is successfully added']);
        // return back();//->json(['success'=>'Like is successfully added']);
   }
}
