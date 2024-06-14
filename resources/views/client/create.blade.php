@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    اضافة عميل جديد
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    اضافة عميل جديد
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
                            href="{{ route('client.index') }}">رجوع</a>

                        <br>

                        <form action="{{ route('client.store') }}" method="POST">
                            @csrf

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">اسم العميل</label>
                                    <input type="text" name="name" class="form-control">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
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
                                    <label for="title">التاريخ</label>
                                    <input type="date" name="client_date" class="form-control">
                                    @error('client_date')
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
