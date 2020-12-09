<?php

namespace App\Http\Controllers;

use App\Models\PlanePart;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:manager');
    }

    public function index()
    {
        $suppliers = Supplier::All();
        return view('supplier.index', compact('suppliers'));
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
    public function store(Request $request)
    {
        //
    }

    public function show(Supplier $supplier)
    {
        $parts = PlanePart::where([
            ['supplier_id', "$supplier->id"],
            ['is_orderable', True]
        ])->get();
        return view('manager.parts', compact('parts', 'supplier'));
    }

    public function order($id)
    {
        $supplier = Supplier::find($id);
        $parts = PlanePart::where([
            ['supplier_id', "$id"],
            ['is_orderable', True]
        ])->get();
        return view('orders.create', compact('parts', 'supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
