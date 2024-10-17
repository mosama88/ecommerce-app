<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\SubCategory;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProductRequest;
use App\Models\Category;

class ProductController extends Controller
{

    use UploadTrait;


    public function index()
    {
        $com_code = auth()->user()->com_code;

        $data = getColumnsIndex(new Product(), array("*"), array('com_code' => $com_code), 'id', 'DESC')->get();
        return view('dashboard.products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $other['sub_categories'] = SubCategory::with('category:id,name')->get();
        $other['brands'] = Brand::get();
        $other['colors'] = Color::get();
        $other['sizes'] = Size::get();
        return view('dashboard.products.create', compact('other'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $com_code = auth()->user()->com_code;

            $dataToInsert = [
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'discount_percentage' => $request->discount_percentage,
                'after_discount' => $request->after_discount,
                'qty' => $request->qty,
                'sku' => $request->sku,
                'sub_category_id' => $request->sub_category_id,
                'size_id' => $request->size_id,
                'color_id' => $request->color_id,
                'brand_id' => $request->brand_id,
                'status' => 1,
                'created_by' => auth()->user()->id,
                'com_code' => $com_code,
            ];

            // إدراج المنتج
            $product = insert(new Product, $dataToInsert);

            // تحقق من وجود ملفات الصور في الطلب
            if ($request->hasFile('photos')) {
                // رفع كل صورة باستخدام دالة verifyAndStoreFile
                $this->verifyAndStoreMultiImages($request, 'photos', 'products/photo/', 'upload_image', $product->id, 'App\Models\Product');
            }

            DB::commit();
            return redirect()->route('dashboard.products.index')->with('success', 'تم أضافة المنتج بنجاح');
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
        $info = Product::findOrFail($id);
        $other['sub_categories'] = SubCategory::with('category:id,name')->get();
        $other['brands'] = Brand::get();
        $other['colors'] = Color::get();
        $other['sizes'] = Size::get();
        return view('dashboard.products.edit', compact('other', 'info'));
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
