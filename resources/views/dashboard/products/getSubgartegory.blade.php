<label for="">الفئة الفرعية</label>
<select name="sub_category_id" id="sub_category_id" class="form-control select2">
    <option value="" selected>أختر الفئة الفرعية</option>
    @if (!@empty($other['sub_categories']) && @isset($other['sub_categories']))
        @foreach ($other['sub_categories'] as $sub_cat)
            <option value="{{ $sub_cat['id'] }}" {{ old('sub_category_id') == $sub_cat->id ? 'selected' : '' }}>
                {{ $sub_cat['name'] }} => ( {{ $sub_cat->category->name }} )</option>
        @endforeach
    @else
        لا توجد بيانات
    @endif
</select>
@error('sub_category_id')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<script>
    //Initialize Select2 Elements
    $('.select2').select2({
        theme: 'bootstrap4'
    });
</script>
@endsection
