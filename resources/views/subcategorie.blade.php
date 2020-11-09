@extends("layout.app")

@section("content")
<div class='furn-form'>
    <h1>Add Sub Categorie</h1>
    <form method='post' action="{{url('/add-subcategorie')}}" id='validform'>
        @csrf
        <div class='select-cate-div'>
        <div class="form-group">
        <label for="Itemcode">Select Sub Categorie</label>
            <select class="custom-select" name='maincateg' >
                @foreach($maincate as $catekey => $catevalue)
                <option value='{{$catevalue->name}}'>{{$catevalue->name}}</option>
                @endforeach
            </select>
        </div>
        </div>
        <div class="form-group">
            <label for="Itemcode">Enter Sub Categorie</label>
            <input type="text" class="form-control" id='cate-name' name='subcateg' placeholder="Enter categorie" />
        </div>

        <div class='form-group'>
            <button type='submit' class='btn-custom'>Submit</button>
        </div>
    </form>
</div>
@endsection