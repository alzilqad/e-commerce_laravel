<div class="box info-bar">
    <div class="row"  style="padding:15px">
        <div class="col-md-12 col-lg-4 products-showing">Showing <strong>{{$products->count()}}</strong> products</div>
        <div class="col-md-12 col-lg-7 products-number-sort">
            <form class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row">
                <div class="products-sort-by mt-2 mt-lg-0"><strong>Sort by</strong>
                    <select name="sort-by" class="form-control">
                        <option>Price</option>
                        <option>Name</option>
                        <option>New Arrival</option>
                        <option>Sales First</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>