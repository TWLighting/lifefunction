
    @extends('layout.main')
    @section('title',$title)
    <!--section中決定範圍要放進yield的範圍-->
    @section('block')
        <h1>{{$title}}</h1>
        <form action="/user/auth/sign-up" method="post">
            @csrf
            <label >
                暱稱:
                <input type="text" name="nickname" placeholder="暱稱" value="{{old('nickname')}}">
            </label>
            <label >
                email:
                <input type="text" name="email" placeholder="example@com" value="{{old('email')}}">
            </label>
            <label >
                密碼:
                <input type="password" name="password" placeholder="密碼" >
            </label>
            <label >
                確認密碼:
                <input type="password" name="password_confirmation" placeholder="確認密碼" >
            </label>
            <label >
                帳號類型:
                <select name="type" id="">
                    <option value="G">一般會員</option>
                    <option value="A">管理者</option>
                </select>
            </label>
            <button type="submit">註冊</button>
            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
        </form>
    @stop