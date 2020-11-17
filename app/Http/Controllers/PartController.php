<?php

namespace App\Http\Controllers;

use App\Models\PlanePart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $supplier = Auth::user()->supplier;
        $parts = $supplier->parts;
        return view('parts.index', compact('supplier', 'parts'));
    }

    public function create()
    {
        return view('parts.create');
    }

    public function store()
    {
        $supplier = Auth::user()->supplier;
        $stringValidators = ['required', 'min:3', 'max:255'];
        $attributes = request()->validate([
            'manufacturer' => $stringValidators,
            'model' => $stringValidators,
            'part_type' => $stringValidators,
            'delivery_time' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'numeric', 'min:0.01'],
            'amount' => ['required', 'integer', 'min:1'],
        ]);

        $attributes += ['supplier_id' => $supplier->id];

        $part = new PlanePart($attributes);
        $part->save();

        return redirect(route('parts.index'));
    }

    public function show(PlanePart $part)
    {
        return view('parts.show', compact('part'));
    }

    public function edit(PlanePart $part)
    {
        return view('parts.edit', compact('part'));
    }

    public function update(PlanePart $part)
    {
        $attributes = request()->validate([
            'delivery_time' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'numeric', 'min:0.01'],
            'amount' => ['required', 'integer', 'min:0'],
        ]);
        $part->update($attributes);

        return redirect("/parts/$part->id");
    }

    public function destroy(PlanePart $part)
    {
        $part->is_orderable = !$part->is_orderable;
        $part->save();

        return redirect("/parts/$part->id");
    }
}
