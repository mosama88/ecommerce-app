<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Size;
use Illuminate\Http\Request;
use App\Helpers\GeneralHelpers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SizeRequest;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = getColumnsIndex(new Size(), array("*"), array('com_code' => $com_code), 'id', 'DESC')->get();
        return view('dashboard.sizes.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SizeRequest $request)
    {
        try {
            DB::beginTransaction();
            $com_code = auth()->user()->com_code;
            $dataToInsert['name'] = $request->name;
            $dataToInsert['created_by'] = auth()->user()->id;
            $dataToInsert['com_code'] = $com_code;


            insert(new Size, $dataToInsert);

            DB::commit();
            return response()->json(['success' => 'تم أضافة المقاس بنجاح']);
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

        $info = Size::findOrFail($id);
        return view('dashboard.sizes.edit', compact('info'));
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
            $dataToUpadte['updated_by'] = auth()->user()->id;
            $dataToUpadte['com_code'] = $com_code;


            update(new Size, $dataToUpadte, array('com_code' => $com_code, 'id' => $id));

            DB::commit();
            return redirect()->back()->with(['success' => 'تم أضافة المقاس بنجاح']);
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

        $deletesSize = Size::findOrFail($id);

        destroy(new Size(),  array('com_code' => $com_code, 'id' => $id));

        return redirect()->back()->with(['success' => 'تم حذف المقاس بنجاح']);
    }
}