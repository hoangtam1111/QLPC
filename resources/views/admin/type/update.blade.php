@extends('layout.app')
@section('content')
<div class="container">
    <h2>Chỉnh sửa loại sản phẩm</h2>
    <form method="post" action="{{ route('admin.type.post-update') }}" enctype="multipart/form-data">
        <table class="table table-bordered">
            <input type="hidden" name="type_id" value="{{ $type->type_id }}" />
            <tr>
                <td><label class="form-label">Tên Loại</label></td>
                <td>
                    <input type="text" value="{{ old('type_name')  ?? $type->type_name }}" class="form-control"  placeholder="Tên Loại" name="type_name" />
                    @error('type_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
        </table>
        @csrf
        <button type="submit" class="btn action-1">Sửa</button>
        <a href="{{ route('admin.type.index') }}" class="btn action-2">Huỷ</a>
    </form>
</div>
@endsection
