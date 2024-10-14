@extends('dashboard.layouts.master')
@section('title', 'الفئة الفرعية')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('dashboard/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('dashboard/assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard/assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('dashboard/assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard/assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفئة الفرعية</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    جدول الفئة الفرعية</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="mb-3 mb-xl-0">
                <a class="modal-effect btn btn-primary btn-block" data-effect="effect-scale" data-toggle="modal"
                    href="#modaldemo8">أضافة فئة فرعية جديدة</a>
                @include('dashboard.sub_categories.create')

            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('dashboard.messages_alert')


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-solid-danger mg-b-0 mb-4" role="alert">
                                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true">&times;</span></button>
                                <strong>حدث خطأ!</strong> {{ $error }}
                            </div>
                        @endforeach
                    @endif
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">جدول الفئة الفرعية</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    {{-- <p class="tx-12 tx-gray-500 mb-2">Example of Valex Simple Table. <a href="">Learn more</a></p> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @php
                            $i = 0;
                        @endphp
                        @if (!@empty($data) and @isset($data))
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">#</th>
                                        <th class="wd-15p border-bottom-0">أسم الفئة الفرعية</th>
                                        <th class="wd-15p border-bottom-0">أسم الفئة</th>
                                        <th class="wd-15p border-bottom-0">وصف الفئة الفرعية</th>
                                        <th class="wd-20p border-bottom-0">أضافة بواسطة</th>
                                        <th class="wd-15p border-bottom-0">تعديل بواسطة</th>
                                        <th class="wd-15p border-bottom-0">العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $info)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $info['name'] }}</td>
                                            <td>{{ $info->category->name }}</td>
                                            <td>{{ $info['description'] }}</td>
                                            <td>{{ $info->createdBy->name }}</td>
                                            <td>
                                                @if ($info->updated_by > 0)
                                                    {{ $info->updatedBy->name }}
                                                @else
                                                    لا يوجد تحديث
                                                @endif
                                            </td>
                                            <td>
                                                <a class="modal-effect btn btn-info btn-sm" data-effect="effect-scale"
                                                    data-toggle="modal" id="edit-color" href="#edit{{ $info['id'] }}"
                                                    type="button"><i class="far fa-edit"></i></a>
                                                <a class="modal-effect btn btn-danger btn-sm" data-effect="effect-scale"
                                                    data-toggle="modal" href="#delete{{ $info['id'] }}" type="button"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </td>
                                            @include('dashboard.sub_categories.edit')
                                            @include('dashboard.sub_categories.delete')
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @else
                            عقوآ لا توجد بيانات
                        @endif

                    </div>
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
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('dashboard/assets/js/table-data.js') }}"></script>


    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('dashboard/assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('dashboard/assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('dashboard/assets/js/modal.js') }}"></script>

    <script>
        $('#modaldemo8').modal({
            backdrop: 'static',
            keyboard: false,
            show: false
        });

        $('.edit-color').modal({
            backdrop: 'static',
            keyboard: false,
            show: false,
        });
    </script>


    <script>
        $('#ajaxFormSubCategory').on('submit', function(e) {
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: formData,
                success: function(response) {
                    if (response.success) {
                        // إخفاء الـ modal فقط عند نجاح العملية
                        $('#modaldemo8').modal('hide');

                        // عرض رسالة النجاح
                        Swal.fire({
                            icon: 'success',
                            title: 'تم أضافة الفئة الفرعية بنجاح',
                            text: response.success,
                            timer: 2000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });

                        // إعادة تحميل الصفحة بعد انتهاء العملية مباشرة
                        setTimeout(function() {
                            location.reload(); // إعادة تحميل الصفحة بعد وقت محدد
                        }, 1000); // 1000 مللي ثانية (1 ثانية)
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        if (errors.category_id) {
                            $('#category_idError').text(errors.category_id[0]);
                        }
                        elseif(errors.category_id) {
                            $('#category_idError').text(errors.category_id[0]);

                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'حدث خطأ',
                            text: 'عفوا حدث خطأ ما. الرجاء المحاولة مرة أخرى.'
                        });
                    }
                }
            });
        });
    </script>

@endsection
