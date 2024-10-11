<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BrandRequest;

class BrandController extends Controller
{
    /**
     * Display Brand a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = getColumnsIndex(new Brand(), array("*"), array('com_code' => $com_code), 'id', 'DESC')->get();
        return view('dashboard.brands.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        try {
            DB::beginTransaction();
            $com_code = auth()->user()->com_code;
            $dataToInsert['name'] = $request->name;
            $dataToInsert['description'] = $request->description;
            $dataToInsert['created_by'] = auth()->user()->id;
            $dataToInsert['com_code'] = $com_code;


            insert(new Brand, $dataToInsert);

            DB::commit();
            return response()->json(['success' => 'تم أضافة  بنجاح']);
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

        $info = Brand::findOrFail($id);
        return view('dashboard.brands.edit', compact('info'));
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


            update(new Brand, $dataToUpadte, array('com_code' => $com_code, 'id' => $id));

            DB::commit();
            return redirect()->back()->with(['success' => 'تم أضافة  بنجاح']);
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

        $deletesSize = Brand::findOrFail($id);

        destroy(new Brand(),  array('com_code' => $com_code, 'id' => $id));

        return redirect()->back()->with(['success' => 'تم حذف العلامة التجارية بنجاح']);
    }
}
