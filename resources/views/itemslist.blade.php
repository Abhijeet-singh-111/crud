@extends("layout.app")

@section("content")

<div class='categ-view-all'>
    <h1>All Items</h1>
    <div class='add-btn'>
    <a href='{{url("/add-item")}}'><i class="fas fa-plus"></i> Add Item</a>
    </div>
    <div class='categ-table'>
        <table class="table" id='listtable'>
            <thead>
                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">Items</th>
                    <th scope='col'>Status</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach($items as $itemkey => $itemval)
                <tr>
                    <th scope="row">{{$no++}}</th>
                    <td>{{$itemval->item_name}}</td>
                    <td>{{$itemval->status}}</td>
                    <td>
                       <div class='controle-btns d-flex'>
                           <a href='{{url("/edit-item")."/".base64_encode($itemval->id)}}' class='edit-btn'><i class="far fa-edit"></i> Edit</a>
                           <a href='{{url("/delete-item")."/".base64_encode($itemval->id)}}' class='delete-btn'><i class="far fa-trash-alt"></i> Delete</a>
                       </div> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
