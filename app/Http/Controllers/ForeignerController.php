<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Foreigner;

class ForeignerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \auth()->user();
        $foreigners = Foreigner::all()->where('company_id', $user->company->id);

        return view('foreigners.index', compact('foreigners', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = $request->user();
        $companies = \App\Models\Company::all()->unique('name');
        $countries = \App\Models\Country::all()->unique('name');
        $positions =  \App\Models\Position::all()->unique('name');

        return view('foreigners.create', compact('user', 'companies', 'countries', 'positions'));
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
            'name'         => 'required',
            'surname'      => 'required',
            'company_id'   => 'required',
            'country_id'   => 'required',
            'position_id'  => 'required',
            'poliscompany' => 'required',
        ]
        );
        $Foreigner = new Foreigner([
            'name'         => $request->get('name'),
            'surname'      => $request->get('surname'),
            'company_id'   => $request->get('company_id'),
            'country_id'   => $request->get('country_id'),
            'position_id'  => $request->get('position_id'),
            'poliscompany' => $request->get('poliscompany'),
        ]);
        $Foreigner->save();

        return redirect('/foreigners')->with('success', 'Foreigner saved!');
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
    public function edit($id, Request $request)
    {
        $foreigner = Foreigner::find($id);

        $user = $request->user();
        $companies = \App\Models\Company::all()->unique('name');
        $countries = \App\Models\Country::all()->unique('name');
        $positions =  \App\Models\Position::all()->unique('name');

        return view('foreigners.edit', compact('user', 'foreigner', 'companies', 'countries', 'positions'));
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
            'name'         => 'required',
            'surname'      => 'required',
            //'company_id'   => 'required',
            'country_id'   => 'required',
            'position_id'  => 'required',
            'poliscompany' => 'required',
        ]);

        $foreigner = Foreigner::find($id);
        $foreigner->name =  $request->get('name');
        $foreigner->surname = $request->get('surname');

        // company_id is not editable
        //$foreigner->company_id = $request->get('company_id');
        $foreigner->position_id = $request->get('position_id');
        $foreigner->country_id = $request->get('country_id');

        $foreigner->poliscompany = $request->get('poliscompany');

        $foreigner->save();

        return redirect('/foreigners')->with('success', 'Foreigner updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foreigner = Foreigner::find($id);
        $foreigner->delete();

        return redirect('/foreigners')->with('success', 'Foreigner deleted!');
    }
}
