<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Categorie;

class CategoriesController extends Controller
{
    //
    public function index(){
        $data = Categorie::all()->where('status','active');
        return view('categorieslist',['catelist'=>$data]);
    }
    public function addcate()
    {
        return view("categories");
    }

    public function postform(Request $request){
        $data = $request->input();
        
        $validation = Validator::make($data,[
            'maincateg' => 'string|required'
        ]);

        if($validation->fails() == false){
            $categorie = new Categorie();
            $categorie->name = trim($data['maincateg']);
            $categorie->status = 'active';
            $categorie->save();
            return redirect()->back()->with('success','Categorie Added!');
        }
        else{
            return redirect()->back()->with('error','Failed To Add Categorie');
        }
    }

    public function formeditview(Request $request){
        $id = base64_decode($request->route('id'));
        $data = Categorie::find($id);
        return view('editcategorie',['data'=>$data]); 
    }

    public function formedit(Request $request){
        $id = base64_decode($request->route('id'));
        $data = $request->input();
        $validation = Validator::make($data,[
            'maincateg' => 'string|required'  
        ]);

        if($validation->fails() == false){
            $categorie = Categorie::find($id);
            $categorie->update(['name'=>trim($data['maincateg'])]);
        return redirect('/')->with('success','Categorie Updated!');
        }
        else{
        return redirect()->back()->with('error','Failed To Updated Categorie');
        }
        
    }

    public function formdelete(Request $request){
        $id = base64_decode($request->route('id'));
        $categorie = Categorie::find($id);
        $categorie->update(['status'=>'deactive']);
        return redirect('/')->with('success','Categorie Deactive!');
    }
}
