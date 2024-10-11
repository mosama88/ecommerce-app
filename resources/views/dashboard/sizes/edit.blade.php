    <!-- Modal effects -->
    <div class="modal fade edit-color" id="edit{{ $info['id'] }}">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">أضافة مقاس جديد</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="ajaxFormSizeUpdate" action="{{ route('dashboard.sizes.update', $info['id']) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="">أسم المقاس</label>
                                <input type="text" name="name" id="name" value="{{ $info['name'] }}"
                                    class="form-control">
                                <span class="text-danger" id="nameError"></span> <!-- مكان عرض الخطأ -->
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
