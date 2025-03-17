



<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body d-flex flex-column">
                    <div class="title">
                        <p>Tên dịch vụ: {{$service->name}}</p>
                    </div>
                    <div class="body">
                        <p>Giá dịch vụ: {{$service->price}}</p>
                    </div>
                    <div class="action mt-auto">
                        <button class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#_enrollService_{{$service->id}}">
                            Đăng ký
                        </button>
                    </div>
                    @include('resident.service.registration.components.enroll', ['service' => $service])
                </div>
            </div>
        </div>
    </div>
</div>





<style>
    .card {
        width: (calc(100vw - 80) / 4)px;
    }
</style>