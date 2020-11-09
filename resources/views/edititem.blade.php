@extends("layout.app")

@section("content")

<div class='furn-form'>
<h1>Furniture form</h1>
<form method='post' action="{{url('/edit-item').'/'.base64_encode($getitem->id)}}" id='validform' enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label for="Itemcode">Item Code</label>
    <input type="text" class="form-control" id='item-code' name='itemcode' value='{{$getitem->item_code}}' >
</div>
<div class="form-group">
    <label for="Itemcode">Item Name</label>
    <input type="text" class="form-control" id='item-name' name='itemname' value='{{$getitem->item_name}}' >
</div>
<div class="form-group" id='categcontainer'>
<label for="Itemcate">Main Categorie</label>
<select class="form-control" id='main-categ' name='maincateg'>
  @foreach($getallmaincate as $maincateval)
  @if($maincateval->name == $maincatename)
  <option value='{{$maincateval->name}}' selected >{{$maincateval->name}}</option>
  @else
  <option value='{{$maincateval->name}}'>{{$maincateval->name}}</option>
  @endif
  @endforeach
</select>
</div>
<div class="form-group">
<label for="Itemsubcate">Sub Categorie</label>
<select class="form-control" id='sub-categ' name='subcateg'>
dd();
  @foreach($getallsubcate as $subvalue)
  @if($subvalue->name == $subcatename)
  <option value='{{$subvalue->name}}' selected >{{$subvalue->name}}</option>
  @else
  <option value='{{$subvalue->name}}'>{{$subvalue->name}}</option>
  @endif
  @endforeach
</select>
</div>

<div class="form-group">
    <label for="exampleFormControlFile1">Add Item Image</label>
    <input type="file" class="form-control-file" name='filename' id="customFile">
</div>

<div class='exsisting-image'>
<label>Exsisting image</label>
<img src='{{asset("storage")."/".$getitem->item_image}}' alt='image' />
</div>

<div class='form-group'>
<button type='submit' class='btn-custom' id='submit-btn'>Submit</button>
</div>

</form>
</div>

@endsection