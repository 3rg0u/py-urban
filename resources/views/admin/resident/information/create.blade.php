@extends('admin.app')


@section('content')
    <a href="{{ route('residents.infor.index') }}" class="btn btn-secondary">Trở lại</a>

    <form action="{{route('residents.infor.create')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Số CCCD:</label>
            <input type="text" class="form-control" name='id' required>
            <label>Họ và tên:</label>
            <input type="text" class="form-control" name='name' required>
            <label for="apart_id">Mã căn hộ:</label>
            <select name="apart_id" class="form-control">
                @foreach($aparts as $apart)
                    <option value="{{ $apart->id }}">{{ $apart->id }}</option>
                @endforeach
            </select>
            <label for="host">Vai trò:</label>
            <select name="host" id='host' class="form-control">
                <option value="member" selected>Thành viên</option>
                <option value="host">Chủ hộ</option>
            </select>
            <div id='email_field' hidden>
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email" id="email">
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-md">Tạo</button>
    </form>


    <script>
        document.getElementById('host').addEventListener('change', function (event) {
            if (this.value === 'host') {
                document.getElementById('email_field').hidden = false;
            }
            else {

                document.getElementById('email_field').hidden = true;
            }
        });
    </script>

@endsection