<!DOCTYPE html>
<html>
<head>
    <title>Example Email</title>
</head>
<body>
    <div>
        <p>Bạn đã gửi yêu cầu reset password truy cập link này để đổi mật khẩu:</p>
        <a href="{{env('APP_URL').  '/changepassword/' .$details['token']}}">click</a>
    </div>
</body>
</html>
