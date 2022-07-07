@extends('layout/index')
@section('pageName', 'Add Product')
@section('Main')

    {!! Form::open(['url' => 'addproduct']) !!}
    @csrf
    <div class='div_sep'>
        @error('type')
            <small class="form-text text-danger">{{ $message }}</small>
        @enderror
        @error('country')
            <small class="form-text text-danger">{{ $message }}</small>
        @enderror
        <div id="appendanalysis">
        </div>
        <div class="container mb-1 align-items-center">
            <div class="col-md-10">
                <div class="form-group">

                    <select class="form-control form-control-lg form-control-solid"
                        name="type[]" id="type" required>
                        <option>Select Item Type</option>
                        @foreach ($type as $item)
                            <option value="{{ $item->id }}">{{ $item->type }}</option>
                        @endforeach

                    </select>

                    <select class="form-control form-control-lg form-control-solid"
                        name="country[]" id="country" required>
                        <option>Select Country</option>
                        @foreach ($country as $rate)
                            <option value="{{ $rate->id }}">{{ $rate->country }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-1 mt-5">
                <button onclick="style.display = 'none'; " class="btn btn-success text-center add"
                    type="button">Add</button>
            </div>
            <div class="col-md-1  mt-5">
            </div>

        </div>

    </div><br>
    <div class="row mb-10">
        <div class="col text-center">
            <button class="btn btn-primary px-20">Order</button>
        </div>
    </div>

    @include('ajax');

@endsection
