<?php

namespace App\Http\Controllers;

use App\Models\Handphone;
use Illuminate\Http\Request;

class DashboardHandphoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.handphone.index', [
            'handphones' => Handphone::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.handphone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'merk_hp' => ['required', 'max:255'],
            'tipe_hp' => ['required', 'max:255'],
            'rating' => ['required'],
            'harga' => ['required']
        ]);

        Handphone::create($validatedData);

        return redirect('/dashboard/handphones');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Handphone  $handphone
     * @return \Illuminate\Http\Response
     */
    public function show(Handphone $handphone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Handphone  $handphone
     * @return \Illuminate\Http\Response
     */
    public function edit(Handphone $handphone)
    {
        return view('dashboard.handphone.edit', [
            'handphone' => $handphone
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Handphone  $handphone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Handphone $handphone)
    {
        $validatedData = $request->validate([
            'merk_hp' => ['required','max:255'],
            'tipe_hp' => ['required','max:255'],
            'rating' => ['required'],
            'harga' => ['required']
        ]);

        Handphone::where('id', $handphone->id)->update($validatedData);
        return redirect('/dashboard/handphones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Handphone  $handphone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Handphone $handphone)
    {
        Handphone::find($handphone->id)->delete();
        return redirect('/dashboard/handphones');
    }

    public function recycle(){
        return view('dashboard.handphone.recycle', [
            'handphones' => Handphone::onlyTrashed()->paginate(10)
        ]);
    }

    public function restore($handphoneID){
        Handphone::onlyTrashed()->find($handphoneID)->restore();
        return redirect('/dashboard/handphones/recycle');
    }

    public function delete($handphoneID){
        Handphone::onlyTrashed()->find($handphoneID)->forceDelete();
        return redirect('/dashboard/handphones/recycle');
    }
}
