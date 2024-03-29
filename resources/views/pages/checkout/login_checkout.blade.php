<x-layout>
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Đăng nhập tài khoản</h2>
                        <form action="/login-user" method="POST">
                            @csrf
                            <input type="text" name="email" placeholder="Tài khoản" />
                            <input type="password" name="password" placeholder="Mật khẩu" />
                            <span>
                                <input type="checkbox" class="checkbox">
                                Ghi nhớ đăng nhập
                            </span>
                            <button type="submit" class="btn btn-default">Đăng nhập</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">Hoặc</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Đăng ký</h2>
                        <form action="/register-user" method="POST">
                            @csrf
                            <input type="text" name="name" placeholder="Họ tên" value="{{old('name')}}"/>
                            <input type="email" name="email" placeholder="Địa chỉ email" value="{{old('email')}}"/>
                            <input type="password" name="password" placeholder="Mật khẩu" value="{{old('password')}}"/>
                            <input type="text" name="phone" placeholder="Số điện thoại" value="{{old('phone')}}"/>
                            <button type="submit" class="btn btn-default">Đăng ký</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
</x-layout>
