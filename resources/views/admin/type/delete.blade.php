@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Bạn có muốn xóa loại sản phẩm này</h2>
        {{ session('type_id') }}
        <form method="post" action="{{ route('admin.type.post-delete') }}" enctype="multipart/form-data">
            @csrf
            <table class="table table-bordered">
                <input type="hidden" name="type_id" value="{{ $type->type_id }}" />
                <tr>
                    <td><label class="form-label">Tên Loại</label></td>
                    <td>{{ $type->type_name }}</td>
                </tr>
            </table>
            <button type="submit" class="btn action-1">Xóa</button>
            <a href="{{ route('admin.type.index') }}" class="btn action-2">Huỷ</a>
        </form>
    </div>
@endsection
