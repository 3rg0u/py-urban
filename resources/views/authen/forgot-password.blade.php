@extends('authen.authentication')

@section('authentication-content')

<style>
    .reset-form{
        width: 100%;
    }
</style>

    <a class="reset-pass-a">
        Recover Password
    </a>
    <br>

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Quên mật khẩu? Đừng lo lắng! Chỉ cần cho chúng tôi biết địa chỉ email của bạn và chúng tôi sẽ gửi cho bạn liên kết đặt lại mật khẩu cho phép bạn chọn mật khẩu mới. Mếu quên email hãy liên hệ với ban quản lý nơi bạn ở để nhận sự trợ giúp.') }}
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
    <div class="reset-form">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="mt-2 text-sm text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    
            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-brown" >
                    {{ __('Send recovery link') }}
                </button>
            </div>
        </form>
    </div>


    
@endsection
