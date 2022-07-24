<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhoneRequest;
use App\Http\Resources\PhoneCollection;
use App\Http\Resources\PhoneResource;
use App\Models\Phone;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // first way
        // return Phone::all();

        // second way
        // return PhoneResource::collection(Phone::all());

        // third way
        return new PhoneCollection(Phone::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $request)
    {
        // storing data in one line
        $phone = Auth::user()->phones()->create($request->all());

        return new PhoneResource($phone);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // first way
        // $phone = Phone::find($id);
        // return $phone;

        //second way
        return new PhoneResource(Phone::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneRequest $request, $id)
    {
        // validation => convert request param to PhoneRequest

        // update db
        $phone = Phone::find($id);
        $phone->update($request->all());
        // return json
        return new PhoneResource($phone);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phone = Phone::find($id);

        $phone->delete();
    }
}
