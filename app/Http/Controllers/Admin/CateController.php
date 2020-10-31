<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Categories;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CateController extends Controller
{
//    public function showParent(){
//        $parent = Categories::where('parent',NULL)->get();
//        return view('admin.categories.create_categories', compact('parent'));
//    }

    // show categories page with 10 item
    public function index()
    {
        $cate = DB::table('categories')->paginate(10);
        return view('admin.categories.categories', compact('cate'));
    }

    // render page create categories
    public function create()
    {
        $parent = Categories::where('parent',NULL)->get();
        $cateItem = Categories::all();
        return view('admin.categories.create_categories', compact('cateItem','parent'));
    }

    // save categories db
    public function store(Request $req)
    {
        $isCateName = Categories::where('cate_name', $req->input('cate_name'))->first();
        if ($isCateName) {
            return redirect()->back()->with('create_failed', __('message.create_categories_failed_existed'));
        }
        do {
            $uuid = (string)Str::uuid();
        } while (!Categories::where('uuid', '$uuid'));
        $req['uuid'] = $uuid;

        $createCate = new Categories();
        $createCate->cate_id = $req->get('uuid');
        $createCate->cate_name = $req->get('cate_name');
        $createCate->cate_image = $req->get('cate_image');
        $createCate->parent = $req->get('parent_select');
        $createCate->save();

        return redirect(route('categories'))->with("create_success", __('message.create_success'));
    }

    // edit categories by ID
    public function edit($id)
    {
        $parent = Categories::where('parent',NULL)->get();
        $cateItem = Categories::find($id);
        $catePurpose = Categories::where('cate_purpose','!=', NULL)->get();
        return view('admin.categories.edit_categories', compact('cateItem','parent','catePurpose'));
    }

    // update categories
    public function update(Request $req, $id)
    {
        $updateItem = Categories::find($id);

        $updateItem->cate_name = $req->input('cate_edit_name');
        $updateItem->cate_image = $req->input('cate_edit_image');
        $updateItem->parent = $req->input('parent_edit_select');
        $updateItem->cate_purpose = $req->input('cate_edit_purpose');
        $updateItem->save();

        return redirect(route('categories'))->with("update_success", __('message.update_success'));
    }

    // delete categories
    public function destroy($id)
    {
        $removeCat = Categories::find($id);
        $removeCat->delete();
        return redirect(route('categories'))->with("delete_success", __('message.delete_success'));
    }
}
