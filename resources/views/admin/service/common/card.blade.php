<div class="card d-flex flex-column">
    <div class="title">
        <p>Name: {{$service->name}}</p>
    </div>
    <div class="body">
        <p>Price: {{$service->price}}</p>
    </div>
    <div class="action">
        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#_editService_{{$service->id}}">
            Sửa đổi thông tin
        </button>
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#_dropService_{{$service->id}}">
            Hủy dịch vụ</button>
    </div>
    @include('admin.service.common.edit', ['service' => $service, 'type' => $type])
    @include('admin.service.common.delete', ['service' => $service, 'type' => $type])
</div>


<style>
    .card {
        width: (calc(100vw - 80) / 4)px;
    }
</style>