@extends('admin.app')
@section('content')

    <a href="{{ route('residents.account.index') }}" class="btn btn-md btn-secondary">Trở lại</a>

    <form action="{{route('residents.account.edit', ['id' => $account->id])}}" method="POST" id='edit_account'>
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name='email' value='{{$account->email}}' required>
            <label for="apart_id">Mã căn hộ</label>
            <select name="apart_id" class="form-control">
                <option value="{{$account->apart_id}}">{{$account->apart_id}}</option>
                @foreach($aparts as $apart)
                    <option value="{{ $apart->id }}">{{ $apart->id }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-success btn-md">Lưu</button>

        </div>
    </form>




    <script>
        document.getElementById('edit_account').addEventListener('submit', function (event) {

            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('password_confirmation').value;

            if (password !== confirmPassword) {
                event.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Đã xảy ra lỗi',
                    text: 'Mật khẩu không khớp!',
                    timer: 3000,
                    showConfirmButton: false
                });
            }
        });
    </script>
@endsection