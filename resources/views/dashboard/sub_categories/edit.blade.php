    <!-- Modal effects -->
    <div class="modal fade edit-category" id="edit{{ $info['id'] }}">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">تعديل فئة فرعية جديدة</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="ajaxFormSubCategory" action="{{ route('dashboard.sub_categories.update', $info['id']) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-12 mb-3">
                                <label for="">أسم الفئة الفرعية</label>
                                <input type="text" name="name" id="name" value="{{ $info['name'] }}"
                                    class="form-control">
                                <span class="text-danger" id="nameError"></span> <!-- مكان عرض الخطأ -->
                            </div>

                            {{-- category_id Input --}}
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label> أختيار الفئة</label> <span class="tx-danger">*</span>
                                    <select name="category_id" id="category_id" class="form-control select2"
                                        style="width:100%">

                                        <option value="" selected>-- أختر الفرع --</option>
                                        @if (@isset($other['categories']) && !@empty($other['categories']))
                                            @foreach ($other['categories'] as $cat)
                                                <option @if (old('category_id',$info->category_id) == $cat->id) selected="selected" @endif
                                                    value="{{ $cat->id }}">
                                                    {{ $cat->name }} </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div id="category_id-error" class="text-danger error-message d-none">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label for="">وصف الفئة الفرعية</label>
                                <textarea name="description" id="description" class="form-control" cols="30" rows="3">{{ $info['description'] }}</textarea>
                                <span class="text-danger" id="descriptionError"></span> <!-- مكان عرض الخطأ -->
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" type="submit">تأكيد البيانات</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal effects-->
