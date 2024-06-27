<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Speciality;
use App\Models\SupplierCategory;
use Illuminate\Http\Request;
use App\Http\Requests;
use URL;
use Route;
use App\Models\Supplier;
use Auth;
use Redirect;
use File;
use Illuminate\Support\Facades\Storage;
use App\Jobs\ProductDataImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all()->where('status', 'Queue');
        return view('backend.doctor.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialities = Speciality::all();
        $supplierCategories = SupplierCategory::all();
        $userGender = config('mvp.GENDER');
        return view('backend.doctor.create', compact('specialities', 'supplierCategories', 'userGender'));
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
            'sku' => 'required|max:8',
            'supplier' => 'required',
            'supplier_category' => 'required',
            'price' => 'required',
            'url' => 'required',
            'title' => 'required'
        ]);

        $product = Product::create([
            'sku' => $request->sku,
            'name' => $request->title,
            'title' => $request->title,
            'supplier_id' => $request->supplier,
            'supplier_category_id' => $request->supplier_category,
            'description' => $request->description,
            'price' => $request->price,
            'url' => $request->url,
            'status' => 'Queue',
            'created_by' => Auth::user()->id,
        ]);

        // upload images
//        $this->uploadImage($request, $product->id);

        if ($product) {
            flash('Product created successfully')->success();
        } else {
            flash('Product could not be created. Please try again.')->error();
        }

        return redirect()->route('backend.product.index');

    }

    /**
     * Common function for uploading the images
     *
     */
    public function uploadImage($request, $productId)
    {
        //dd($request->all());
        foreach (($request['images']) as $file) {
dd($file->extension());

            /*if ($file->hasfile('image')) {*/
                dd('ajk');

                    $name = time() . uniqid(rand()) . '.' . $file->extension();
                    $file->move(public_path() . '/storage/images/products/', $name);

                    ProductImage::create([
                        'product_id' => $productId,
                        'image' => $name,
                        'created_by' => Auth::user()->id
                    ]);

            /*} else {
                dd('out');
            }*/
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productDetail = Product::findorfail($id);
        $suppliers = Supplier::all();
        $supplierCategories = SupplierCategory::all();
        return view('backend.doctor.view', compact('productDetail', 'suppliers', 'supplierCategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productDetail = Product::findorfail($id);
        $suppliers = Supplier::all();
        $supplierCategories = SupplierCategory::all();
        return view('backend.doctor.edit', compact('productDetail', 'suppliers', 'supplierCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sku' => 'required|max:8',
            'supplier' => 'required',
            'supplier_category' => 'required',
            'price' => 'required',
            'url' => 'required',
            'title' => 'required'
        ]);

        $product = Product::findorfail($id);

        $product->fill([
            'sku' => $request->sku,
            'name' => $request->title,
            'title' => $request->title,
            'supplier_id' => $request->supplier,
            'supplier_category_id' => $request->supplier_category,
            'description' => $request->description,
            'price' => $request->price,
            'url' => $request->url,
            'updated_by' => Auth::user()->id,
        ]);

        $product->save();

        // upload images
        //$this->uploadImage($request, $product->id);

        if ($product) {
            flash('Product updated successfully')->success();
        } else {
            flash('Product could not be updated. Please try again.')->error();
        }

        return redirect()->route('backend.doctor.index');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findorfail($id);

        Product::find($id)->update(['deleted_by' => Auth::user()->id]);

        if ($product->delete()) {
            flash('Product deleted successfully')->success();
        } else {
            flash('Product could not be deleted. Please try again.')->error();
        }

        return redirect()->route('backend.product.index');
    }
}
