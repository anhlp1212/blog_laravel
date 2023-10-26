<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <style>
        textarea {
            height: 50px;
        }
        .mb_10 {
            margin-bottom: 10px;
        }
        .error {
            color: red;
        }
        .error1 {
            border: 1px solid red;
        }
    </style>
</head>
<body>
    <h2>Login Admin</h2>
    <form action="{{ route('admin.login') }}" method="post">
        @csrf
            
        <div class="mb_10">
            <label for="">Email: </label><br>
            <input type="text" name="email" placeholder="Nhập địa chỉ email" value="{{ old('email') }}" class="@error('email') error1 @enderror">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb_10">
            <label for="">Password: </label><br>
            <input type="password" name="password" placeholder="Nhập mật khẩu" value="{{ old('password') }}" class="@error('password') error1 @enderror">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb_10">
            <button type="submit">Submit</button>
        </div>
    </form>

</body>
</html>