<div class="modal fade" id="_checkoutBill_{{$bill->id}}" tabindex="-1" aria-labelledby="checkoutBillLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkoutBillLabel">Thanh toán hóa đơn</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('resident.bills.checkout', ['id' => $bill->id])}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <img class="d-block" width="450px" height="450px"
                            src="https://i.ibb.co/mr2qP6MN/qrcode-183060530-d921f12d9cb4d4f8d09900f2c8d261f3.png"
                            alt="">
                        <div>
                            <span class="h4">Số tiền phải thanh toán: </span><span
                                class="price-display">{{$bill->price}}</span><span class="h6">vnd</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>