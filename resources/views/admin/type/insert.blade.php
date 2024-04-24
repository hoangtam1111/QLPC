@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Insert</h2>
        <form method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <td><label class="form-label">Loại sản phẩm</label></td>
                    <td>
                        <input type="text" class="form-control" id="type_name" placeholder="Tên Loại" name="type_name"
                            value="{{ old('type_name') }}" />
                        @error('type_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
            </table>
            @csrf
            <button type="submit" class="btn action-1">Thêm</button>
            <a href="{{ route('admin.type.index') }}" class="btn action-2">Huỷ</a>
        </form>
    </div>
@endsection
