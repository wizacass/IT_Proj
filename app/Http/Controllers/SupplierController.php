<?php

namespace App\Http\Controllers;

use App\Models\PlanePart;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $suppliers = $user->hasRole('executive') ?
            Supplier::All() :
            Supplier::where('is_active', True)->get();
        return view('supplier.index', compact('suppliers', 'user'));
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

    public function destroy(Supplier $supplier)
    {
        $supplier->is_active = !$supplier->is_active;
        $supplier->save();

        return redirect("/suppliers");
    }
}
