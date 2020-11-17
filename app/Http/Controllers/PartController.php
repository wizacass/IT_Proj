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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Auth::user()->supplier;
        return view('parts.index', compact('supplier'));
    }

    public function create()
    {
        return view('parts.create');
    }

    public function store()
    {
        $stringValidators = ['required', 'min:3', 'max:255'];
        $attributes = request()->validate([
            'manufacturer' => $stringValidators,
            'model' => $stringValidators,
            'part_type' => $stringValidators,
            'delivery_time' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'numeric', 'min:0.01'],
            'amount' => ['required', 'integer', 'min:1'],
        ]);

        $part = new PlanePart($attributes);
        $part->save();

        return redirect(route('parts.index'));
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
