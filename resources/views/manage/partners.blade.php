@extends("manage.menu")

@section('content')
    <script>
        function edithome(id)
        {
            var ar = "home_ar"+id;
            var en = "home_en"+id;

            document.getElementById("edit_id_home").value = id;
            document.getElementById("edit_home_ar").value = document.getElementById(ar).innerHTML;
            document.getElementById("edit_home_en").value = document.getElementById(en).innerHTML;

            $("#edit").modal('show');
        }
    </script>
    <div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header align-self-center">
                <h3 align="center" class="modal-title"><b>البحث عن شريك</b></h3>
            </div>
            <div class="modal-body font-weight-bold" dir="rtl">
            <form method="post" action="/partners">
                @csrf
                <div class="form-group">
                <label for="recipient-name" class="col-form-label"> الشريك بالعربية / بالإنجليزية</label>
                    <input type="text" name="partner" class="form-control"><br><br>
                </div>

            </div>
            <div class="modal-footer justify-content-between" align="center" dir="rtl">
            <input type="submit" value="بحث" class="btn btn-primary">
            <a href="{{ url('/allPartners') }}" class="btn btn-primary">إلغاء البحث</a>
            </div>

        </form>
        </div>
        </div>
    </div>



    <div class="modal fade" id="edit">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">تعديل الشريك</h5>
                </div>

                <form method="POST" action="/updatePartner" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="edit_id_home" name="partner_id">
                    <div class="modal-body">
                        <div class="basic-form">
                            <div class="form-group">
                                <label  class="form-label"> الشريك بالعربية</label>
                                <textarea required id="edit_home_ar" name="ar_name" class="form-control"></textarea><br><br>
                            </div>
                            <div class="form-group">
                                <label  class="form-label">الشريك بالإنجليزية</label>
                                <textarea required id="edit_home_en" name="en_name" class="form-control"></textarea><br><br>
                            </div>
                            <div class="form-group">
                                <label class="form-label"> تغيير الشعار</label>
                                <input id="formFile" type="file" class="form-control" name="logo" data-max-file-size="5MB"  accept="image/png, image/jpeg, image/jpg, image/gif"><br><br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <input type="submit" value="تعديل" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="add">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">إضافة شريك</h5>
                </div>

                <form method="POST" action="/newPartner"  enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="basic-form">
                            <div class="form-group">
                                <label  class="form-label">الشريك بالعربية</label>
                                <textarea required name="ar_name" class="form-control"></textarea><br><br>
                            </div>
                            <div class="form-group">
                                <label  class="form-label">الشريك بالإنجليزية</label>
                                <textarea required name="en_name" class="form-control"></textarea><br><br>
                            </div>
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">الشركاء</a></li>
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
                    @if(count($partners) > 0)
                        <div class="table-responsive">
                            <table class="table table-responsive-lg">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th></th>
                                        <th>الإسم بالعربية</th>
                                        <th>الإسم بالإنجليزية</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1; @endphp
                                    @foreach ($partners as $j)
                                    <span id="idd{{ $j->id }}" style="display: none;">{{ $j->id }}</span>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>
                                            <span class="avatar avatar-xs me-2 avatar-rounded">
                                                <img src="{{ $j->logo }}" alt="img">
                                            </span>
                                        </td>
                                        <td id="home_ar{{ $j->id }}">{{ $j->ar_name }}</td>
                                        <td id="home_en{{ $j->id }}">{{ $j->en_name }}</td>
                                        <td>
                                            {{--  <a href="/Partner/{{ $j->id }}" class="btn btn-sm btn-info"><i class="la la-eye"></i></a>  --}}
                                            <a href="javascript:void(0);" class="btn btn-sm btn-primary" onclick="edithome({{ $j->id }})"><i class="la la-pencil"></i></a>
                                            <a onclick="destroy('destroyPartner',{{ $j->id }})" href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <br><br>
                    @else
                    <div class="alert alert-primary">
                        <strong>لا يوجد شركاء</strong>
                    </div>
                    @endif
                </div>

                <div class="card-footer">
                    <div  dir="rtl" align="center" class="pagination flat rounded rounded-flat" style="display: flex;justify-content: center;">
                        {{ $partners->links("pagination::bootstrap-5") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
