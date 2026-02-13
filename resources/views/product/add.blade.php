@extends('layout.admin') {{-- Kế thừa layout AdminLTE --}}

@section('title', $title) {{-- $title truyền từ controller --}}

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thêm mới sản phẩm</h3>
    </div>
    <div class="card-body">
        {{-- Hiển thị lỗi validate --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('product.add.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Tên sản phẩm:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label>Giá:</label>
                <input type="number" name="price" class="form-control" value="{{ old('price') }}">
            </div>
            <div class="form-group">
                <label>Stock:</label>
                <input type="number" name="stock" class="form-control" value="{{ old('stock') }}">
            </div>
            <div class="form-group">
                <label>Mô tả:</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
        </form>
    </div>
</div>
@endsection
