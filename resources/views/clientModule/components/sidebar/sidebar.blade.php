<!-- Category -->
<div class="card sidebar-menu mb-4" style="height: calc(100% - 30px);">
    <div class="card-header">
        <h3 class="h4 card-title">Categories</h3>
    </div>
    <div class="card-body">
        <ul class="nav nav-pills flex-column category-menu">

            @foreach ($data['categories'] as $category)
            <li>
                <a for="check{{$category->id}}" href="{{route('category.singular', $category->name_en)}}" class="nav-link">{{$category->name_en}}
                    <!-- <span class="badge badge-primary"> -->
                    <label for="check{{$category->id}}">
                        <img src="{{asset('img/icons/down-arrow1.png')}}" alt="" style="width:20px; height:20px;">
                    </label>
                    <!-- </span> -->
                </a>

                @if ($category==$data['activeCategory'])
                <input id="check{{$category->id}}" type="checkbox" name="menu" checked />
                @else
                <input id="check{{$category->id}}" type="checkbox" name="menu" />
                @endif

                <!-- subcategory level 1 -->
                <ul class="submenu">
                    @foreach ($data['subCategories'] as $subCategory)
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

                    @if ($subCategory==$data['activeSubCategory'] || $subCategory==$data['parentSubCategory'])
                    <input id="check1{{$subCategory->id}}" type="checkbox" name="menu" checked/>
                    @else
                    <input id="check1{{$subCategory->id}}" type="checkbox" name="menu" />
                    @endif

                    <!-- subcategory level 2 -->
                    <ul class="submenu">
                        @foreach ($data['subCategories'] as $subCategory2)
                        @if($subCategory2->sub_category_id==$subCategory->id)
                        <li style="padding-left:10px;">
                            <a for="check2{{$subCategory->id}}" href="{{route('category.sub2', ['category' => $category->name_en, 'subCategory' => $subCategory->name_en, 'subCategory2' => $subCategory2->name_en])}}" class="nav-link">
                                {{$subCategory2->name_en}}
                                @if($subCategory2->sub_category_count!=0)
                                <label for="check2{{$subCategory2->id}}">
                                    <img src="{{asset('img/icons/down-arrow1.png')}}" alt="" style="width:15px; height:15px;">
                                </label>
                                @endif
                            </a>
                        </li>

                        @if ($subCategory2==$data['activeSubCategory'] || $subCategory2==$data['parentSubCategory2'])
                        <input id="check2{{$subCategory2->id}}" type="checkbox" name="menu" checked/>
                        @else
                        <input id="check2{{$subCategory2->id}}" type="checkbox" name="menu" />
                        @endif

                        <!-- subcategory level 3 -->
                        <ul class="submenu">
                            @foreach ($data['subCategories'] as $subCategory3)
                            @if($subCategory3->sub_category_id==$subCategory2->id)
                            <li style="padding-left:20px;">
                                <a href="{{route('category.sub3', ['category' => $category->name_en, 'subCategory' => $subCategory->name_en, 'subCategory2' => $subCategory2->name_en, 'subCategory3' => $subCategory3->name_en])}}" class="nav-link">
                                    {{$subCategory3->name_en}}
                                </a>
                            </li>
                            <input type="checkbox">
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


<!-- Brand -->
<!-- <div class="card sidebar-menu mb-4">
    <div class="card-header">
        <h3 class="h4 card-title">Brands <a href="#" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i> Clear</a></h3>
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Armani (10)
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Versace (12)
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Carlo Bruni (15)
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Jack Honey (14)
                    </label>
                </div>
            </div>
            <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>
        </form>
    </div>
</div> -->

<!-- <div class="banner"><a href="#"><img src="img/banner.jpg" alt="sales 2014" class="img-fluid"></a></div> -->