@extends('admin.app')


@section('content')
    <a href="{{ route('residents.account.index') }}" class="btn btn-md btn-secondary">Trở lại</a>

    <form action="{{route('residents.account.create')}}" method="POST" id="create_account">
        @csrf
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name='email' required>
            <label for="apart_id">Mã căn hộ</label>
            <select name="apart_id" class="form-control">
                @foreach($aparts as $apart)
                    <option value="{{ $apart->id }}">{{ $apart->id }}</option>
                @endforeach
            </select>
            <label>Mật khẩu</label>
            <input type='password' class="form-control" name='password' id="password" required>
            <label>Xác nhận mật khẩu</label>
            <input type='password' class="form-control" name="password_confirmation" id='password_confirmation' required>
        </div>
        <button type="submit" class="btn btn-success btn-md">Tạo</button>
    </form>


    <script>
        document.getElementById('create_account').addEventListener('submit', function (event) {

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