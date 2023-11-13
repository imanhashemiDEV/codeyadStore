<div class="col-lg-3 col-md-12 col-sm-12 sticky-sidebar filter-options-sidebar">
    <div class="dt-sn dt-sn--box mb-3">
            <div class="col-12">
                <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide">
                    <h2>فیلتر محصولات</h2>
                </div>
            </div>
            <div class="col-12 filter-product mb-3">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-right collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                    برند
                                    <i class="mdi mdi-chevron-down"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                             data-parent="#accordionExample">
                            <div class="card-body">
                               @foreach($brands as $brand)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" wire:click="addBrands({{$brand->id}})"
                                               id="customCheck{{$brand->id}}">
                                        <label class="custom-control-label"
                                               for="customCheck{{$brand->id}}">{{$brand->title}}</label>
                                    </div>
                               @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-right collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                    گارانتی
                                    <i class="mdi mdi-chevron-down"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                @foreach($guaranties as $guaranty)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" wire:click="addGuaranties({{$guaranty->id}})"
                                               id="customCheck{{$guaranty->id+100}}">
                                        <label class="custom-control-label"
                                               for="customCheck{{$guaranty->id+100}}">{{$guaranty->title}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-right collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                    رنگ
                                    <i class="mdi mdi-chevron-down"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                @foreach($colors as $color)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" wire:click="addColors({{$color->id}})"
                                               id="customCheck{{$color->id+1000}}">
                                        <label class="custom-control-label"
                                               for="customCheck{{$color->id+1000}}">{{$color->title}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
