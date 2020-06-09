@extends('backend.index')
@section('content')
@isset($errs)
    @foreach($errs as $e)
        <p style="color: red"> {{implode('<br>',$e )}}</p>
    @endforeach
@endisset
<form role="form" action="" method="post" enctype="multipart/form-data">

    <div class="form-group">

        <label for="">Tên sản phẩm</label>

        <input type="text" class="form-control" id="" name="txtname">

    </div>
    <div class="md-form">
        <i class="fas fa-pencil-alt prefix"> </i><label for="form10"> Chi tiết sản phẩm</label>
        <textarea id="form10" class="md-textarea form-control" rows="3" name="txtdetail"></textarea>
        
    </div>
    <div class="form-group">

        <label for="">Giá</label>

        <input type="number" class="form-control" id="" name="txtprice">

    </div>
    <div class="form-group">

        <label for="">Ảnh sản phẩm</label>

        <input type="file" class="form-control" id="" name="f_up_image">

    </div>
    <!-- <div class="form-group">
        <select id="cars">
            <option value="volvo">Volvo</option>
        </select>
    </div> -->
  <button class="btn btn-default">Save</button>
@csrf
</form>
<?php 

?>

@endsection