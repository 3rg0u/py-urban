@extends('admin.app')
@section('content')

    <a href="{{ url()->previous() }}" class="btn btn-secondary">back</a>

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
            <label>Mật khẩu mới</label>
            <input type='password' class="form-control" name='password' id="password" required>
            <label>Xác nhận mật khẩu mới</label>
            <input type='password' class="form-control" name="password_confirmation" id='password_confirmation' required>
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