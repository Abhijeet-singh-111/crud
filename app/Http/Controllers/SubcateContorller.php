<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Categorie;
use App\Models\Subcategorie;

class SubcateContorller extends Controller
{
    public function index(){
        $data = Subcategorie::all()->where('status','active');
        return view('subcategorielist',['catelist'=>$data]);
    }

    public function addsubcate(){
        $getmaincate = Categorie::all()->where('status','active');
        return view('subcategorie',['maincate'=>$getmaincate]);
    }

    public function postform(Request $request){
        $data = $request->input();
  
        $validation = Validator::make($data,[
            'subcateg' => 'string|required',
            'maincateg' => 'string|required',
        ]);

        if($validation->fails() == false){
            $getmaincategid = Categorie::all()->where('name',trim($data['maincateg']))->first();
            $categorie = new Subcategorie();
            $categorie->name = trim($data['subcateg']);
            $categorie->categorie_id = $getmaincategid->id;
            $categorie->status = 'active';
            $categorie->save();
            return redirect()->back()->with('success','Sub Categorie Added!');
        }
        else{
            return redirect()->back()->with('error','Failed To Add Sub Categorie');
        }
    }

    public function formeditview(Request $request){
        $id = base64_decode($request->route('id'));
        $data = Subcategorie::where('status','active')->where('id',$id)->first();
        $getmaincategname = Categorie::all()->where('id',$data->categorie_id)->first();
        $getmaincateg = Categorie::all()->where('status','active');
        return view('editsubcategorie',['data'=>$data, 
        'maincategname'=>$getmaincategname->name, 
        'getmaincateg'=>$getmaincateg]); 
    }

    public function formedit(Request $request){
        $id = base64_decode($request->route('id'));
        $data = $request->input();
        $validation = Validator::make($data,[
            'maincateg' => 'string|required',
            'subcateg'=> 'string|required',  
        ]);

        if($validation->fails() == false){
            
            $categorie = Categorie::all()->where('name',trim($data['maincateg']))->first();
            $subupdate = Subcategorie::find($id)->where('status','active')->first();
            $updatedata = array('categorie_id'=>$categorie->id,'name'=>trim($data['subcateg']));
            $subupdate->update($updatedata);
        return redirect('/list-subcategorie')->with('success','Sub Categorie Updated!');
        }
        else{
        return redirect()->back()->with('error','Failed To Updated Sub Categorie');
        }
        
    }

    public function formdelete(Request $request){
        $id = base64_decode($request->route('id'));
        $subcategorie = Subcategorie::find($id);
        $subcategorie->update(['status'=>'deactive']);
        return redirect('/list-subcategorie')->with('success','Categorie Deactive!');
    }
}
