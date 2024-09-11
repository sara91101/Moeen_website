@extends("manage.menu")

@section('content')

    <div class="row">
        <div class="col-xl-3 col-xxl-3 col-sm-6">
            <div class="card custom-card card-bg-primary text-fixed-white">
                <div class="card-body p-0">
                    <div class="d-flex align-items-top p-4 flex-wrap">
                        <div class="me-3 lh-1">
                            <span class="avatar avatar-md avatar-rounded bg-white text-primary shadow-sm">
                                <i class="bx bx-menu fs-18"></i>
                            </span>
                        </div>
                        <div class="flex-fill">
                            {{--  <h5 class="fw-semibold mb-1 text-fixed-white">{{ $services }}</h5>  --}}
                            <p class="op-7 mb-0 fs-12">الخدمات</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-3 col-sm-6">
            <div class="card custom-card card-bg-primary text-fixed-white">
                <div class="card-body p-0">
                    <div class="d-flex align-items-top p-4 flex-wrap">
                        <div class="me-3 lh-1">
                            <span class="avatar avatar-md avatar-rounded bg-white text-primary shadow-sm">
                                <i class="bx bx-male-female fs-18"></i>
                            </span>
                        </div>
                        <div class="flex-fill">
                            {{--  <h5 class="fw-semibold mb-1 text-fixed-white">{{ $partners }}</h5>  --}}
                            <p class="op-7 mb-0 fs-12"> الشركاء</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-3 col-sm-6">
            <div class="card custom-card card-bg-primary text-fixed-white">
                <div class="card-body p-0">
                    <div class="d-flex align-items-top p-4 flex-wrap">
                        <div class="me-3 lh-1">
                            <span class="avatar avatar-md avatar-rounded bg-white text-primary shadow-sm">
                                <i class="bx bx-git-pull-request fs-18"></i>
                            </span>
                        </div>
                        <div class="flex-fill">
                            {{--  <h5 class="fw-semibold mb-1 text-fixed-white">{{ $customers }}</h5>  --}}
                            <p class="op-7 mb-0 fs-12">العملاء</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-3 col-sm-6">
            <div class="card custom-card card-bg-primary text-fixed-white">
                <div class="card-body p-0">
                    <div class="d-flex align-items-top p-4 flex-wrap">
                        <div class="me-3 lh-1">
                            <span class="avatar avatar-md avatar-rounded bg-white text-primary shadow-sm">
                                <i class="bx bx-question-mark fs-18"></i>
                            </span>
                        </div>
                        <div class="flex-fill">
                            {{--  <h5 class="fw-semibold mb-1 text-fixed-white">{{ number_format($earns,0) }} .س</h5>  --}}
                            <p class="op-7 mb-0 fs-12">الإستفسارات</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> الإستفسارات الحديثة</h4>
                </div>
                <div class="card-body">
                    @if(count($contacts) > 0)
                    <div class="table-responsive">
                        <table class="table table-responsive-lg">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الإسم </th>
                                    <th>البريد الإلكتروني </th>
                                    <th>الإستفسار </th>
                                    <th>حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach ($contacts as $j)
                                <span id="idd{{ $j->id }}" style="display: none;">{{ $j->id }}</span>
                                <tr>
                                    <th>{{ $i }}</th>
                                    <td id="ar_question{{ $j->id }}">{{ $j->name }}</td>
                                    <td id="ar_answer{{ $j->id }}">{{ $j->email }}</td>
                                    <td id="ar_answer{{ $j->id }}">{{ $j->msg }}</td>

                                    <td>
                                        <a onclick="destroy('destroyContact',{{ $j->id }})" href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
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
                    <strong>لا توجد إستفسارات</strong>
                </div>
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection
