<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::paginate(3);
        //qui sotto abbiamo una query di tipo sql: 
        $posts = DB::table('posts')
        ->select(
            'posts.id',
            'posts.title',
            'posts.content',
            'posts.slug',
            'posts.created_at as date', // --> gli possiamo dare un nome tramite as
            'categories.name as category'
        )
        ->join('categories','posts.category_id','categories.id')
        ->paginate(3);
        return response()->json($posts);
    }

    
   
    public function show($slug) {
        $post = Post::where('slug', $slug)->with(['category', 'tags'])->first();
        if($post) {

            $data = [
                'success' => true,
                'result' => $post
            ];
            return response()->json($data);
        }
        return response()->json([
            'success' => false,
            'error' => 'Nessun post trovato'
        ]);
    }
}
