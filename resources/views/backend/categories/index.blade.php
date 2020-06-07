@extends('backend.index')

@section('content')
<hr>
<h1>Danh mục sản phẩm</h1>
<hr>
<div class="row">

<div class="float-md-right"><button type="button" class="btn btn-success"><a href="{{route('backend.categories.add')}}">Thêm mới</a></button></div>

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
        <td>{{$value->name}}</td>
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
        <a href="/anhptph07858_php3/public/backend/categories/edit/{{$value->id}}"><button type="button" class="btn btn-primary">Update</button></a>
            <button type="button" class="btn btn-danger">Xóa</button>
        </td>
    </tr>
    @endforeach
</table>
@endsection