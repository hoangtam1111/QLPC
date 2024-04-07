@extends('layout.app')
@section('content')
<div class="container">
    <h2>Chỉnh sửa sản phẩm</h2>
    <form method="post" action="{{ route('admin.brand.post-delete') }}" enctype="multipart/form-data">
        <table class="table table-bordered">
            <input type="hidden" name="brand_id" value="{{ $brand->brand_id }}" />
            <tr>
                <td><label class="form-label">Tên thương hiệu</label></td>
                <td>{{ $brand->brand_name }}</td>
            </tr>
            <tr>
                <td><label class="form-label">Logo thương hiệu</label></td>
                <td><img src="{{ $brand->brand_logo }}" alt="Alternate Text" /></td>
            </tr>
        </table>
        @csrf
        <button type="submit" class="btn action-1">Xóa</button>
        <a href="{{ route('admin.brand.index') }}" class="btn action-2">Huỷ</a>
    </form>
</div>
@endsection
