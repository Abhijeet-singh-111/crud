<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Items;
use App\Models\Categorie;
use App\Models\Subcategorie;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $items = Items::all()->where('status','active');
      return view('itemslist',['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $maincateg = Categorie::where('status','active')->get();
        $subcateg = Subcategorie::where('status','active')->get();
        
        return view('item',['maincateg'=>$maincateg, 'subcateg'=>$subcateg]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();
        $validation = Validator::make($data,[
        'itemcode'=> 'string|max:20|required',
        'itemname'=> 'string|max:20|required',
        'maincateg'=> 'string|required',
        'subcateg'=> 'string|required',
        'filename'=> 'mimes:jpeg,jpg,bmp,png,webp'  
        ]);

        if($validation->fails() == false){
            $file = $request->file('filename');
            $fileexten = $file->extension();
            $filename = $file->getClientOriginalName();
            $renamefile = Str::random(10).'.'.$fileexten;
            Storage::putFileAs('public', $file, $renamefile);

            $subcateid = Subcategorie::where('name',trim($data['subcateg']))->where('status','active')->first();
            $item = new Items();
            $item->sub_cate_id = $subcateid->id;
            $item->item_name = trim($data['itemname']);
            $item->item_code = trim($data['itemcode']);
            $item->item_image = trim($renamefile);
            $item->status = 'active';
            $item->save();
            return redirect('/list-items')->with('success','Item Added Successfuly');
            
        }
        else{
            return redirect('/list-items')->with('error','Failed To Add Items');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $id = base64_decode($id);
       $getitem = Items::find($id);
       $getallsubcate = Subcategorie::all();
       $getallmaincate = Categorie::all();
       $getsubcate = Subcategorie::find($getitem->sub_cate_id);
       $getmaincate = Categorie::find($getsubcate->categorie_id);
       $subcatename = $getsubcate->name;
       $maincatename = $getmaincate->name;

       return view('edititem',['getitem'=>$getitem,
       'getallsubcate'=>$getallsubcate,
       'getallmaincate'=>$getallmaincate,
       'subcatename'=>$subcatename,
       'getmaincate'=>$getmaincate, 
       'maincatename'=>$maincatename]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $id = base64_decode($id);
        $data = $request->input();
        $validation = Validator::make($data,[
        'itemcode'=> 'string|max:20|required',
        'itemname'=> 'string|max:20|required',
        'maincateg'=> 'string|required',
        'subcateg'=> 'string|required',
        'filename'=> 'mimes:jpeg,jpg,bmp,png,webp'  
        ]);

        if($validation->fails() == false){
            $item = Items::find($id);
            // 

            $file = $request->file('filename');
            $fileexten = $file->extension();
            $filename = $file->getClientOriginalName();
            $renamefile = Str::random(10).'.'.$fileexten;
            Storage::delete('public/'.$item->item_image);
            Storage::putFileAs('public', $file, $renamefile);
            
            $subcateid = Subcategorie::where('name',trim($data['subcateg']))->where('status','active')->first();
            
            $updatedata = array(
            'sub_cate_id'=>$subcateid->id,
            'item_name'=>trim($data['itemname']),
            'item_code'=>trim($data['itemcode']),
            'item_image'=>trim($renamefile),
            'status'=>'active'
            );
            $item->update($updatedata);
            return redirect('/list-items')->with('success','Item Updated Successfuly');
            
        }
        else{
            return redirect('/list-items')->with('error','Failed To Update Items');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $id = base64_decode($id);
        $item = Items::find($id);
        //Storage::delete('public/'.$item->item_image);
        $item->update(['status'=>'deactive']);
        return redirect('/list-items')->with('success','Item Deactive!');

    }
}
