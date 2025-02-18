@extends('layout_admin')
@section('content')
<h1>Thêm sản phẩm</h1>
<form action="{{route('product-store')}}" method="post" enctype="multipart/form-data">
    <div>
        <label for="">Tên sản phẩm</label>
        <input type="text" name="ten_san_pham">
    </div>
    <div>
        <label for="">Giá sản phẩm</label>
        <input type="number" name="gia">
    </div>
    <div>
        <label for="">Hình ảnh sản phẩm</label>
        <input type="file" name="hinh_anh">
    </div>
    <div>
        <label for="">Mô tả sản phẩm</label>
        <input type="text" name="mo_ta">
    </div>
    <div>
        <button type="submit">Thêm sản phẩm</button>
    </div>
</form>
@endsection