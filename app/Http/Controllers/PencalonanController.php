<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sesi;
use App\Calon;
use App\User;
use Auth;

class PencalonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::where('name', 'Admin')->get();
        
        // $user = User::where('name', 'Admin')->first();

        // dd($users, $user);

        return view('backend.pencalonan_index')
            ->withCalons( Auth::user()->calons()->get() );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pencalonan_add')
            ->withSesis( Sesi::where('status', true)->get() )
            ->withCalon(new Calon);
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
            'sesi_id' => 'required',
            'name' => 'required',
            'ic' => 'required',
            'email' => 'required',
            'asas' => 'required',
        ]);

        // Sesi
        $sesi = Sesi::findOrFail($request->sesi_id);
        
        // Pencalonan
        $pencalonan = new Calon;
        $pencalonan->name = $request->name;
        $pencalonan->ic = $request->ic;
        $pencalonan->email = $request->email;
        $pencalonan->user_id = Auth::user()->id;
        $pencalonan->sesi_id = $sesi->id;
        $pencalonan->asas = $request->asas;

        return back()->withSuccess('Successfully add pencalonan');
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
        return view('backend.pencalonan_edit')
            ->withCalon( Calon::findOrFail($id) )
            ->withSesis( Sesi::where('status', 1)->get() );
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
            'sesi_id' => 'required',
            'name' => 'required',
            'ic' => 'required',
            'email' => 'required',
            'asas' => 'required',
        ]);

        // Sesi
        $sesi = Sesi::findOrFail($request->sesi_id);
        
        // Pencalonan
        $pencalonan = Calon::findOrFail($id);
        $pencalonan->name = $request->name;
        $pencalonan->ic = $request->ic;
        $pencalonan->email = $request->email;
        $pencalonan->user_id = Auth::user()->id;
        $pencalonan->sesi_id = $sesi->id;
        $pencalonan->asas = $request->asas;
        $pencalonan->save();

        return redirect()->route('pencalonan.index')->withSuccess('Successfully update pencalonan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Calon::destroy($id);

        return back()->withSuccess('Succeffully destroy');
    }
}
