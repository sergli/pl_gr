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
        $foreigners = Foreigner::all();

        return view('foreigners.index', compact('foreigners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foreigners.create');
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
            'name'=>'required',
            'surname'=>'required',
            'company_id'=>'required'
        ]);
        $Foreigner = new Foreigner(
            [
                'name' => $request->get('name'),
                'surname' => $request->get('surname'),
                'company_id' => $request->get('company_id'),
            ]
        );
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
    public function edit($id)
    {
        $foreigner = Foreigner::find($id);
        return view('foreigners.edit', compact('foreigner'));
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
            'name'=>'required',
            'company_id'=>'required',
        ]);

        $foreigner = Foreigner::find($id);
        $foreigner->name =  $request->get('name');
        $foreigner->company_id = $request->get('company_id');
        $foreigner->ccode = $request->get('ccode');
        $foreigner->surname = $request->get('surname');

        $foreigner->patentserie = $request->get('patentserie');
        $foreigner->patentnumber = $request->get('patentnumber');
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
