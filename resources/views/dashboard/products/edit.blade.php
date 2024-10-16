@extends('dashboard.layouts.master')
@section('title', 'تعديل منتج جديد')
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
                <h4 class="content-title mb-0 my-auto">تعديل منتج جديد</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
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
                    <h4 class="card-title mb-1">تعديل المنتج</h4>
                    {{-- <p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p> --}}
                </div>
                <div class="card-body pt-0">
                    <form action="{{ route('dashboard.products.update', $info['id']) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="exampleInputTtile">عنوان المنتج</label>
                                    <input type="text" value="{{ old('title', $info['title']) }}" name="title"
                                        id="title" class="form-control" id="exampleInputTtile"
                                        placeholder="أدخل وصف المنتج">
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">وصف مختصر</label>
                                    <textarea class="form-control" name="mini_description" id="mini_description" placeholder="اكتب وصف مختصر عن المنتج"
                                        rows="3">{{ old('mini_description', $info['mini_description']) }}</textarea>
                                    @error('mini_description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="">وصف المنتج</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="اكتب وصف دقيق عن المنتج" rows="3">{{ old('description', $info['description']) }}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-4 mb-3">
                                <label for="exampleInputprice">سعر المنتج</label>
                                <input value="{{ old('price', $info['price']) }}" type="text"
                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'');" name="price" id="price"
                                    class="form-control" id="exampleInputprice" placeholder="أدخل سعر المنتج">
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-4 mb-3">
                                <label for="exampleInputdiscount_percentage">نسبة الخصم %</label>
                                <input value="{{ old('discount_percentage', $info['discount_percentage']) }}"
                                    type="number" name="discount_percentage" value="0" id="discount_percentage"
                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'');" class="form-control"
                                    id="exampleInputdiscount_percentage">
                                @error('discount_percentage')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-4 mb-3 related_Price">
                                <label for="exampleInputafter_discount">السعر بعد الخصم</label>
                                <input readonly value="{{ old('after_discount', $info['after_discount']) }}" type="text"
                                    name="after_discount" id="after_discount" value="0" class="form-control"
                                    id="exampleInputafter_discount">
                                @error('after_discount')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6 mb-3">
                                <label for="exampleInputqty">عدد المنتج</label>
                                <input value="{{ old('qty', $info['qty']) }}" type="text"
                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'');" name="qty" id="qty"
                                    class="form-control" id="exampleInputqty" placeholder="أدخل عدد المنتج">
                                @error('qty')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6 mb-3">
                                <label for="exampleInputsku">رقم المنتج</label>
                                <input value="{{ old('sku', $info['sku']) }}" type="text" name="sku"
                                    id="sku" class="form-control" id="exampleInputsku"
                                    placeholder="أدخل رقم المنتج">
                                @error('sku')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-4 mb-3">
                                <label for="">الفئة</label>
                                <select name="category_id" id="category_id" class="form-control select2">
                                    <option value="" selected>أختر الفئة</option>
                                    @if (!@empty($other['categories']) && @isset($other['categories']))
                                        @foreach ($other['categories'] as $cat)
                                            <option value="{{ $cat['id'] }}"
                                                {{ old('sub_category_id') == $cat->id ? 'selected' : '' }}>
                                                {{ $cat['name'] }}</option>
                                        @endforeach
                                    @else
                                        لا توجد بيانات
                                    @endif
                                </select>
                                @error('sub_category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="form-group col-4 mb-3" id="subCategoryDiv">
                                <label for="">الفئة الفرعية</label>
                                <select name="sub_category_id" id="sub_category_id" class="form-control select2">
                                    <option value="" selected>أختر المنتج الفرعى</option>
                                    @if (!@empty($other['sub_categories']) && @isset($other['sub_categories']))
                                        @foreach ($other['sub_categories'] as $sub_cat)
                                            <option value="{{ $sub_cat['id'] }}"
                                                @if (old('sub_category_id', $info['sub_category_id']) == $sub_cat->id) selected="selected" @endif>
                                                {{ $sub_cat['name'] }} </option>
                                        @endforeach
                                    @else
                                        لا توجد بيانات
                                    @endif
                                </select>
                                @error('sub_category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-4 mb-3">
                                <label for="">المقاس</label>
                                <select multiple="multiple" name="size_id[]" id="size_id"
                                    class="testselect2 SumoUnder">
                                    <!--placeholder-->
                                    <option value="" disabled> -- أختر المقاس --</option>
                                    @if (!@empty($other['sizes']) && @isset($other['sizes']))
                                        @foreach ($other['sizes'] as $size)
                                            @foreach ($info->size_product as $key => $sizePro)
                                                @php
                                                    $check[] = $sizePro->id;
                                                @endphp
                                            @endforeach
                                            <option value="{{ $size['id'] }}"
                                                {{ in_array($size->id, $check) ? 'selected' : '' }}>
                                                {{ $size['name'] }}</option>
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
                                <select multiple="multiple" name="color_id[]" id="color_id"
                                    class="testselect2 SumoUnder">
                                    <!--placeholder-->
                                    <option value="" disabled> -- أختر اللون --</option>
                                    @if (!@empty($other['colors']) && @isset($other['colors']))
                                        @foreach ($other['colors'] as $color)
                                            @foreach ($info->color_product as $key => $colorPro)
                                                @php
                                                    $check[] = $colorPro->id;
                                                @endphp
                                            @endforeach
                                            <option value="{{ $color['id'] }}"
                                                {{ in_array($color->id, $check) ? 'selected' : '' }}>
                                                {{ $color['name'] }}</option>
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
                                                @if (old('brand_id', $info['brand_id']) == $brand->id) selected="selected" @endif>
                                                {{ $brand['name'] }}</option>
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

    <script>
        $(document).on('change', '#category_id', function(e) {
            getSubCategory();
        });

        function getSubCategory() {
            var category_id = $("#category_id").val();
            $.ajax({
                url: '{{ route('dashboard.products.getSubCategory') }}',
                type: 'POST',
                dataType: 'json', // استخدام 'json' لتسهيل المعالجة
                data: {
                    "_token": '{{ csrf_token() }}',
                    category_id: category_id
                },
                success: function(data) {
                    var subCategorySelect = $("#sub_category_id");
                    subCategorySelect.empty(); // تفريغ القائمة الحالية
                    subCategorySelect.append(
                        '<option value="" selected>أختر الفئة الفرعية</option>'); // إضافة الخيار الافتراضي

                    // ملء الخيارات الجديدة
                    $.each(data, function(key, value) {
                        subCategorySelect.append('<option value="' + value.id + '">' + value.name +
                            '</option>');
                    });
                },
                error: function() {
                    alert("عفوا لقد حدث خطأ ");
                }
            });
        }
    </script>

@endsection
{{-- after_discount = price*discount_percentage --}}
