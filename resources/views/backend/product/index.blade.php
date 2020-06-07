@extends('backend.index')

@section('content')
<hr>
<h1>Danh sách sản phẩm</h1>
<hr>
<div class="row">

<div class="float-md-right"><button type="button" class="btn btn-success"><a href="{{route('backend.product.add')}}">Thêm mới</a></button></div>

</div>
<br>
<table class="table table-hover">
<tr>
    <th>Id</th>
    <th>Name</th>
    <!-- <th>chi tiết</th> -->
    <th>Price</th>
    <th>Imager</th>
    <th>Action</th>
</tr>
@foreach($listU as $value)
    <tr>
    <td>{{$value->id}}</>
    <td>{{$value->name}}</td>
    <!-- <th>{{$value->detail}}</th> -->
    <td>{{$value->price}}</td>
  
        <td>
        <button type="button" class="btn btn-primary">Sửa</button>
        <button type="button" class="btn btn-danger">Xóa</button>
        </td>
    </tr>
    @endforeach
</table>
@endsection
