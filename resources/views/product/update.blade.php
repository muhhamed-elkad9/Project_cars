@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    تعديل الصنف
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    تعديل الصنف
@stop
<!-- breadcrumb -->
@endsection
@section('content')

<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('error') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="col-xs-12">
                    <div class="col-md-12">

                        <a class="btn btn-success btn-sm mb-4" role="button" aria-pressed="true"
                            href="{{ route('product.index') }}">رجوع</a>

                        <br>

                        <form action="{{ route('product.update', $products->id) }}" method="POST">
                            @csrf

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">اسم الصنف</label>
                                    <input type="text" name="product_name" value="{{ $products->product_name }}"
                                        class="form-control">
                                    @error('product_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">الصلاحية بالايام</label>
                                    <input type="text" name="product_date_day"
                                        value="{{ $products->product_date_day }}" class="form-control">
                                    @error('product_date_day')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">الصلاحية بالمسافة</label>
                                    <input type="text" name="product_date_distance"
                                        value="{{ $products->product_date_distance }}" class="form-control">
                                    @error('product_date_distance')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">حفظ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
