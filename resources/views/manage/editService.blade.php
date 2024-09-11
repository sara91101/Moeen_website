@extends("manage.menu")

@section('content')
<br><br>
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1 mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">الخدمات</a></li>
                            <li class="breadcrumb-item active" aria-current="page">تعديل</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <form method="POST" action="/updateService/{{ $service->id }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="basic-form">

                        <div class="form-group">
                            <label class="form-label">الخدمة بالعربية</label>
                            <input required type="text" value="{{ $service->service_ar }}"  name="service_ar" class="form-control input-default "><br><br>
                        </div>
                        <div class="form-group">
                            <label class="form-label">الخدمة بالإنجليزية</label>
                            <input type="text" value="{{ $service->service_en }}" name="service_en" class="form-control input-default "><br><br>
                        </div>
                        <div class="form-group">
                            <label class="form-label"> الرمز التوضيحي (<a href="https://icons8.com/line-awesome" class="text-danger">الرموز</a>)</label>
                            <input type="text" name="icon" class="form-control input-default " value="{{ $service->icon }}"><br><br>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="col-lg-12" align="center">
                        <input type="submit" value="تعديل" class="btn btn-lg btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
