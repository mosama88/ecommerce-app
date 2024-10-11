<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ColorRequest;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Color::orderBy("id", "DESC")->get();
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
            $dataToInsert = new Color();
            $dataToInsert['name'] = $request->name;
            $dataToInsert['created_by'] = auth()->user()->id;

            $dataToInsert->save();
            DB::commit();
            return redirect()->back()->with(['success' => 'تم أضافة اللون بنجاح']);
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
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataToUpdate = Color::findOrFail($id);
            $dataToUpdate['name'] = $request->name;
            $dataToUpdate['updated_by'] = auth()->user()->id;
            $dataToUpdate->save();
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
            DB::beginTransaction();
            $dataToDelete = Color::findOrFail($id);
            $dataToDelete->delete();
            DB::commit();
            return redirect()->back()->with(['success' => 'تم حذف : ' . $dataToDelete['name'] . " " . 'بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'عفوآ لقد حدث خطأ ما: ' . $ex->getMessage()])->withInput();
        }
    }
}
