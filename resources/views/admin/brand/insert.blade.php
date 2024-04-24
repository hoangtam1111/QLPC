@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Insert</h2>
        <form method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <td><label class="form-label">Tên thương hiệu</label></td>
                    <td>
                        <input type="text" class="form-control" id="BrandName" placeholder="Tên thương hiệu"
                            value="{{ old('brand_name') }}" name="brand_name" />
                        @error('brand_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td><label class="form-label">Logo thương hiệu</label></td>
                    <td>
                        <input type="text" class="form-control" id="BrandLogo" placeholder="Link logo"
                            value="{{ old('brand_logo') }}" name="brand_logo" />
                        @error('brand_logo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
            </table>
            @csrf
            <button type="submit" class="btn action-1">Thêm</button>
            <a href="{{ route('admin.brand.index') }}" class="btn action-2">Huỷ</a>
        </form>
    </div>
@endsection
