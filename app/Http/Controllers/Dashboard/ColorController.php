<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Color;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ColorRequest;

class ColorController extends Controller
{
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = getColumnsIndex(new Color(), array("*"), array('com_code' => $com_code), 'id', 'DESC')->get();
        return view('dashboard.colors.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ColorRequest $request)
    {
        try {
            DB::beginTransaction();
            $com_code = auth()->user()->com_code;
            $dataToInsert['name'] = $request->name;
            $dataToInsert['hex_code'] = $request->hex_code; // إضافة hex_code
            $dataToInsert['created_by'] = auth()->user()->id;
            $dataToInsert['com_code'] = $com_code;


            insert(new Color, $dataToInsert);

            DB::commit();
            return response()->json(['success' => 'تم أضافة اللون بنجاح']);
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
        $info = Color::finOrFail($id);
        return view('dashboard.colors.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ColorRequest $request, $id)
    {
        try {
            $com_code = auth()->user()->com_code;

            DB::beginTransaction();
            $dataToUpdate['name'] = $request->name;
            $dataToUpdate['hex_code'] = $request->hex_code; // إضافة hex_code
            $dataToUpdate['updated_by'] = auth()->user()->id;
            $dataToUpdate['com_code'] = $com_code;


            update(new Color(), $dataToUpdate, ['id' => $id]);

            DB::commit();
            return redirect()->back()->with(['success' => 'تم تعديل اللون بنجاح']);
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
        try {
            $com_code = auth()->user()->com_code;

            DB::beginTransaction();
            $dataToDelete = Color::findOrFail($id);

            destroy(new Color(),  array('id' => $id));

            DB::commit();
            return redirect()->back()->with(['success' => 'تم حذف : ' . $dataToDelete['name'] . " " . 'بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'عفوآ لقد حدث خطأ ما: ' . $ex->getMessage()])->withInput();
        }
    }
}
