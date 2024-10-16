<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $other['sub_categories'] = SubCategory::get();
        $other['brands'] = Brand::get();
        $other['colors'] = Color::get();
        $other['sizes'] = Size::get();
        return view('dashboard.products.create',compact('other'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $com_code = auth()->user()->com_code;
            $dataToInsert['title'] = $request->title;
            $dataToInsert['description'] = $request->description;
            $dataToInsert['price'] = $request->price;
            $dataToInsert['discount_percentage'] = $request->discount_percentage;
            $dataToInsert['after_discount'] = $request->after_discount;
            $dataToInsert['qty'] = $request->qty;
            $dataToInsert['sku'] = $request->sku;
            $dataToInsert['sub_category_id'] = $request->sub_category_id ;
            $dataToInsert['size_id'] = $request->size_id ;
            $dataToInsert['color_id'] = $request->color_id ;
            $dataToInsert['brand_id'] = $request->brand_id ;
            $dataToInsert['status'] = 1;
            $dataToInsert['title'] = $request->title;
            $dataToInsert['title'] = $request->title;
            $dataToInsert['title'] = $request->title;
            $dataToInsert['created_by'] = auth()->user()->id;
            $dataToInsert['com_code'] = $com_code;


            insert(new Product, $dataToInsert);

            DB::commit();
            return response()->json(['success' => 'تم أضافة المنتج بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'عفوآ لقد حدث خطأ ما: ' . $ex->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}