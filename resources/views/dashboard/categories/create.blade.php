    <!-- Modal effects -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">أضافة فئة جديدة</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="ajaxFormCategory" action="{{ route('dashboard.categories.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12 mb-3">
                                <label for="">أسم الفئة</label>
                                <input type="text" name="name" id="name" class="form-control">
                                <span class="text-danger" id="nameError"></span> <!-- مكان عرض الخطأ -->
                            </div>
                            <div class="form-group col-12">
                                <label for="">وصف الفئة</label>
                                <textarea name="description" id="description" class="form-control" cols="30" rows="3"></textarea>
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
