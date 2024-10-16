<?php

namespace App\Traits;

use Illuminate\Support\Str;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait UploadTrait
{

    public function verifyAndStoreImage(Request $request, $inputname, $foldername, $disk, $imageable_id, $imageable_type)
    {

        if ($request->hasFile($inputname)) {

            // Check img
            if (!$request->file($inputname)->isValid()) {
                // flash('Invalid Image!')->error()->important();
                session()->flash('message', 'Invalid Image!');
                return redirect()->back()->withInput();
            }

            $photo = $request->file($inputname);
            $name = Str::slug($request->input('name'));
            $filename = $name . '.' . $photo->getClientOriginalExtension();

            // insert Image
            $Image = new Image();
            $Image->filename = $filename;
            $Image->imageable_id = $imageable_id;
            $Image->imageable_type = $imageable_type;
            $Image->save();
            return $request->file($inputname)->storeAs($foldername, $filename, $disk);
        }

        return null;
    }



    //For Vacation
    public function verifyAndStoreFile(Request $request, $inputname, $foldername, $disk, $imageable_id, $imageable_type)
    {

        if ($request->hasFile($inputname)) {

            // Check img
            if (!$request->file($inputname)->isValid()) {
                // flash('Invalid Image!')->error()->important();
                session()->flash('message', 'Invalid Image!');
                return redirect()->back()->withInput();
            }

            $photo = $request->file($inputname);
            $name = Str::slug($request->input('type'));
            $filename = $name . time() . '_' . rand(1000, 9999) . '.' . $photo->getClientOriginalExtension();

            // insert Image
            $Image = new Image();
            $Image->filename = $filename;
            $Image->imageable_id = $imageable_id;
            $Image->imageable_type = $imageable_type;
            $Image->save();
            return $request->file($inputname)->storeAs($foldername, $filename, $disk);
        }

        return null;
    }


    public function verifyAndStoreMultiImages(Request $request, $inputname, $foldername, $disk, $imageable_id, $imageable_type)
{
    // التحقق من وجود ملف بالاسم المحدد
    if ($request->hasFile($inputname)) {
        // حلقة للتعامل مع كل صورة
        foreach ($request->file($inputname) as $photo) {
            // Check img
            if (!$photo->isValid()) {
                session()->flash('message', 'Invalid Image!');
                return redirect()->back()->withInput();
            }

            // إعداد اسم الملف
            $name = Str::slug($request->input('title')); // استخدام عنوان المنتج بدلاً من النوع
            $filename = $name . '_' . time() . '_' . rand(1000, 9999) . '.' . $photo->getClientOriginalExtension();

            // إدخال الصورة في قاعدة البيانات
            $Image = new Image();
            $Image->filename = $filename;
            $Image->imageable_id = $imageable_id;
            $Image->imageable_type = $imageable_type;
            $Image->save();

            // رفع الصورة
            $photo->storeAs($foldername, $filename, $disk);
        }
    }

    return null;
}



    public function Delete_attachment($disk, $path, $imageId)
    {
        // حذف الصورة من التخزين
        if (Storage::disk($disk)->exists($path)) {
            Storage::disk($disk)->delete($path);
        }

        // حذف سجل الصورة من قاعدة البيانات
        Image::where('id', $imageId)->delete();
    }
}


    // public function verifyAndStoreImageForeach($varforeach , $foldername , $disk, $imageable_id, $imageable_type) {

    //     // insert Image
    //     $Image = new Image();
    //     $Image->filename = $varforeach->getClientOriginalName();
    //     $Image->imageable_id = $imageable_id;
    //     $Image->imageable_type = $imageable_type;
    //     $Image->save();
    //     return $varforeach->storeAs($foldername, $varforeach->getClientOriginalName(), $disk);
    // }