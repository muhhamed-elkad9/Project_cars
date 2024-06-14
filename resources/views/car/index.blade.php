@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    شاشة السيارات
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    شاشة السيارات
@stop
<!-- breadcrumb -->
@endsection
@section('content')


<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <a href="{{ route('car.create') }}" class="btn btn-success btn-sm" role="button" aria-pressed="true">اضافة
                    سيارة جديدة</a><br><br>
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
                                                        <th>اسم السيارة</th>
                                                        <th>الشركة المصنعة</th>
                                                        <th>تاريخ الشراء</th>
                                                        <th>رقم اللوحة</th>
                                                        <th>الرقم التسلسلي</th>
                                                        <th>سنة الاصدار</th>
                                                        <th>عمر السيارة</th>
                                                        <th>المسافة المقطوعة</th>
                                                        <th>قيمة شراء السيارة</th>
                                                        <th>القيمة الحالية (حساب تلقائي للاهلاك)</th>
                                                        <th>العمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($cars as $car)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $car->car_name }}</td>
                                                            <td>{{ $car->company_name_made }}</td>
                                                            <td>{{ $car->car_year_buy }}</td>
                                                            <td>{{ $car->car_number }}</td>
                                                            <td>{{ $car->car_number_serial }}</td>
                                                            <td>{{ $car->car_year_made }}</td>
                                                            <td>{{ $car->car_age }}</td>
                                                            <td>{{ $car->traveled_distance }}</td>
                                                            <td>{{ $car->car_value_buy }}</td>
                                                            <td>{{ $car->current_value }}</td>
                                                            <td>
                                                                <a class="btn btn-info btn-sm"
                                                                    href="{{ route('car.edit', $car->id) }}"
                                                                    title="تعديل"><i class="fa fa-edit"></i></a>

                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#delete{{ $car->id }}"
                                                                    title="حذف"><i class="fa fa-trash"></i></button>
                                                            </td>
                                                        </tr>


                                                        <!-- delete_modal_Grade -->
                                                        <div class="modal fade" id="delete{{ $car->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                                            class="modal-title" id="exampleModalLabel">
                                                                            حذف السيارة
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form
                                                                            action="{{ route('car.destroy', $car->id) }}"
                                                                            method="get">
                                                                            @csrf
                                                                            هل انتا متاكد من حذف هذه السيارة
                                                                            <input id="id" type="hidden"
                                                                                name="id" class="form-control"
                                                                                value="{{ $car->id }}">
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
