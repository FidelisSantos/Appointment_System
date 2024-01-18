@section('title', 'Login')

@include('partials.header')
    <div class="login-div">
        <a href="{{ url('/register') }}" class="login-register-link"> @lang('login.Register')</a>
        <form action="" class="login-form">
            <img src="/img/login.png" alt="logo" class="login-img">
            <div class="login-div-input">
                <label for="">E-mail</label>
                <input type="text" class="form-group">
            </div>
            <div class="login-div-input">
                <label for="">@lang('login.Password')</label>
                <input type="password" class="form-group">
            </div>
        </form>
    </div>
@include('partials.footer')
