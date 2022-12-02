<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class DashboardFakturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.faktur.index', [
            'fakturs' => Invoice::where('isApprove', 1)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }

    public function recycle(){
        return view('dashboard.invoice.recycle', [
            'invoices' => Invoice::onlyTrashed()->where('isApproval', 1)->get()
        ]);
    }

    public function restore($invoiceId){
        Invoice::onlyTrashed()->where('isApprove', 1)->find($invoiceId)->restore();
        return redirect('/dashboard/fakturs/recycle');
    }

    public function delete($invoiceId){
        Invoice::onlyTrashed()->where('isApprove', 1)->find($invoiceId)->forceDelete();
        return redirect('/dashboard/fakturs/recycle');
    }
}
