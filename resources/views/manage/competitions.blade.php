@extends("manage.menu")

@section('content')

    <div class="modal fade" id="add">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">إضافة شعار المنافسة</h5>
                </div>

                <form method="POST" action="/competitions"  enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="basic-form">
                            <div class="form-group">
                                <label class="form-label">  الشعار</label>
                                <input type="file" class="single-fileupload" name="logo" data-max-file-size="15MB"  accept="image/png, image/jpeg, image/jpg, image/gif"><br><br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <input type="submit" value="حفظ" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-style1 mb-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">المُنافسات المٌنفذة</a></li>
                                <li class="breadcrumb-item active" aria-current="page">عرض</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <div class="dropdown">
                            <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-wave waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                                الخيارات<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#search" data-whatever="@fat">بحث</a></li>
                                <li><a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#add" data-whatever="@fat">إضافة</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if(count($competitions) > 0)
                    <div class="row">
                        @foreach ($competitions as $competition)
                        <div class="col-xxl-2 col-xl-2 col-md-4 col-sm-4 col-6">
                            <a href="javascript:void(0);">
                                <div class="card custom-card bg-dark overlay-card text-fixed-white">
                                    <img src="{{ $competition->logo }}" class="card-img" alt="...">
                                    <div class="card-img-overlay d-flex flex-column p-0 over-content-bottom">
                                        <div class="card-footer border-top-0">
                                            <a onclick="destroy('destroyCompetition',{{ $competition->id }})" href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="alert alert-primary">
                        <strong>لا يوجد مٌنافسات مٌنفذة</strong>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
