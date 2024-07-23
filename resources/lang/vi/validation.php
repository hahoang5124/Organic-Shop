<?php
// resources/lang/vi/validation.php

return [
    'required'             => ':attribute không được để trống.',
    'email'                => ':attribute Không hợp lệ.',
    'unique'               => ':attribute đã tồn tại.',
    'confirmed'            => ':attribute không khớp.',
    'max'                  => [
        'numeric' => ':attribute không được lớn hơn :max.',
        'file'    => 'Kích thước của :attribute không được lớn hơn :max kilobytes.',
        'string'  => 'Độ dài của :attribute không được lớn hơn :max ký tự.',
        'array'   => 'Mảng :attribute không được có nhiều hơn :max phần tử.',
    ],
    'min'                  => [
        'numeric' => ':attribute phải lớn hơn hoặc bằng :min.',
        'file'    => 'Kích thước của :attribute phải lớn hơn hoặc bằng :min kilobytes.',
        'string'  => 'Độ dài của :attribute phải lớn hơn hoặc bằng :min ký tự.',
        'array'   => 'Mảng :attribute phải có ít nhất :min phần tử.',
    ],
    'attributes' => [
        'name' => 'Tên tài khoản',
        'email' => 'Email',
        'password' => 'mật khẩu',
        'password_confirmation' => 'Nhập lại mật khẩu',
        // Thêm các trường tùy chỉnh khác nếu cần thiết
    ],
];

?>