<?php

namespace App\Http\Controllers\Donor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Donation;
use App\Branch;

use Illuminate\Support\Facades\Auth;


class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Pass data to view
        return view('donor.blood_donation')->with( 'donations',Donation::paginate(2));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $branches = Branch::pluck('branch_id','branch_name');

         return view('donor.donation_create')->with('branches',$branches);
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
            'blood_quantityInPints'=>'required',
        ]);
        $donations= new Donation([
            'donor_id' => Auth::user()->donor_id,
            'branch_id' => $request->get('branch'),
            'blood_quantityInPints' =>  $request->get('blood_quantityInPints'),

        ]);
        $donations->save();
        return redirect()->route('donor.donations.index')->with('success','Donation has been recorded');
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
        $donations = Donation::findOrFail($id);
        return view('donor.donation_edit', compact('donations'));
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
            'blood_quantityInPints'=>'required',

        ]);
        $donations = Donation::find($id);
        $donations->donor_id =  Auth::user()->donor_id;
        $donations->branch_id = $request->get('branch');
        $donations->blood_quantityInPints = $request->get('blood_quantityInPints');
        $donations->save();
        return redirect()->route('donor.donations.index')->with('success','Donation record has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Donation::destroy($id);
        return redirect()->route('donor.donations.index')->with('success','Donation record has been deleted');
    }
}
