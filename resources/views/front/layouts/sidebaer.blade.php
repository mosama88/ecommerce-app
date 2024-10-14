@php
    use App\Models\SubCategory;
    use App\Models\Category;

    $othet['sub_categories'] = SubCategory::select('id', 'name', 'category_id')->get();
    $othet['categories'] = Category::select('id', 'name')->get();
@endphp
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="sidebar-overlay" onclick="closeNav()"></a>
    <nav>
        <div onclick="closeNav()">
            <div class="sidebar-back text-start"><i class="fa fa-angle-left pe-2" aria-hidden="true"></i> Back</div>
        </div>

        <ul id="sub-menu" class="sm pixelstrap sm-vertical">
    @foreach ($othet['sub_categories'] as $sub_cat)
    @foreach ($othet['categories'] as $cat)
        <li>
            <a value="{{ $cat->id }}" href="#">{{ $cat->name }}</a>
            <ul class="mega-menu clothing-menu">
                <li>
                    <div class="row m-0">
                        <div class="col-xl-4">
                            <div class="link-section">
                                <ul>
                                    <li>
                                        <a value="{{ $cat->id }}" href="#">{{ $sub_cat['name'] }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
    @endforeach
    @endforeach
</ul>

    </nav>
</div>
