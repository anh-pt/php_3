@extends('backend.index')

@section('content')
<hr>
<h1>Danh sách sản phẩm</h1>
<hr>
<div class="row" >

<div class="float-md-right"><a href="{{route('backend.product.add')}}"><button type="button" class="btn btn-success">Thêm mới</button></a></div>

</div>
<br>
<table class="table table-hover">
<tr>
    <th>Id</th>
    <th>Name</th>
    <th>Price</th>
    <th>Imager</th>
    <th>Danh mục</th>
    <th>Action</th>
</tr>
@foreach($listU as $value)
    <tr>
    <td>{{$value->id}}</>
    <td>{{$value->name}}</td>
    <td>{{$value->price}}</td>
    <td>
         <img src="../{{$value->imager}}" alt=""width="100px">
    </td>
    <td>
    </td>
        <td>
       <a href="product/edit/{{$value->id}}"><button type="button" class="btn btn-primary"  >Sửa</button></a> 
        <a href="product/delete/{{$value->id}}"><button type="button" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không ?')">Xóa</button></a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
