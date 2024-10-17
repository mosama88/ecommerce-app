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
        $other['categories'] = Category::get();
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

            $dataToInsert['title']  = $request->title;
            $dataToInsert['mini_description'] = $request->mini_description;
            $dataToInsert['description'] = $request->description;
            $dataToInsert['price'] = $request->price;
            $dataToInsert['discount_percentage'] = $request->discount_percentage;
            $dataToInsert['after_discount'] = $request->after_discount;
            $dataToInsert['qty'] = $request->qty;
            $dataToInsert['sku'] = $request->sku;
            $dataToInsert['sub_category_id'] = $request->sub_category_id;
            $dataToInsert['brand_id'] = $request->brand_id;
            $dataToInsert['status'] = 1;
            $dataToInsert['created_by'] = auth()->user()->id;
            $dataToInsert['com_code'] = $com_code;

            // إدراج المنتج
            $product = insert(new Product, $dataToInsert);

            $product->color_product()->attach($request->color_id);
            $product->size_product()->attach($request->size_id);

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
        $com_code = auth()->user()->com_code;
        $info = Product::findOrFail($id);
        $other['sub_categories'] = SubCategory::with('category:id,name')->get();
        $other['brands'] = Brand::get();
        $other['sizes'] = $info->size_product; // المقاسات المرتبطة بالمنتج فقط
        $other['colors'] = $info->color_product; // الألوان المرتبطة بالمنتج فقط

        return view('dashboard.products.show', compact('other', 'info'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $info = Product::findOrFail($id);
        $other['sub_categories'] = SubCategory::with('category:id,name')->get();
        $other['categories'] = Category::get();
        $other['brands'] = Brand::get();
        $other['colors'] = Color::get();
        $other['sizes'] = Size::get();
        return view('dashboard.products.edit', compact('other', 'info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        try {
            // جلب المنتج المراد تعديله
            $product = Product::findOrFail($id);
            DB::beginTransaction();
            $com_code = auth()->user()->com_code;

            $dataToUpdate['title']  = $request->title;
            $dataToUpdate['mini_description'] = $request->mini_description;
            $dataToUpdate['description'] = $request->description;
            $dataToUpdate['price'] = $request->price;
            $dataToUpdate['discount_percentage'] = $request->discount_percentage;
            $dataToUpdate['after_discount'] = $request->after_discount;
            $dataToUpdate['qty'] = $request->qty;
            $dataToUpdate['sku'] = $request->sku;
            $dataToUpdate['sub_category_id'] = $request->sub_category_id;
            $dataToUpdate['brand_id'] = $request->brand_id;
            $dataToUpdate['status'] = 1;
            $dataToUpdate['created_by'] = auth()->user()->id;
            $dataToUpdate['com_code'] = $com_code;

            // إدراج المنتج
            $product->update($dataToUpdate);

            // update pivot tABLE
            if ($request->has('color_id')) {
                $product->color_product()->sync($request->color_id); // يجب أن تكون العلاقة معرفة في الموديل
            }
            if ($request->has('size_id')) {
                $product->size_product()->sync($request->size_id); // يجب أن تكون العلاقة معرفة في الموديل
            }

            // التحقق من وجود الصورة وتحديثها إذا لزم الأمر
            if ($request->has('photo')) {
                // حذف الصورة القديمة
                if ($product->image) {
                    $old_img = $product->image->filename;
                    $this->Delete_attachment('upload_image', 'products/photo/' . $old_img, $request->id);
                    $product->image()->delete(); // حذف السجل القديم للصورة من قاعدة البيانات
                }
                // رفع الصورة الجديدة وتخزينها في قاعدة البيانات
                $this->verifyAndStoreMultiImages($request, 'photo', 'products/photo/', 'upload_image', $product->id, 'App\Models\Product');
            }

            DB::commit();
            return redirect()->route('dashboard.products.index')->with('success', 'تم تحديث المنتج بنجاح');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'عفوآ لقد حدث خطأ ما: ' . $ex->getMessage()])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function getSubCategory(Request $request)
    {
        if ($request->ajax()) {
            $category_id = $request->category_id;

            // استرجاع الفئات الفرعية بناءً على ID الفئة
            $other['subCategories'] = SubCategory::where('category_id', $category_id)
                ->where('com_code', auth()->user()->com_code)
                ->orderBy('id', 'ASC')
                ->get(['id', 'name']);

            // إرجاع البيانات بتنسيق JSON
            return response()->json($other['subCategories']);
        }

        return response()->json(['error' => 'Invalid Request'], 400); // إذا لم يكن الطلب AJAX
    }
}
