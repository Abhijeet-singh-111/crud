@extends("layout.app")

@section("content")

<div class='furn-form'>
    <h1>Add Categorie</h1>
    <form method='post' action="{{url('/add-categorie')}}" id='validform'>
        @csrf
        <div class="form-group">
            <label for="Itemcode">Enter Categorie</label>
            <input type="text" class="form-control" id='cate-name' name='maincateg' placeholder="Enter categorie" />
        </div>

        <div class='form-group'>
            <button type='submit' class='btn-custom'>Submit</button>
        </div>
    </form>
</div>

@endsection