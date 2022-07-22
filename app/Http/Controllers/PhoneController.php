<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = Phone::all();

        return view('phones.index', ['phones' => $phones]);
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
    public function store(Request $request)
    {
        $phone = new Phone();
        $phone->mobilephone = $request->mobilephone;
        $phone->user_id = Auth::id();
        if($phone->save()){
            return redirect()->route('phones.index');
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
        // dd(Phone::find($id));
        return view('phones.edit', ['phone' => Phone::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $phone = Phone::find($id);
        $phone->mobilephone = $request->mobilephone;
        if($phone->save()) {
            return redirect()->route('phones.index');
        } else {
            return redirect()->back();
        }
        // return view('phones.update', ['phone' => Phone::find($id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Phone::find($id)->delete();
        return redirect()->route('phones.index');
    }
}
