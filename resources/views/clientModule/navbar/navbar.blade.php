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
                    <!-- <span class="badge badge-primary"> -->
                    <label for="check{{$category->id}}">
                        <img src="{{asset('img/icons/down-arrow1.png')}}" alt="" style="width:20px; height:20px;">
                    </label>
                    <!-- </span> -->
                </a>

                @if ($category==$activeCategory)
                <input id="check{{$category->id}}" type="checkbox" name="menu" checked />
                @else
                <input id="check{{$category->id}}" type="checkbox" name="menu" />
                @endif

                <!-- subcategory level 1 -->
                <ul class="submenu">
                    @foreach ($subCategories as $subCategory)
                    @if($subCategory->category_id==$category->id && $subCategory->sub_category_id==0)
                    <li>
                        <a for="check1{{$subCategory->id}}" href="{{route('category.sub', ['category' => $category->name_en, 'subCategory' => $subCategory->name_en])}}" class="nav-link">
                            {{$subCategory->name_en}}
                            @if($subCategory->sub_category_count!=0)
                            <label for="check1{{$subCategory->id}}">
                                <img src="{{asset('img/icons/down-arrow1.png')}}" alt="" style="width:15px; height:15px;">
                            </label>
                            @endif
                        </a>
                    </li>

                    <input id="check1{{$subCategory->id}}" type="checkbox" name="menu" />

                    <!-- subcategory level 2 -->
                    <ul class="submenu">
                        @foreach ($subCategories as $subCategory2)
                        @if($subCategory2->sub_category_id==$subCategory->id)
                        <li style="padding-left:20px;">
                            <a for="check2{{$subCategory->id}}" href="{{route('category.sub2', ['category' => $category->name_en, 'subCategory' => $subCategory->name_en, 'subCategory2' => $subCategory2->name_en])}}" class="nav-link">
                                {{$subCategory2->name_en}}
                                @if($subCategory2->sub_category_count!=0)
                                <label for="check2{{$subCategory2->id}}">
                                    <img src="{{asset('img/icons/down-arrow1.png')}}" alt="" style="width:15px; height:15px;">
                                </label>
                                @endif
                            </a>
                        </li>
                        <input id="check2{{$subCategory2->id}}" type="checkbox" name="menu" />

                        <!-- subcategory level 3 -->
                        <ul class="submenu">
                            @foreach ($subCategories as $subCategory3)
                            @if($subCategory3->sub_category_id==$subCategory2->id)
                            <li style="padding-left:40px;"><a href="{{route('category.sub3', ['category' => $category->name_en, 'subCategory' => $subCategory->name_en, 'subCategory2' => $subCategory2->name_en, 'subCategory3' => $subCategory3->name_en])}}" class="nav-link">{{$subCategory3->name_en}}</a></li>
                            @endif
                            @endforeach
                        </ul>

                        @endif
                        @endforeach
                    </ul>

                    @endif
                    @endforeach
                </ul>

            </li>
            @endforeach
        </ul>
    </div>
</div>