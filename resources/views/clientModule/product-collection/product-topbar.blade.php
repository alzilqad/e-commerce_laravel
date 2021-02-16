<div class="box info-bar">
    <div class="row" style="padding:15px">
        <div class="col-md-12 col-lg-9 products-sort-by mt-2 mt-lg-0">Showing <strong>{{$data['products']->count()}}</strong> products</div>
        <div class="col-md-12 col-lg-3 products-number-sort">
            <div class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row">
                <div class="products-sort-by mt-2 mt-lg-0" style="margin: 0px"><strong>Sort</strong>
                    <select id="sortChoice" name="sort-by" class="form-control" onchange="clickSort()">
                        <option value="create_at">Date</option>
                        <option value="name_en">Name</option>
                        <option value="buying_price">Price</option>
                        @if(Session::get('sort')=='discount')
                        <option value="discount" selected>Sales</option>
                        @else
                        <option value="discount">Sales</option>
                        @endif
                    </select>
                </div>
                <div style="padding-right: 90px">
                    <div id="sortUpArrow" class="up-arrow" onclick="clickUpArrow()" ></div>
                    <div id="sortDownArrow" class="down-arrow" onclick="clickDownArrow()" ></div>
                </div>
            </div>
        </div>

    </div>
</div>