<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class DashboardInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.invoice.index',[
            'invoices' => Invoice::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'merk_hp' => ['required','max:255'],
            'tipe_hp' => ['required','max:255'],
            'nama_pembeli' => ['required', 'max:255'],
            'nohp_pembeli' => ['required', 'max:255'],
            'harga' => ['required']
        ]);

        Invoice::create($validatedData);
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        Invoice::find($invoice->id)->delete();
        return redirect('/dashboard/invoices');
    }

    public function recycle(){
        return view('dashboard.invoice.recycle', [
            'invoices' => Invoice::onlyTrashed()->get()
        ]);
    }

    public function restore($invoiceId){
        Invoice::onlyTrashed()->find($invoiceId)->restore();
        return redirect('/dashboard/invoices/recycle');
    }

    public function delete($invoiceId){
        Invoice::onlyTrashed()->find($invoiceId)->forceDelete();
        return redirect('/dashboard/invoices/recycle');
    }
}
