@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    اضافة سيارة جديدة
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    اضافة سيارة جديدة
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
                            href="{{ route('car.index') }}">رجوع</a>

                        <br>

                        <form action="{{ route('car.store') }}" method="POST">
                            @csrf

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">اسم السيارة</label>
                                    <input type="text" name="car_name" class="form-control">
                                    @error('car_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">الشركة المصنعة</label>
                                    <input type="text" name="company_name_made" class="form-control">
                                    @error('company_name_made')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">تاريخ الشراء</label>
                                    <input type="date" name="car_year_buy" class="form-control">
                                    @error('car_year_buy')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">رقم اللوحة</label>
                                    <input type="text" name="car_number" class="form-control">
                                    @error('car_number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">الرقم التسلسلي</label>
                                    <input type="text" name="car_number_serial" class="form-control">
                                    @error('car_number_serial')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">سنة الاصدار</label>
                                    <select id="car_year_made" name="car_year_made" class="form-control"
                                        style="height: calc(2.8rem + 12px)" onchange="changeCarAge()">
                                        <option value="">اختر السنة</option>
                                        @for ($year = date('Y'); $year >= 1900; $year--)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                    @error('car_year_made')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">عمر السيارة</label>
                                    <input type="text" id="car_age" name="car_age" min="0"
                                        class="form-control" readonly>
                                    @error('car_age')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">المسافة المقطوعة (بالكيلومتر)</label>
                                    @foreach ($counters as $counter)
                                        <input type="text" name="traveled_distance" value="{{ $counter->value }}"
                                            min="0" class="form-control" readonly>
                                    @endforeach
                                    @error('traveled_distance')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">قيمة شراء السيارة</label>
                                    <input type="text" id="car_value_buy" name="car_value_buy" min="0"
                                        class="form-control" oninput="currentValue()">
                                    @error('car_value_buy')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">القيمة الحالية (بالنسبة لعمر السيارة)</label>
                                    <input type="text" id="current_value" name="current_value" class="form-control"
                                        readonly>
                                    @error('current_value')
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


<script>
    function changeCarAge() {
        var releaseYear = document.getElementById('car_year_made').value;
        var currentYear = new Date().getFullYear();
        var carAge = currentYear - releaseYear;

        document.getElementById("car_age").value = carAge;

        currentValue();
    }

    function currentValue() {
        var carValue = document.getElementById('car_value_buy').value;
        var carAge = document.getElementById('car_age').value * 365;

        if (carAge !== null && carValue !== null) {
            var currentValue = carValue / carAge;
        }
        if (carAge == 0 && carValue == 0) {
            var currentValue = 0;
        }
        if (carAge == 0 && carValue !== null) {
            var currentValue = carValue;
        }

        document.getElementById("current_value").value = currentValue;

    }
</script>
@endsection
