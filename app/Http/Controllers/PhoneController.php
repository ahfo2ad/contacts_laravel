<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PhoneRequest;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // get all phones for all users
        // return view('phones.index', ['phones' => Phone::all()]);

        // get user phones
        // return view('phones.index', ['phones' => Phone::where('user_id', auth()->id())->get()]);

        // get user phones using one to many relation
        return view('phones.index', ['phones' => Auth::user()->phones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $request)
    {

        // validation before using request
        // $validated = $request->validate([
        //     'mobilephone' => 'required|unique:phones|numeric|starts_with:010,011,012,015',
        // ]);


        // authorization of one person => go to policy in create to understand
        // if (Auth::user()->cannot('create', Phone::class)) {
        //     abort(403);
        // }

        // store in database
        $phone = new Phone($request->all());
        // $phone->mobilephone = $request->mobilephone;
        $phone->user_id = Auth::id();

        // storing data in one line
            // $phone = Auth::user()->phones()->create($request->all());

        if($phone->save()){

            // for flash session for one request
            session()->flash('success', 'Mobile phone has been added successfully!');
            return redirect()->route('phones.index');

            // for session 3ady
            // return redirect()->route('phones.index')->with('success', 'Mobile phone added successfully!');
        }
        else{
            return redirect()->route('phones.store');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $phone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phone = Phone::find($id);

        // check authorization    first way
        // if (Auth::user()->cannot('update', $phone)) {
        //     abort(403);
        // }

        // authorization in one line second way
        $this->authorize('update', $phone);

        return view('phones.edit', ['phone' => $phone]);
        // return view('phones.edit', ['phone' => Phone::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneRequest $request, $id)
    {
        // update row in database
        $phone = Phone::find($id);

        // check authorization first way
        // if(Auth::user()->cannot('update', $phone)){
        //     abort(403);
        // }

        // authorization in one line second way
        $this->authorize('update', $phone);

        $phone->mobilephone = $request->mobilephone;

        if($phone->save()) {
            return redirect()->route('phones.index');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phone = Phone::find($id);

        // check authorization   first way
        // if(Auth::user()->cannot('delete', $phone)){            // (auth()->user()->cannot('delete', $phone)) == (Auth::user()->cannot('delete', $phone))
        //     abort(403);
        // }

        // authorization in one line second way
        $this->authorize('delete', $phone);

        $phone->delete();
        return redirect()->route('phones.index');
    }
}
