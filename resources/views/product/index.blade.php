@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    شاشة الاصناف
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    شاشة الاصناف
@stop
<!-- breadcrumb -->
@endsection
@section('content')


<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <a href="{{ route('product.create') }}" class="btn btn-success btn-sm" role="button"
                    aria-pressed="true">اضافة صنف جديد</a><br><br>
            </div>



            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="accordion gray plus-icon round">

                        <div class="row">
                            <div class="col-xl-12 mb-30">
                                <div class="card card-statistics h-100">
                                    <div class="card-body">
                                        <div class="d-block d-md-flex justify-content-between">
                                            <div class="d-block">
                                            </div>
                                        </div>
                                        <div class="table-responsive mt-15">
                                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                                data-page-length="50" style="text-align: center">
                                                <thead>
                                                    <tr class="text-dark">
                                                        <th>#</th>
                                                        <th>اسم الصنف</th>
                                                        <th>الصلاحية بالايام</th>
                                                        <th>الصلاحية بالمسافة</th>
                                                        <th>تاريخ الاضافة</th>
                                                        <th>العمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($products as $product)
                                                        @php
                                                            $currentDay = Illuminate\Support\Carbon::now()->format(
                                                                'Y-m-d',
                                                            );
                                                            $expiryDate = Illuminate\Support\Carbon::parse(
                                                                $product->created_at,
                                                            )
                                                                ->addDays($product->product_date_day)
                                                                ->format('Y-m-d');

                                                            $isExpired = false;
                                                        @endphp

                                                        <!-- الصلاحية بالايام -->
                                                        @if ($currentDay >= $expiryDate)
                                                            @php
                                                                $isExpired = true;
                                                            @endphp
                                                        @endif

                                                        <!-- الصلاحية بالمسافة -->
                                                        @foreach ($product->processes as $process)
                                                            @if ($counter_value >= $process->counter_value + $product->product_date_distance)
                                                                @php
                                                                    $isExpired = true;
                                                                @endphp
                                                            @endif
                                                        @endforeach


                                                        <tr class="{{ $isExpired ? 'table-danger' : '' }}">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $product->product_name }}</td>
                                                            <td>{{ $product->product_date_day }} يوم</td>
                                                            <td>{{ $product->product_date_distance }} كيلومتر
                                                            </td>
                                                            <td>{{ Illuminate\Support\Carbon::parse($product->created_at)->format('Y-m-d') }}
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-info btn-sm"
                                                                    href="{{ route('product.edit', $product->id) }}"
                                                                    title="تعديل"><i class="fa fa-edit"></i></a>

                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#delete{{ $product->id }}"
                                                                    title="حذف"><i class="fa fa-trash"></i></button>
                                                            </td>
                                                        </tr>



                                                        <!-- delete_modal_Grade -->
                                                        <div class="modal fade" id="delete{{ $product->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                                            class="modal-title" id="exampleModalLabel">
                                                                            حذف الصنف
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form
                                                                            action="{{ route('product.destroy', $product->id) }}"
                                                                            method="get">
                                                                            @csrf
                                                                            هل انتا متاكد من حذف هذا الصنف
                                                                            <input id="id" type="hidden"
                                                                                name="id" class="form-control"
                                                                                value="{{ $product->id }}">
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">اغلاق</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-danger">حذف</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
