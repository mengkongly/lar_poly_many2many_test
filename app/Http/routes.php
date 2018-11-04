<?php
use App\Model\Tag;
use App\Model\Post;
use App\Model\Video;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create_post_video',function(){
    $post   =   Post::create(['name'=>'My first post']);
    $post->tags()->save(Tag::find(1));

    $video  =   Video::create(['name'=>'video.mov']);
    $video->tags()->save(Tag::find(3));

});

Route::get('/post/{id}/tag',function($id){
    $post   =   Post::findOrFail($id);
    return $post->tags;
});

Route::get('/video/{id}/tag',function($id){

    return Post::findOrFail($id)->tags;
});

Route::get('/post/{id}/up_tag/{tag_id}/{to_tag_id}',function($id,$tag_id,$to_tag_id){
    return Post::findOrFail($id)->tags()->where('tag_id',$tag_id)->update(['tag_id'=>$to_tag_id]);
});

Route::get('/post/{id}/del_tag/{tag_id}',function($id,$tag_id){
    $post   =   Post::findOrFail($id);
    return $post->tags()->detach($tag_id);
});
