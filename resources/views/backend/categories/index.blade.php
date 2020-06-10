@extends('backend.index')

@section('content')
<hr>
<h1>Danh mục sản phẩm</h1>
<hr>
<div class="row">

<div class="float-md-right">
<a href="{{route('backend.categories.add')}}"><button type="button" class="btn btn-success">Thêm mới</button></a></div>

</div>
<br>
<table class="table table-bordered">
<tr>
    <th>Id</th>
    <th>Name</th>
    <th>Hiển thị</th>
    <th>Action</th>
</tr>
@foreach($list as $value)
    <tr>
        <td>{{$value->id}}</>
        <td>{{$value->cate_name}}</td>
        <td>
            <?php
                if($value->status==1)
                {
                    echo "on";
                }
                else
                {
                    echo "off";
                }
            ?>
        </td>
        <td>
        <a href="{{route('backend.categories.edit',['id'=>$value->id])}}"><button type="button"  class="btn btn-primary">sửa</button></a>
           <a href="{{route('backend.categories.delete',['id'=>$value->id])}}"> <button type="button" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không ?')">Xóa</button></a>
        </td>
    </tr>
    @endforeach
</table>
@endsection