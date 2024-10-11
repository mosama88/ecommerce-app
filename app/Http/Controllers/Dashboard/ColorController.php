<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Helpers\GeneralHelpers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ColorRequest;
use App\Http\Requests\Dashboard\ColorUpdateRequest;

class ColorController extends Controller
{
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
            $dataToInsert['name'] = $request->name;
            $dataToInsert['created_by'] = auth()->user()->id;


            GeneralHelpers::insert(new Color, $dataToInsert);

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
    public function update(ColorUpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataToUpdate['name'] = $request->name;
            $dataToUpdate['updated_by'] = auth()->user()->id;


            GeneralHelpers::update(new Color(), $dataToUpdate, ['id' => $id]);

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

            GeneralHelpers::delete(new Color(), $dataToDelete->id);

            DB::commit();
            return redirect()->back()->with(['success' => 'تم حذف : ' . $dataToDelete['name'] . " " . 'بنجاح']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'عفوآ لقد حدث خطأ ما: ' . $ex->getMessage()])->withInput();
        }
    }
}