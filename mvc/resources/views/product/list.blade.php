@extends('layout_admin')
@section('content')
    <h1>Danh sách sản phẩm</h1>
    @if(isset($_SESSION['errors']) && isset($_GET['msg']))
    <div>
        <ul>
        @foreach($_SESSION['errors'] as $value)
            <li>{{$value}}</li>
         @endforeach
        </ul>
    </div>
@endif
@if(isset($_SESSION['success']) && isset($_GET['msg']))
    <div>{{$_SESSION['success']}}</div>
@endif
    <a href="{{route('product-add')}}"><button>Thêm sản phẩm</button></a>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Hình Ảnh</th>
            <th>Mô tả</th>
            <th>Thao Tác</th>
        </tr>
        @foreach($listPro as $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->ten_san_pham}}</td>
            <td>{{$value->gia}}</td>
            <td>{{$value->hinh_anh}}</td>
            <td>{{$value->mo_ta}}</td>
            <td>
                <a>Sửa</a>
                <a>Xóa</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection