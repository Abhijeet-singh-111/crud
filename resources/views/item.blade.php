@extends("layout.app")

@section("content")

<div class='furn-form'>
<h1>Furniture form</h1>
<form method='post' action="{{url('/add-item')}}" id='validform' enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label for="Itemcode">Item Code</label>
    <input type="text" class="form-control" id='item-code' name='itemcode' placeholder="Enter item code">
</div>
<div class="form-group">
    <label for="Itemcode">Item Name</label>
    <input type="text" class="form-control" id='item-name' name='itemname' placeholder="Enter item name">
</div>
<div class="form-group" id='categcontainer'>
<label for="Itemcate">Main Categorie</label>
<select class="form-control" id='main-categ' name='maincateg'>
  @foreach($maincateg as $maincateval)
  <option value='{{$maincateval->name}}'>{{$maincateval->name}}</option>
  @endforeach
</select>
</div>
<div class="form-group">
<label for="Itemsubcate">Sub Categorie</label>
<select class="form-control" id='sub-categ' name='subcateg'>
  @foreach($subcateg as $subvalue)
  <option value='{{$subvalue->name}}'>{{$subvalue->name}}</option>
  @endforeach
</select>
</div>

<div class="form-group">
    <label for="exampleFormControlFile1">Add Item Image</label>
    <input type="file" class="form-control-file" name='filename' id="customFile">
</div>

<div class='form-group'>
<button type='submit' class='btn-custom' id='submit-btn'>Submit</button>
</div>

</form>
</div>

@endsection