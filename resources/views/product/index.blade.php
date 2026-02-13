@extends('layout.admin')

@section('title', $title)

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Danh sách sản phẩm</h3>
        <a href="{{ route('product.add') }}" class="btn btn-primary btn-sm float-right">Thêm mới sản phẩm</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Stock</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ number_format($p->price, 0, ',', '.') }} VNĐ</td>
                        <td>{{ $p->stock }}</td>
                        <td>
                            <a href="{{ route('product.detail', ['id' => $p->id]) }}" class="btn btn-info btn-sm">Xem</a>
                            <a href="{{ route('product.edit', ['id' => $p->id]) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('product.destroy', ['id' => $p->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
