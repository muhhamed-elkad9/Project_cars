@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    شاشة العداد
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    شاشة العداد
@stop
<!-- breadcrumb -->
@endsection
@section('content')


<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <a href="{{ route('counter.create') }}" class="btn btn-success btn-sm" role="button"
                    aria-pressed="true">اضافة عداد جديد</a><br><br>
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
                                                        <th>قيمة العداد</th>
                                                        <th>التاريخ</th>
                                                        <th>العمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($counters as $counter)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $counter->value }}</td>
                                                            <td>{{ $counter->date }}</td>
                                                            <td>

                                                                <a class="btn btn-info btn-sm"
                                                                    href="{{ route('counter.edit', $counter->id) }}"
                                                                    title="تعديل"><i class="fa fa-edit"></i></a>

                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#delete{{ $counter->id }}"
                                                                    title="حذف"><i class="fa fa-trash"></i></button>
                                                            </td>
                                                        </tr>


                                                        <!-- delete_modal_Grade -->
                                                        <div class="modal fade" id="delete{{ $counter->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                                            class="modal-title" id="exampleModalLabel">
                                                                            حذف العداد
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form
                                                                            action="{{ route('counter.destroy', $counter->id) }}"
                                                                            method="get">
                                                                            @csrf
                                                                            هل انتا متاكد من حذف هذا العداد
                                                                            <input id="id" type="hidden"
                                                                                name="id" class="form-control"
                                                                                value="{{ $counter->id }}">
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
