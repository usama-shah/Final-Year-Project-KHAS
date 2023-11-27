<button class="filter-btn btn-khas-secondary"><i class="bi bi-filter"></i>Filter</button>
<aside class="col-md-3 result-filter">
    <div class="col-12  rounded shadow-lg p-3 bg-white">
        <div class="row ">
        <span class="close-filter text-end w-100"><i class="text-danger bi bi-x-circle-fill"></i></span>
        <div class="col-12 btn btn-secondery">
<h4><i class="bi bi-filter"></i> Filter</h4><button class="btn-sm btn btn-primary resetfilter">Reset Filter</button>
        </div>
        <div class="accordion m-0  p-0" id="accordionbrandExample">
          <div class="accordion-item border-0">
            <h2 class="accordion-header" id="price-headingOne">
              <button class="accordion-button px-2" type="button" data-bs-toggle="collapse" data-bs-target="#price-collapseOne" aria-expanded="true" aria-controls="price-collapseOne">
                Price
              </button>
            </h2>
            <div id="price-collapseOne" class="accordion-collapse collapse show" aria-labelledby="price-headingOne">
              <div class="accordion-body">
                <input type="number" class="form-control mb-2 price_filter" placeholder="Min" id="min-price">
                <input type="number" class="form-control price_filter" placeholder="Max" id="max-price">
              </div>
            </div>
          </div>
          @if(!empty($brands))
            <div class="accordion-item border-0">
              <h2 class="accordion-header" id="brand-headingOne">
                <button class="accordion-button  px-2" type="button" data-bs-toggle="collapse" data-bs-target="#brand-collapseOne" aria-expanded="true" aria-controls="brand-collapseOne">
                  Brand
                </button>
              </h2>
              <div id="brand-collapseOne" class="accordion-collapse collapse show" aria-labelledby="brand-headingOne">
                <div class="accordion-body pre-scrollable">

                  <div class="form-group form-check">
                    <input type="radio" name="brand" value="all" class="form-check-input category_filter" id="brand">
                    <label class="form-check-label" for="brand">All</label>
                 </div>
@foreach($brands as $brand)


                    <div class="form-group form-check">
                        <input type="radio" name="brand" value="{{$brand->id}}" class="form-check-input category_filter" id="brand">
                        <label class="form-check-label" for="brand">{{$brand->name}}</label>
                     </div>

                     @endforeach


                </div>
              </div>
            </div>
            @endif


              @foreach($categories as $cat)
              @if(empty($cat->parent_id))
              <div class="accordion-item border-0">
                <h2 class="accordion-header" id="ram-heading{{$cat->id}}">
                  <button class="accordion-button  px-2" type="button" data-bs-toggle="collapse" data-bs-target="#ram-collapse{{$cat->id}}" aria-expanded="true" aria-controls="ram-collapse{{$cat->id}}">
                    {{$cat->prefix." ".$cat->name." ".$cat->suffix}}
                  </button>
                </h2>
                <div id="ram-collapse{{$cat->id}}" class="accordion-collapse collapse show" aria-labelledby="ram-heading{{$cat->id}}">
                  <div class="accordion-body">
                    <div class="form-group form-check">
                      <input type="radio" checked name="{{$cat->column_name}}" value="all" class="form-check-input category_filter" id="cat{{$cat->id}}">
                      <label class="form-check-label" for="cat{{$cat->id}}">All</label>
                   </div>
@foreach($cat->subcategories as $sub)

                    <div class="form-group form-check">
                        <input type="radio" name="{{$cat->column_name}}" value="{{$sub->name}}" class="form-check-input category_filter" id="cat{{$sub->id}}">
                        <label class="form-check-label" for="cat{{$sub->id}}">{{$sub->prefix." ".$sub->name." ".$sub->suffix}}</label>
                     </div>
                     @endforeach
                </div>
                </div>
              </div>
              @endif
@endforeach



          </div>
        </div>
    </div>
</aside>