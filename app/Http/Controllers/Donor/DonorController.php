<?php

namespace App\Http\Controllers\Donor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('donor.profile');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donor.donor_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'surname' => 'required',
            'email'=>'required',
            'password' => 'required',
            'phoneNo' => 'required'
        ]);
        $arr_ip = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
        $details = new User([
            'first_name' =>  $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'surname' => $request->get('surname'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'phoneNo'=> $request->get('phoneNo'),
            'gender' => $request->get('gender'),
            'geolocation' => $arr_ip,
        ]);
        $details->save();
        return redirect()->route('login')->with('success','Registration successful');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $details = User::find($id);
        return view('donor.donor_edit', compact('details'));
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
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'surname' => 'required',
            'email'=>'required',
            'password' => 'required',
            'phoneNo' => 'required',
            'gender' => 'required',
        ]);
        $details = User::find($id);
        $details->first_name =  $request->get('first_name');
        $details->last_name = $request->get('last_name');
        $details->surname = $request->get('surname');
        $details->email = $request->get('email');
        $details->password = bcrypt($request->get('password'));
        $details->phoneNo= $request->get('phoneNo');
        $details->gender = $request->get('gender');
        $details->save();
        return redirect()->route('donor.details.index')->with('success','Your info has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
