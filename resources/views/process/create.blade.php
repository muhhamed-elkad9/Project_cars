@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    اضافة عملية جديدة
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    اضافة عملية جديدة
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
                            href="{{ route('process.index') }}">رجوع</a>

                        <br>

                        <form action="{{ route('process.store') }}" method="POST">
                            @csrf

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">اسم المورد</label>
                                    <select class="form-control" name="supplier_id" style="height: calc(2.8rem + 12px)"
                                        required>
                                        <option selected="true" disabled="disabled">--
                                            اختر المورد --</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">
                                                {{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('supplier_id')
                                        <div class="alert
                                                alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="title">اسم الصنف</label>
                                    <select class="form-control" name="product_id" style="height: calc(2.8rem + 12px)"
                                        required>
                                        <option selected="true" disabled="disabled">--
                                            اختر الصنف --</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">
                                                {{ $product->product_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('product_id')
                                        <div class="alert
                                                alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">قيمة العداد</label>
                                    <input type="text" name="counter_value" class="form-control">
                                    @error('counter_value')
                                        <div class="alert
                                                alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="title">المبلغ</label>
                                    <input type="text" name="price" class="form-control">
                                    @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">تاريخ العملية</label>
                                    <input type="date" name="processes_date" class="form-control">
                                    @error('processes_date')
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
