@extends('layout.app')
@section('content')
<div class="container">
    <h2>Bạn có muốn xóa loại sản phẩm này</h2>
    <form method="post" action="{{ route('admin.type.post-delete') }}" enctype="multipart/form-data">
        <table class="table table-bordered">
            <input type="hidden" name="MaLoai" value="{{ $type->$type_id }}" />
            <tr>
                <td><label class="form-label">Tên Loại</label></td>
                <td>{{ $type_name }}</td>
            </tr>
        </table>
        <button type="submit" class="btn action-1">Xóa</button>
        <a href="./index.php" class="btn action-2">Huỷ</a>
    </form>
</div>
@endsection
