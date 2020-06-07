@extends('backend.index')

@section('content')
@isset($errs)
    @foreach($errs as $e)
        <p style="color: red"> {{  implode('<br>', $e ) }}  </p>
    @endforeach
@endisset
<h1>Danh mục sản phẩm</h1>
<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Tên danh mục</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtname">
    <small id="emailHelp" class="form-text text-muted">Hãy điền tên sản phẩm</small>
  </div>
  <div class="form-group">
    <label for="">Trạng thái</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="txtstatus" id="on" value="1" checked>
        <label class="form-check-label" for="exampleRadios1">
        on
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="txtstatus" id="off" value="0">
        <label class="form-check-label" for="exampleRadios2">
        off
        </label>
    </div>
    @csrf
  </div>
  <button class="btn btn-primary">Submit</button>
</form>
@endsection