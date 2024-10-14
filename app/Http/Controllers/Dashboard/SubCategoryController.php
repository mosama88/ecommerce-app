<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SubCategoryRequest;
use App\Models\Category;

class SubCategoryController extends Controller
{
      /**
     * Display a listing of the resource.
     * */
    public function index()
    {
        $other['categories'] = Category::orderBy("id","DESC")->get();

        $com_code = auth()->user()->com_code;
        $data = getColumnsIndex( new SubCategory(), array("*"), array('com_code' => $com_code), 'id', 'DESC')->get();
        return view('dashboard.sub_categories.index', compact('data','other'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $other['categories'] = Category::orderBy("id","DESC")->get();

        return view('dashboard.sub_categories.create',compact('other'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubCategoryRequest $request)
    {
        try {
            DB::beginTransaction();
            $com_code = auth()->user()->com_code;
            $dataToInsert['name'] = $request->name;
            $dataToInsert['description'] = $request->description;
            $dataToInsert['created_by'] = auth()->user()->id;
            $dataToInsert['com_code'] = $com_code;


            insert(new SubCategory, $dataToInsert);

            DB::commit();
            return response()->json(['success' => 'تم أضافة الفئة بنجاح']);
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
        $other['categories'] = Category::orderBy("id","DESC")->get();

        $info = SubCategory::findOrFail($id);
        return view('dashboard.sub_categories.edit', compact('info','other'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            DB::beginTransaction();
            $com_code = auth()->user()->com_code;
            $dataToUpadte['name'] = $request->name;
            $dataToUpadte['description'] = $request->description;
            $dataToUpadte['updated_by'] = auth()->user()->id;
            $dataToUpadte['com_code'] = $com_code;


            update( new SubCategory, $dataToUpadte, array('com_code' => $com_code, 'id' => $id));

            DB::commit();
            return redirect()->back()->with(['success' => 'تم أضافة الفئة بنجاح']);
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
        $com_code = auth()->user()->com_code;

        $deletesSize = SubCategory::findOrFail($id);

        destroy(new SubCategory(),  array('com_code' => $com_code, 'id' => $id));

        return redirect()->back()->with(['success' => 'تم حذف الفئة بنجاح']);
    }
}