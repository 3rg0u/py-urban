@component('mail::message')
# Đặt lại mật khẩu

Xin chào chúng tôi đến từ Pyurban.
Bạn nhận được email này vì chúng tôi nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.

@component('mail::button', ['url' => $actionUrl])
Đặt lại mật khẩu
@endcomponent

Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này.

Chào thân ái,  
Pyurban
@endcomponent
