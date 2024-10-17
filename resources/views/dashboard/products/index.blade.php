@extends('dashboard.layouts.master')
@section('title', 'المنتجات')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ URL::asset('dashboard/assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />

    <style>
        .product-image {
            height: 180px;
            /* تحديد الارتفاع */
            width: 180px;
            /* العرض تلقائي للحفاظ على نسبة العرض إلى الارتفاع */
            object-fit: cover;
            /* يجعل الصورة تغطي المساحة المحددة دون تشويه */
            /* يمكنك إضافة زوايا دائرية إذا أردت */
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    جدول المنتجات</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="mb-3 mb-xl-0">
                <a class=" btn btn-primary btn-block" href="{{ route('dashboard.products.create') }}">أضافة منتج جديد</a>

            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection


@section('content')
    @include('dashboard.messages_alert')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-3 col-md-12 mb-3 mb-md-0">
            <div class="card">
                <div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">Category</div>
                <div class="card-body pb-0">
                    <div class="form-group">
                        <label class="form-label">Mens</label>
                        <select name="beast" id="select-beast" class="form-control  nice-select  custom-select">
                            <option value="0">--Select--</option>
                            <option value="1">Foot wear</option>
                            <option value="2">Top wear</option>
                            <option value="3">Bootom wear</option>
                            <option value="4">Men's Groming</option>
                            <option value="5">Accessories</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">Women</label>
                        <select name="beast" id="select-beast1" class="form-control  nice-select  custom-select">
                            <option value="0">--Select--</option>
                            <option value="1">Western wear</option>
                            <option value="2">Foot wear</option>
                            <option value="3">Top wear</option>
                            <option value="4">Bootom wear</option>
                            <option value="5">Beuty Groming</option>
                            <option value="6">Accessories</option>
                            <option value="7">jewellery</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">Baby & Kids</label>
                        <select name="beast" id="select-beast2" class="form-control  nice-select  custom-select">
                            <option value="0">--Select--</option>
                            <option value="1">Boys clothing</option>
                            <option value="2">girls Clothing</option>
                            <option value="3">Toys</option>
                            <option value="4">Baby Care</option>
                            <option value="5">Kids footwear</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">Electronics</label>
                        <select name="beast" id="select-beast3" class="form-control  nice-select  custom-select">
                            <option value="0">--Select--</option>
                            <option value="1">Mobiles</option>
                            <option value="2">Laptops</option>
                            <option value="3">Gaming & Accessories</option>
                            <option value="4">Health care Appliances</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">Sport,Books & More </label>
                        <select name="beast" id="select-beast4" class="form-control  nice-select  custom-select">
                            <option value="0">--Select--</option>
                            <option value="1">Stationery</option>
                            <option value="2">Books</option>
                            <option value="3">Gaming</option>
                            <option value="4">Music</option>
                            <option value="5">Exercise & fitness</option>
                        </select>
                    </div>
                </div>
                <div class="card-header border-bottom border-top pt-3 pb-3 mb-0 font-weight-bold text-uppercase">Filter
                </div>
                <div class="card-body">
                    <form role="form product-form">
                        <div class="form-group">
                            <label>Brand</label>
                            <select class="form-control nice-select">
                                <option>Wallmart</option>
                                <option>Catseye</option>
                                <option>Moonsoon</option>
                                <option>Textmart</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control nice-select">
                                <option>Small</option>
                                <option>Medium</option>
                                <option>Large</option>
                                <option>Extra Large</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="card-header border-bottom border-top pt-3 pb-3 mb-0 font-weight-bold text-uppercase">Rating
                </div>
                <div class="py-2 px-3">
                    <label class="p-1 mt-2 d-flex align-items-center">
                        <span class="check-box mb-0">
                            <span class="ckbox"><input checked="" type="checkbox"><span></span></span>
                        </span>
                        <span class="ml-3 tx-16 my-auto">
                            <i class="ion ion-md-star  text-warning"></i>
                            <i class="ion ion-md-star  text-warning"></i>
                            <i class="ion ion-md-star  text-warning"></i>
                            <i class="ion ion-md-star  text-warning"></i>
                            <i class="ion ion-md-star  text-warning"></i>
                        </span>
                    </label>
                    <label class="p-1 mt-2 d-flex align-items-center">
                        <span class="check-box mb-0">
                            <span class="ckbox"><input checked="" type="checkbox"><span></span></span>
                        </span>
                        <span class="ml-3 tx-16 my-auto">
                            <i class="ion ion-md-star  text-warning"></i>
                            <i class="ion ion-md-star  text-warning"></i>
                            <i class="ion ion-md-star  text-warning"></i>
                            <i class="ion ion-md-star  text-warning"></i>
                        </span>
                    </label>
                    <label class="p-1 mt-2 d-flex align-items-center">
                        <span class="check-box mb-0">
                            <span class="ckbox"><input checked="" type="checkbox"><span></span></span>
                        </span>
                        <span class="ml-3 tx-16 my-auto">
                            <i class="ion ion-md-star  text-warning"></i>
                            <i class="ion ion-md-star  text-warning"></i>
                            <i class="ion ion-md-star  text-warning"></i>
                        </span>
                    </label>
                    <label class="p-1 mt-2 d-flex align-items-center">
                        <span class="checkbox mb-0">
                            <span class="check-box">
                                <span class="ckbox"><input type="checkbox"><span></span></span>
                            </span>
                        </span>
                        <span class="ml-3 tx-16 my-auto">
                            <i class="ion ion-md-star  text-warning"></i>
                            <i class="ion ion-md-star  text-warning"></i>
                        </span>
                    </label>
                    <label class="p-1 mt-2 d-flex align-items-center">
                        <span class="checkbox mb-0">
                            <span class="check-box">
                                <span class="ckbox"><input type="checkbox"><span></span></span>
                            </span>
                        </span>
                        <span class="ml-3 tx-16 my-auto">
                            <i class="ion ion-md-star  text-warning"></i>
                        </span>
                    </label>
                    <button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit">Filter</button>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12">
            <div class="card">
                <div class="card-body p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search ...">
                        <span class="input-group-append">
                            <button class="btn btn-primary" type="button">Search</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row row-sm">
                @if (@!empty($data) && @isset($data))
                    @foreach ($data as $info)
                        <div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="pro-img-box">
                                        <div class="d-flex product-sale">
                                            <div class="badge bg-pink">جديد</div>
                                            <i class="mdi mdi-heart-outline ml-auto wishlist"></i>
                                        </div>

                                        @if ($info->image)
                                            <img class="product-image"
                                                src="{{ asset('uploads/products/photo/' . $info->image->filename) }}"
                                                alt="product-image">
                                        @else
                                            <img class="product-image"
                                                src="{{ URL::asset('dashboard/assets/img/ecommerce/01.jpg') }}"
                                                alt="product-image">
                                        @endif

                                        <a href="{{ route('dashboard.products.edit', $info->id) }}" class="adtocart"> <i
                                                class="las la-shopping-cart "></i>
                                        </a>
                                    </div>
                                    <div class="text-center pt-3">
                                        <h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{ $info['title'] }}</h3>
                                        <span class="tx-15 ml-auto">
                                            <i class="ion ion-md-star text-warning"></i>
                                            <i class="ion ion-md-star text-warning"></i>
                                            <i class="ion ion-md-star text-warning"></i>
                                            <i class="ion ion-md-star-half text-warning"></i>
                                            <i class="ion ion-md-star-outline text-warning"></i>
                                        </span>
                                        <h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger"> جنية
                                            {{ $info['after_discount'] }} <span
                                                class="text-secondary font-weight-normal tx-13 ml-1 prev-price">جنية
                                                {{ $info['price'] }}</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    عفوآ لا توجد بيانات
                @endif



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
    <!-- Internal Nice-select js-->
    <script src="{{ URL::asset('dashboard/assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>
@endsection
