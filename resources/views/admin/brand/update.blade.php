@extends('layout.app')
@section('content')
<div class="container">
    <h2>Chỉnh sửa sản phẩm</h2>
    <form action="{{ route('admin.brand.post-update') }}" method="post"   enctype="multipart/form-data">
        <table class="table table-bordered">
            <input type="hidden" name="brand_id" value="{{ $brand->brand_id }}" />
            <tr>
                <td><label class="form-label">Tên thương hiệu</label></td>
                <td>
                    <input type="text" value="{{ old('brand_name') ?? $brand->brand_name}}" class="form-control" id="brand_name" placeholder="Tên thương hiệu" name="brand_name" />
                    @error('brand_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Logo thương hiệu</label></td>
                <td>
                    <input type="text" value="{{ old('brand_logo') ?? $brand->brand_logo }}" class="form-control" id="brand_logo" placeholder="Link logo" name="brand_logo" />
                    @error('brand_logo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
        </table>
        @csrf
        <button type="submit" class="btn action-1">Sửa</button>
        <a href="{{ route('admin.brand.index') }}" class="btn action-2">Huỷ</a>
    </form>
</div>
@endsection
