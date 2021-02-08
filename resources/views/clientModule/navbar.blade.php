<!-- Category -->
<div class="card sidebar-menu mb-4">
    <div class="card-header">
        <h3 class="h4 card-title">Categories</h3>
    </div>
    <div class="card-body">
        <ul class="nav nav-pills flex-column category-menu">

            @foreach ($categories as $category)
            <li>
                <a for="check{{$category->id}}" href="{{route('category.singular', $category->name_en)}}" class="nav-link">{{$category->name_en}}
                    <span class="badge badge-primary">
                        <label for="check{{$category->id}}" class="menu"></label>
                    </span>
                </a>

                @if ($category==$activeCategory)
                <input id="check{{$category->id}}" type="checkbox" name="menu" checked/>
                @else
                <input id="check{{$category->id}}" type="checkbox" name="menu"/>
                @endif


                <ul class="submenu">
                    @foreach ($subCategories as $subCategory)
                    @if($subCategory->category_id==$category->id)
                    <li><a href="category.html" class="nav-link">{{$subCategory->name_en}}</a></li>
                    @endif
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
</div>