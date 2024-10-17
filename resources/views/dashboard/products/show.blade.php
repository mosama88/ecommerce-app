@extends('dashboard.layouts.master')
@section('title', 'تفاصيل المنتج')
@section('css')
    <!--Internal  Nice-select css  -->
    <link href="{{ URL::asset('dashboard/assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('dashboard/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">تفاصيل المنتج </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    <a class="" style="color:#0262AC" href="{{ route('dashboard.products.index') }}">جدول المنتجات
                        <i class="fas fa-backward"></i> </a>
                </span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="mb-3 mb-xl-0">
                <a class=" btn btn-primary btn-block" href="{{ route('dashboard.products.edit', $info['id']) }}">تعديل
                    المنتج
                </a>

            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection


@include('dashboard.messages_alert')
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body h-100">
                    <div class="row row-sm ">
                        <div class=" col-xl-5 col-lg-12 col-md-12">
                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1">
                                    @if ($info->images->isNotEmpty())
                                        <img id="main-image"
                                            src="{{ asset('uploads/products/photo/' . $info->images[0]->filename) }}"
                                            alt="">
                                    @else
                                        <img src="{{ URL::asset('dashboard/assets/img/ecommerce/shirt-3.png') }}"
                                            alt="">
                                    @endif
                                </div>
                            </div>

                            <ul class="preview-thumbnail nav nav-tabs">
                                @foreach ($info->images as $image)
                                    <li class="{{ $loop->first ? 'active' : '' }}">
                                        <a data-target="#pic-{{ $loop->index + 1 }}" data-toggle="tab" class="thumbnail"
                                            data-img="{{ asset('uploads/products/photo/' . $image->filename) }}">
                                            <img src="{{ asset('uploads/products/photo/' . $image->filename) }}"
                                                alt="image" />
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                            <h4 class="product-title mb-1">{{ $info['title'] }}</h4>
                            <p class="text-muted tx-13 mb-1">Men red & Grey Checked Casual Shirt</p>
                            <div class="rating mb-1">
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star text-muted"></span>
                                    <span class="fa fa-star text-muted"></span>
                                </div>
                                <span class="review-no">41 reviews</span>
                            </div>
                            <h6 class="price">السعر الحالي: <span class="h3 ml-2">
                                    {{ $info['after_discount'] * 1 }} جنية </span>
                            </h6>
                            <p class="product-description">{{ $info['mini_description'] }}</p>
                            <p class="vote"><strong>{{ $info['discount_percentage'] * 1 }}%</strong> من المشترين استمتعوا
                                بهذا المنتج!
                                <strong>(87
                                    الاصوات)</strong>
                            </p>
                            <div class="sizes d-flex">المقاسات:
                                @foreach ($other['sizes'] as $size)
                                    <span class="size d-flex" data-toggle="tooltip" title="{{ $size->name }}">
                                        <label class="rdiobox mb-0">
                                            <input value="{{ $size->id }}" name="rdio" type="radio"
                                                {{ old('color') == $size->id ? 'checked' : '' }}>
                                            <span class="font-weight-bold">{{ $size->name }}</span>
                                        </label>
                                    </span>
                                @endforeach
                            </div>
                            <div class="colors d-flex mr-3 mt-2">
                                <span class="mt-2">الألوان:</span>
                                <div class="row gutters-xs mr-4">
                                    @foreach ($other['colors'] as $color)
                                        <div class="mr-2">
                                            <label class="colorinput">
                                                <input name="color" type="radio" value="{{ $color->id }}"
                                                    class="colorinput-input"
                                                    {{ old('color') == $color->id ? 'checked' : '' }}>

                                                <!-- عرض اللون بناءً على الكود الخاص باللون -->
                                                <span class="colorinput-color"
                                                    style="background-color: {{ $color->hex_code }};">

                                                </span>
                                            </label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="col-6">
                                التفاصيل: {{ $info['description'] }}
                            </div>
                            <div>

                            </div>
                            <div class="d-flex  mt-2">
                                <div class="mt-2 product-title">Quantity:</div>
                                <div class="d-flex ml-2">
                                    <ul class=" mb-0 qunatity-list">
                                        <li>
                                            <div class="form-group">
                                                <select name="quantity" id="select-countries17"
                                                    class="form-control nice-select wd-100">
                                                    <option value="1" selected="">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="action">
                                <button class="add-to-cart btn btn-danger" type="button">ADD TO WISHLIST</button>
                                <button class="add-to-cart btn btn-success" type="button">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

    <!-- row -->
    <div class="row">
        <div class="col-lg-3">
            <div class="card item-card">
                <div class="card-body pb-0 h-100">
                    <div class="text-center">
                        <img src="{{ URL::asset('dashboard/assets/img/ecommerce/01.jpg') }}" alt="img"
                            class="img-fluid">
                    </div>
                    <div class="card-body cardbody relative">
                        <div class="cardtitle">
                            <span>Items</span>
                            <a>Sport shoes</a>
                        </div>
                        <div class="cardprice">
                            <span class="type--strikethrough">$999</span>
                            <span>$799</span>
                        </div>
                    </div>
                </div>
                <div class="text-center border-top pt-3 pb-3 pl-2 pr-2 ">
                    <a href="#" class="btn btn-primary"> View More</a>
                    <a href="#" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card item-card">
                <div class="card-body pb-0 h-100">
                    <div class="text-center">
                        <img src="{{ URL::asset('dashboard/assets/img/ecommerce/04.jpg') }}" alt="img"
                            class="img-fluid">
                    </div>
                    <div class="card-body cardbody relative">
                        <div class="cardtitle">
                            <span>Fashion</span>
                            <a>Mens Shoes</a>
                        </div>
                        <div class="cardprice">
                            <span class="type--strikethrough">$999</span>
                            <span>$799</span>
                        </div>
                    </div>
                </div>
                <div class="text-center border-top pt-3 pb-3 pl-2 pr-2 ">
                    <a href="#" class="btn btn-primary"> View More</a>
                    <a href="#" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card item-card">
                <div class="card-body pb-0 h-100">
                    <div class="text-center">
                        <img src="{{ URL::asset('dashboard/assets/img/ecommerce/07.jpg') }}" alt="img"
                            class="img-fluid">
                    </div>
                    <div class="card-body cardbody relative ">
                        <div class="cardtitle">
                            <span>Accessories</span>
                            <a>Metal Watch</a>
                        </div>
                        <div class="cardprice">
                            <span class="type--strikethrough">$999</span>
                            <span>$799</span>
                        </div>
                    </div>
                </div>
                <div class="text-center border-top pt-3 pb-3 pl-2 pr-2 ">
                    <a href="#" class="btn btn-primary"> View More</a>
                    <a href="#" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card item-card">
                <div class="card-body pb-0 h-100">
                    <div class="text-center">
                        <img src="{{ URL::asset('dashboard/assets/img/ecommerce/08.jpg') }}" alt="img"
                            class="img-fluid">
                    </div>
                    <div class="card-body cardbody relative">
                        <div class="cardtitle">
                            <span>Accessories</span>
                            <a>Metal Watch</a>
                        </div>
                        <div class="cardprice">
                            <span class="type--strikethrough">$999</span>
                            <span>$799</span>
                        </div>
                    </div>
                </div>
                <div class="text-center border-top pt-3 pb-3 pl-2 pr-2 ">
                    <a href="#" class="btn btn-primary"> View More</a>
                    <a href="#" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12 col-xl-4 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="feature2">
                        <i class="mdi mdi-airplane-takeoff bg-purple ht-50 wd-50 text-center brround text-white"></i>
                    </div>
                    <h5 class="mb-2 tx-16">Free Shipping</h5>
                    <span class="fs-14 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua domenus orioneu.</span>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-4 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="feature2">
                        <i class="mdi mdi-headset bg-pink  ht-50 wd-50 text-center brround text-white"></i>
                    </div>
                    <h5 class="mb-2 tx-16">Customer Support</h5>
                    <span class="fs-14 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua domenus orioneu.</span>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-4 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="feature2">
                        <i class="mdi mdi-refresh bg-teal ht-50 wd-50 text-center brround text-white"></i>
                    </div>
                    <div class="icon-return"></div>
                    <h5 class="mb-2  tx-16">30 days money back</h5>
                    <span class="fs-14 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua domenus orioneu.</span>
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
    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('dashboard/assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/js/select2.js') }}"></script>
    <!-- Internal Nice-select js-->
    <script src="{{ URL::asset('dashboard/assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.thumbnail').on('click', function(e) {
                e.preventDefault();
                var imgSrc = $(this).data('img'); // الحصول على مسار الصورة من الـ data attribute
                $('#main-image').attr('src', imgSrc); // تحديث الصورة الكبيرة
            });
        });
    </script>
@endsection
