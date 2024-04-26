@extends('layouts.app')
@section('content')
<style>
    .hidden {
        display: none;
    }
</style>
<div class="container">
    <h2>Chỉnh sửa sản phẩm</h2>
    <form method="post" action="{{ route('admin.product.post-update') }}" enctype="multipart/form-data">
        @csrf
        <table class="table table-bordered">
            <input type="hidden" name="id" value="{{ $product->id }}" />
            <tr>
                <td><label class="form-label">Tên sản phẩm</label></td>
                <td>
                    <input type="text" value="{{ $product->name ?? old('name') }}" class="form-control" id="name" placeholder="Tên sản phẩm" name="name" />
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Giá</label></td>
                <td>
                    <input type="text" value="{{ $product->price ?? old('price') }}" class="form-control" id="price" placeholder="Giá tiền" name="price" />
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Thông tin sản phẩm</label></td>
                <td>
                    <input type="text" value="{{ $product->description ?? old('description')  }}" class="form-control" id="description" placeholder="Thông tin" name="description" />
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Chọn ảnh</label></td>
                <td>
                    <input type="file" class="form-control" id="photo" name="photo"/>
                    <br />

                    <input type="hidden" name="img_old" value="{{ $product->photo }}">
                    <img id="preview" src="{{ asset('storage/product/'.$product->photo.'') }}" width="150" height="100" />
                    @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Số lượng</label></td>
                <td>
                    <input type="text" value="{{ $product->quantity ?? old('quantity') }}" class="form-control" id="quantity" placeholder="Số lượng" name="quantity" />
                    @error('quantity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Loại sản phẩm</label></td>
                <td>
                    <select class="form-control" id="product_type_id" name="product_type_id">
                        <option value="{{ $product->product_type_id }}">{{ $product->product_type->type_name }}</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                        @endforeach
                    </select>
                    @error('product_type_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Thương hiệu</label></td>
                <td>
                    <select class="form-control" id="brand_id" name="brand_id">
                        <option value="{{ $product->brand_id }}">{{ $product->brand->brand_name }}</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
        </table>
        <button type="submit" class="btn action-1">Sửa</button>
        <a href="{{ route('admin.product.index') }}" class="btn action-2">Huỷ</a>
    </form>
</div>
<script>
    photo.onchange = evt => {
        const [file] = photo.files
        if (file) {
            preview.src = URL.createObjectURL(file);
            $("#preview").removeClass("hidden");
        }
    }
</script>

@endsection
