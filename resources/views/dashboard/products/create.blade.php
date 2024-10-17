@extends('dashboard.layouts.master')
@section('title', 'أضافة منتج جديد')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('dashboard/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('dashboard/assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet"
        type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('dashboard/assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('dashboard/assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('dashboard/assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">

    <style>
        #imagePreview img {
            max-width: 100px;
            /* تحديد حجم الصورة في المعاينة */
            margin-right: 10px;
            /* إضافة مسافة بين الصور */
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">أضافة منتج جديد</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    <a class="" style="color:#0262AC" href="{{ route('dashboard.products.index') }}">جدول المنتجات
                        <i class="fas fa-backward"></i> </a>
                </span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            {{-- add --}}
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('dashboard.messages_alert')


    <div class="row">
        {{-- Form Products --}}

        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0 ">
                <div class="card-header text-center">
                    <h4 class="card-title mb-1">أضف منتج</h4>
                    {{-- <p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p> --}}
                </div>
                <div class="card-body pt-0">
                    <form action="{{ route('dashboard.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="exampleInputTtile">عنوان المنتج</label>
                                    <input type="text" value="{{ old('title') }}" name="title" id="title"
                                        class="form-control" id="exampleInputTtile" placeholder="أدخل وصف المنتج">
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">وصف المنتج</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="اكتب وصف دقيق عن المنتج" rows="3">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-4 mb-3">
                                <label for="exampleInputprice">سعر المنتج</label>
                                <input value="{{ old('price') }}" type="text"
                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'');" name="price" id="price"
                                    class="form-control" id="exampleInputprice" placeholder="أدخل سعر المنتج">
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-4 mb-3">
                                <label for="exampleInputdiscount_percentage">نسبة الخصم %</label>
                                <input value="{{ old('discount_percentage') }}" type="number" name="discount_percentage"
                                    value="0" id="discount_percentage"
                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'');" class="form-control"
                                    id="exampleInputdiscount_percentage">
                                @error('discount_percentage')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-4 mb-3 related_Price">
                                <label for="exampleInputafter_discount">السعر بعد الخصم</label>
                                <input readonly value="{{ old('after_discount') }}" type="text" name="after_discount"
                                    id="after_discount" value="0" class="form-control" id="exampleInputafter_discount">
                                @error('after_discount')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6 mb-3">
                                <label for="exampleInputqty">عدد المنتج</label>
                                <input value="{{ old('qty') }}" type="text"
                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'');" name="qty" id="qty"
                                    class="form-control" id="exampleInputqty" placeholder="أدخل عدد المنتج">
                                @error('qty')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6 mb-3">
                                <label for="exampleInputsku">رقم المنتج</label>
                                <input value="{{ old('sku') }}" type="text" name="sku" id="sku"
                                    class="form-control" id="exampleInputsku" placeholder="أدخل رقم المنتج">
                                @error('sku')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-6 mb-3">
                                <label for="">المنتج الفرعى</label>
                                <select name="sub_category_id" id="sub_category_id" class="form-control select2">
                                    <option value="" selected>أختر المنتج الفرعى</option>
                                    @if (!@empty($other['sub_categories']) && @isset($other['sub_categories']))
                                        @foreach ($other['sub_categories'] as $sub_cat)
                                            <option value="{{ $sub_cat['id'] }}"
                                                {{ old('sub_category_id') == $sub_cat->id ? 'selected' : '' }}>
                                                {{ $sub_cat['name'] }} => ( {{ $sub_cat->category->name }} )</option>
                                        @endforeach
                                    @else
                                        لا توجد بيانات
                                    @endif
                                </select>
                                @error('sub_category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-6 mb-3">
                                <label for="">المقاس</label>
                                <select multiple="multiple" name="size_id" id="size_id" class="testselect2 SumoUnder">
                                    <!--placeholder-->
                                    <option value="" disabled>أختر المقاس</option>
                                    @if (!@empty($other['sizes']) && @isset($other['sizes']))
                                        @foreach ($other['sizes'] as $size)
                                            <option value="{{ $size['id'] }}"
                                                {{ old('size_id') == $size->id ? 'selected' : '' }}>{{ $size['name'] }}
                                            </option>
                                        @endforeach
                                    @else
                                        لا توجد بيانات
                                    @endif
                                </select>
                                @error('size_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-6 mb-3">
                                <label for="">اللون</label>
                                <select multiple="multiple" name="color_id" id="color_id"
                                    class="testselect2 SumoUnder">
                                    <!--placeholder-->
                                    <option value="" disabled>أختر اللون</option>
                                    @if (!@empty($other['colors']) && @isset($other['colors']))
                                        @foreach ($other['colors'] as $color)
                                            <option value="{{ $color['id'] }}"
                                                {{ old('size_id') == $color->id ? 'selected' : '' }}>{{ $color['name'] }}
                                            </option>
                                        @endforeach
                                    @else
                                        لا توجد بيانات
                                    @endif
                                </select>
                                @error('color_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-6 mb-3">
                                <label for="">العلامة التجارية</label>
                                <select name="brand_id" id="brand_id" class="form-control select2">
                                    <!--placeholder-->
                                    <option value="" selected>أختر العلامة التجارية</option>
                                    @if (!@empty($other['brands']) && @isset($other['brands']))
                                        @foreach ($other['brands'] as $brand)
                                            <option value="{{ $brand['id'] }}"
                                                {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand['name'] }}
                                            </option>
                                        @endforeach
                                    @else
                                        لا توجد بيانات
                                    @endif
                                </select>
                                @error('brand_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-12 mb-3">
                            <label for="">رفع صور المنتج</label>
                            <input id="fileInput" onchange="loadFiles(event)" class="dropify" type="file"
                                name="photos[]" accept=".jpg, .png, image/jpeg, image/png" multiple>
                            <div id="imagePreview" class="my-3"></div>
                            @error('photos')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group text-center col-12 mb-3">
                            <button type="submit" class="btn btn-primary btn-md mt-3 mb-0">أضافة المنتج</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('dashboard/assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('dashboard/assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('dashboard/assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('dashboard/assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('dashboard/assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('dashboard/assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!-- Internal TelephoneInput js-->
    <script src="{{ URL::asset('dashboard/assets/plugins/telephoneinput/telephoneinput.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/telephoneinput/inttelephoneinput.js') }}"></script>

    <script>
        $(document).on('input', '#price, #discount_percentage', function(e) {
            var price = parseFloat($("#price").val()) || 0; // تحويل السعر إلى float أو استخدام 0 كقيمة افتراضية
            var discount_percentage = parseFloat($("#discount_percentage").val()) ||
                0; // تحويل نسبة الخصم إلى float أو استخدام 0 كقيمة افتراضية

            if (discount_percentage < 0) {
                $("#discount_percentage").val(0); // منع نسبة الخصم السالبة
                discount_percentage = 0;
            }

            if (discount_percentage > 100) {
                $("#discount_percentage").val(100); // منع تجاوز نسبة الخصم 100%
                discount_percentage = 100;
            }

            // حساب السعر بعد الخصم
            var after_discount = price * (1 - (discount_percentage / 100));

            // عرض السعر بعد الخصم
            $("#after_discount").val(after_discount.toFixed(2));
        });
    </script>

    {{-- photo --}}
    <script>
        function loadFiles(event) {
            const files = event.target.files; // الحصول على جميع الملفات المرفوعة
            const previewContainer = document.getElementById('imagePreview');
            previewContainer.innerHTML = ''; // إعادة تعيين محتوى المعاينة

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result; // تعيين مصدر الصورة
                    img.classList.add('rounded-circle', 'avatar-xl', 'my-2'); // إضافة الفئات المطلوبة
                    previewContainer.appendChild(img); // إضافة الصورة إلى حاوية المعاينة
                };

                reader.readAsDataURL(file); // قراءة الصورة كـ Data URL
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify(); // تهيئة Dropify
        });
    </script>

@endsection
{{-- after_discount = price*discount_percentage --}}
