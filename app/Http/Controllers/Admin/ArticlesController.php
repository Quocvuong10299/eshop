<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;;

use App\Models\Articles;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = DB::table('articles')->paginate(10);
        return view('admin.articles.articles',compact('articles'));
    }

    public function detail($id)
    {
        $articles = Articles::find($id);
        return view('admin.articles.detail_articles', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create_articles');
    }

    public function store(Request $req){
        do {
            $uuid = (string)Str::uuid();
        } while (!Articles::where('uuid', '$uuid'));
        $req['uuid'] = $uuid;

        $createArticles = new Articles();

        $createArticles->article_id = $req->get('uuid');
        $createArticles->article_name = $req->get('article_name');
        $createArticles->article_image = $req->get('article_image');
        $createArticles->article_short_des = $req->get('article_short_des');
        $createArticles->article_content = $req->get('article_content');

        $createArticles->seo_keywords = $req->get('seo_keywords');
        $createArticles->seo_des = $req->get('seo_des');
        $createArticles->seo_img = $req->get('seo_img');

        $createArticles->save();
        return redirect(route('articles'))->with("create_success", __('message.create_success'));
    }

    public function edit($id)
    {
        $updateArticles = Articles::find($id);
        return view('admin.articles.edit_articles', compact('updateArticles'));
    }

    public function update(Request $req, $id)
    {
        $updateArticles = Articles::find($id);

        $updateArticles->article_name =  $req->input('article_edit_name');
        $updateArticles->article_image = $req->input('article_edit_image');
        $updateArticles->article_short_des = $req->input('article_edit_short_des');
        $updateArticles->article_content = $req->input('article_edit_content');

        $updateArticles->seo_keywords = $req->input('seo_edit_keywords');
        $updateArticles->seo_des = $req->input('seo_edit_des');
        $updateArticles->seo_img = $req->input('seo_edit_img');
        $updateArticles->save();

        return redirect(route('articles'))->with("update_success", __('message.update_success'));
    }

    public function destroy($id)
    {
        $removeArticle = Articles::find($id);
        $removeArticle->delete();
        return redirect(route('articles'))->with("delete_success", __('message.delete_success'));
    }

}
