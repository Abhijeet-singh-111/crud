@extends("layout.app")

@section("content")

<div class='categ-view-all'>
    <h1>All Main Categorie</h1>
    <div class='add-btn'>
    <a href='{{url("/add-categorie")}}'><i class="fas fa-plus"></i> Add Main Categorie</a>
    </div>
    <div class='categ-table'>
        <table class="table" id='listtable'>
            <thead>
                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">Main Categorie</th>
                    <th scope='col'>Status</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach($catelist as $catekey => $cateval)
                <tr>
                    <th scope="row">{{$no++}}</th>
                    <td>{{$cateval->name}}</td>
                    <td>{{$cateval->status}}</td>
                    <td>
                       <div class='controle-btns d-flex'>
                           <a href='{{url("/edit-categorie")."/".base64_encode($cateval->id)}}' class='edit-btn'><i class="far fa-edit"></i> Edit</a>
                           <a href='{{url("/delete-categorie")."/".base64_encode($cateval->id)}}' class='delete-btn'><i class="far fa-trash-alt"></i> Delete</a>
                       </div> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
