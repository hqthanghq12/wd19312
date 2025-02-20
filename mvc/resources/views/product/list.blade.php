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
            <td>
                <img src="{{storage($value->hinh_anh)}}" 
                alt="" width="100px">
            </td>
            <td>{{$value->mo_ta}}</td>
            <td>
                <a href="{{route('product-edit/{id}', 
                ['id'=>$value->id])}}">Sửa</a>
                <a href="{{route('product-delete/{id}', 
                ['id'=>$value->id])}}">Xóa</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection