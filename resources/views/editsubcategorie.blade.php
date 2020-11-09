@extends("layout.app")

@section("content")
<div class='furn-form'>
    <h1>Edit Sub Categorie</h1>
    <form method='post' action="{{url('/edit-subcategorie').'/'.base64_encode($data->id)}}" id='validform'>
        @csrf
        <div class='select-cate-div'>
        <div class="form-group">
        <label for="Itemcode">Select Sub Categorie</label>
            <select class="custom-select" name='maincateg' >
                @foreach($getmaincateg as $catekey => $catevalue)
                @if($catevalue->name == $maincategname)
                <option value='{{$catevalue->name}}' selected >{{$catevalue->name}}</option>
                @else
                <option value='{{$catevalue->name}}'>{{$catevalue->name}}</option>
                @endif
                @endforeach
            </select>
        </div>
        </div>
        <div class="form-group">
            <label for="Itemcode">Enter New Sub Categorie</label>
            <input type="text" class="form-control" id='cate-name' name='subcateg' value='{{$data->name}}' />
        </div>

        <div class='form-group'>
            <button type='submit' class='btn-custom'>Submit</button>
        </div>
    </form>
</div>
@endsection