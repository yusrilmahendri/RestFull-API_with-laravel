<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostCollection;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Http\Resources\Post\PostResource;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{   

    public function __construct(){
        $this->middleware('auth:api');
    }
    /* BREAD END POINTS */


    public function index(){
        /* for chechk sql */
        // DB::listen(function($query){
        //     var_dump($query->sql);
        // });
        
        // eger word data make method with
        $data = Post::with(['user'])->paginate(5);

        // with resource collection 
        return new PostCollection($data);

        // return response()->json(
        //     $data, 200
        // );
    }

    public function show($id){

        $data = Post::findOrFail($id);
        
        if(is_null($data)){
            return response()->json([
                'message' => 'Resource Not Found!'
            ], 404);
        }

        return new PostResource($data);
        // return response()->json(
        //     $data, 200
        // );
    }

    public function store(Request $request){

        $data = $request->all();
        $validator =  FacadesValidator::make($data, [
            'title' => 'require|min:5'
        ]);
        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ], 400);
        }

        $post = Post::create($data);
        return response()->json(
            $post, 201,
        );
    }

    public function update(Request $request, Post $post){
        $post->update($request->all());
        return response()->json(
            $post, 200
        );
    }

    public function destory(Post $post){
        $post->delete();
        return response()->json('success', 200);
    }

}
