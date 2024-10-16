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
            <div class="card  box-shadow-0 ">
                <div class="card-header text-center">
                    <h4 class="card-title mb-1">أضف منتج</h4>
                    {{-- <p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p> --}}
                </div>
                <div class="card-body pt-0">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="exampleInputTtile">عنوان المنتج</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        id="exampleInputTtile" placeholder="أدخل وصف المنتج">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">وصف المنتج</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="اكتب وصف دقيق عن المنتج" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-4 mb-3">
                                <label for="exampleInputprice">سعر المنتج</label>
                                <input type="text" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" name="price"
                                    id="price" class="form-control" id="exampleInputprice"
                                    placeholder="أدخل سعر المنتج">
                            </div>
                            <div class="form-group col-4 mb-3">
                                <label for="exampleInputdiscount_percentage">نسبة الخصم %</label>
                                <input type="number" name="discount_percentage" value="0" id="discount_percentage"
                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'');" class="form-control"
                                    id="exampleInputdiscount_percentage">
                            </div>
                            <div class="form-group col-4 mb-3">
                                <label for="exampleInputafter_discount">السعر بعد الخصم</label>
                                <input type="text" name="after_discount" id="after_discount" value="0"
                                    class="form-control" oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                                    id="exampleInputafter_discount">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6 mb-3">
                                <label for="exampleInputqty">عدد المنتج</label>
                                <input type="text" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" name="qty"
                                    id="qty" class="form-control" id="exampleInputqty" placeholder="أدخل عدد المنتج">
                            </div>
                            <div class="form-group col-6 mb-3">
                                <label for="exampleInputsku">رقم المنتج</label>
                                <input type="text" name="sku" id="sku" class="form-control"
                                    id="exampleInputsku" placeholder="أدخل رقم المنتج">
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-6 mb-3">
                                <label for="">المنتج الفرعى</label>
                                <select name="sub_category_id" id="sub_category_id" class="form-control select2">
                                    <!--placeholder-->
                                    <option value="" selected>أختر المنتج الفرعى</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>

                            <div class="form-group col-6 mb-3">
                                <label for="">المقاس</label>
                                <select name="size_id" id="size_id" class="form-control select2">
                                    <!--placeholder-->
                                    <option value="" selected>أختر المقاس</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>


                            <div class="form-group col-6 mb-3">
                                <label for="">اللون</label>
                                <select name="color_id" id="color_id" class="form-control select2">
                                    <!--placeholder-->
                                    <option value="" selected>أختر اللون</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>


                            <div class="form-group col-6 mb-3">
                                <label for="">العلامة التجارية</label>
                                <select name="brand_id" id="brand_id" class="form-control select2">
                                    <!--placeholder-->
                                    <option value="" selected>أختر العلامة التجارية</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-12 mb-3">
                            <label for="">رفع صور المنتج</label>
                            <input id="demo" type="file" name="files"
                                accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" multiple>
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
@endsection
