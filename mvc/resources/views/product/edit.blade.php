@extends('layout_admin')
@section('content')
<h1>Chỉnh sửa sản phẩm</h1>
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
<form action="{{route('product-update/{id}', ['id'=>$product->id])}}" 
    method="post" enctype="multipart/form-data">
    <div>
        <label for="">Tên sản phẩm</label>
        <input type="text" name="ten_san_pham" value="{{$product->ten_san_pham}}">
    </div>
    <div>
        <label for="">Giá sản phẩm</label>
        <input type="number" name="gia" value="{{$product->gia}}">
    </div>
    <div>
        <label for="">Hình ảnh sản phẩm</label>
        <input type="file" name="hinh_anh">
        <img src="{{storage($product->hinh_anh)}}" alt="" width="100px">
    </div>
    <div>
        <label for="">Mô tả sản phẩm</label>
        <input type="text" name="mo_ta" value="{{$product->mo_ta}}">
    </div>
    <div>
        <button type="submit">Thêm sản phẩm</button>
    </div>
</form>
@endsection