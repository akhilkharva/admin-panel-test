<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('backend.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $supplier = Supplier::create([
            'name' => $request->name,
            'description' => $request->description ? $request->description : null,
        ]);

        if ($supplier) {
            flash('Supplier created successfully')->success();
        } else {
            flash('Supplier could not be created. Please try again.')->error();
        }
        return redirect()->route('backend.supplier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Supplier $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Supplier $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplierDetail = Supplier::findorfail($id);
        return view('backend.supplier.edit', compact('supplierDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Supplier $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $supplier = Supplier::find($id);
        $supplier->fill([
            'name' => $request->name,
            'description' => $request->description ? $request->description : null,
        ]);

        $supplier->save();

        if ($supplier) {
            flash('Supplier updated successfully')->success();
        } else {
            flash('Supplier could not be updated. Please try again.')->error();
        }

        return redirect()->route('backend.supplier.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Supplier $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::findorfail($id);

        if ($supplier->delete()) {
            flash('Supplier deleted successfully')->success();
        } else {
            flash('Supplier could not be deleted. Please try again.')->error();
        }

        return redirect()->route('backend.supplier.index');
    }
}
