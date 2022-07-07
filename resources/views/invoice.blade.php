@extends('layout/index')
@section('pageName', 'Invoice')
@section('Main')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container">
            <div class="card">
                <div class="card-body py-3">
                    <div class="col-md-2">
                        <label class="form-label required"> Subtotal</label>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <p class="form-control form-control-lg form-control-solid">${{ $subtotal }}</p>
                        </div>
                    </div>
                </div>

                <div class="card-body py-3">
                    <div class="col-md-2">
                        <label class="form-label required"> Shipping</label>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <p class="form-control form-control-lg form-control-solid">${{ $shipping }}</p>
                        </div>
                    </div>
                </div>

                <div class="card-body py-3">
                    <div class="col-md-2">
                        <label class="form-label required"> VAT</label>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <p class="form-control form-control-lg form-control-solid">${{ $vat }} </p>
                        </div>
                    </div>
                </div>

                @if (!empty($discountArray))
                    <div class="card-body py-3">
                        <div class="col-md-2">
                            <label class="form-label required"> Discount</label>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                @foreach ($discountArray as $discountItem)
                                    <p class="form-control form-control-lg form-control-solid">{{ $discountItem }} </p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <div class="card-body py-3">
                    <div class="col-md-2">
                        <label class="form-label required"> Total</label>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <p class="form-control form-control-lg form-control-solid">${{ $total }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
