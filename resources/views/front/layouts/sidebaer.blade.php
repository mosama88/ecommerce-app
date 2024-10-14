@php
    use App\Models\SubCategory;
    use App\Models\Category;

       $othet['categories'] = Category::with('subCategories:id,name,category_id')->get();

@endphp
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="sidebar-overlay" onclick="closeNav()"></a>
    <nav>
        <div onclick="closeNav()">
            <div class="sidebar-back text-start"><i class="fa fa-angle-left pe-2" aria-hidden="true"></i> Back</div>
        </div>

       <ul id="sub-menu" class="sm pixelstrap sm-vertical">
    @foreach ($othet['categories'] as $category)
        <li>
            <a href="#">{{ $category->name }}</a>
            @if($category->subCategories->isNotEmpty())
                <ul class="mega-menu clothing-menu">
                    @foreach ($category->subCategories as $sub_cat)
                        <li>
                            <div class="row m-0">
                                <div class="col-xl-4">
                                    <div class="link-section">
                                        <ul>
                                            <li>
                                                <a href="{{ $sub_cat->id }}">{{ $sub_cat->name }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>


    </nav>
</div>
