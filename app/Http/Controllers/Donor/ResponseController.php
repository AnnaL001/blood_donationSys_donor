<?php

namespace App\Http\Controllers\Donor;

use App\DonorResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\BloodRequest;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donor.response_create');
    }

    public function create2($id)
    {
        $request_id = $id;
        
        return view('donor.response_create',compact('request_id'));
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
            'response_text'=>'required',
        ]);

        $responses= new DonorResponse([
            'donor_id' => Auth::user()->donor_id,
            'response_text' => $request->get('response_text'),
            'request_id' =>  $request->get('request_id')


        ]);
        $responses->save();
        return redirect()->route('donor.requests.index')->with('success','Your response has been recorded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requests = BloodRequest::findOrFail($id);
        return view('donor.response_create', compact('requests'));
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
        $requests = BloodRequest::find($id);
        $request->validate([
            'response_text'=>'required',
        ]);

        $responses= new DonorResponse([
            'donor_id' => Auth::user()->donor_id,
            'response_text' => $request->get('response_text'),
            'request_id' => $requests,
        ]);

        $requests = Blood_request::find($id);
        $requests->donor_id =  $request->get('request_text');
        $requests->response_text = $request->get('blood_type');
        $requests->request_id = $request->get('branch');

        $responses->save();
        return redirect()->route('donor.responses.index')->with('success','Your response has been added');
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
