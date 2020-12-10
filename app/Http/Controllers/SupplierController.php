<?php

namespace App\Http\Controllers;

use App\Models\PlanePart;;

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

    public function create()
    {
        return redirect("/suppliers");
    }

    public function store()
    {
        return redirect("/suppliers");
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

    public function edit()
    {
        return redirect("/suppliers");
    }

    public function update()
    {
        return redirect("/suppliers");
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->is_active = !$supplier->is_active;
        $supplier->save();

        return redirect("/suppliers");
    }
}
