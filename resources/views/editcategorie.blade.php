@extends("layout.app")

@section("content")

<div class='furn-form'>
    <h1>Edit Categorie</h1>
    <form method='post' action="{{url('/edit-categorie').'/'.base64_encode($data->id)}}" id='validform'>
        @csrf
        <div class="form-group">
            <label for="Itemcode">Enter New Categorie</label>
            <input type="text" class="form-control" id='item-code' name='main-categ' value='{{$data->name}}' />
        </div>

        <div class='form-group'>
            <button type='submit' class='btn-custom'>Submit</button>
        </div>
    </form>
</div>

@endsection