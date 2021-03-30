<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Author;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags=Tag::all();
    $authors=Author::all();
    return view('posts.create',compact('authors','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();

        //  dd($data);
        $author_id=$data['author_id'];
        $authors=Author::all();
        // Author::where('id',$author_id)->get();
        // dump(Author::find($author_id));
        if(!Author::find($author_id)){
            // dd('Questo è un check');
            return redirect()->route('posts.index');
            // return redirect su pagina di cortesia
        }


        $post=new Post();
        $post->fill($data);
        $post->save();


        $tagsAll=Tag::all();
        $autotags=$data['tags'];
        // la modifica sotto serve per aggiungere tags anche se non li ho selezinati,
        // semplicemente se sono nel body
        foreach ($tagsAll as $tag) {
        if(stripos($data['body'],$tag->name) !== false){
          $autotags[]=$tag->id;
        }
    }
        // $post->tags()->attach($data['tags']);
        $post->tags()->attach($autotags);
        return redirect()->route('posts.show',compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $authors=Author::all();
        $tags=Tag::all();
        return view('posts.edit',compact('post','authors','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data=$request->all();
        $post->update($data);
        // l'update come store /save,dopo faccio l'attach
        $tagsAll=Tag::all();
        $autotags=$data['tags'];
        // questo snippet ci serve di nuovo se vogliamo prendere tag dal body
        foreach ($tagsAll as $tag) {
        if(stripos($data['body'],$tag->name) !== false){
          $autotags[]=$tag->id;
        }
    }
    // oppure
    // foreach($data['tags'] as $tag) {
    //     if ($tag === null) {
    //         $post->tags()->detach();
    //     } else {
    //         $post->tags()->attach($data['tags']);
    //     }
    // }
    // se qua facessi attach me li aggiungerebbe a campo gia presenti,devo fare sinc
        $post->tags()->sync($autotags);
        return redirect()->route('posts.show',compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
          // detach() vale per many to many ('belongsToMany')
        // $post->tags()->detach();
        // // delete() vale per one to many ('hasMany')
        // $post->comments()->delete();
        // // dissociate vale per one to many ('belongsTo')
        // $post->author()->dissociate();
        $post->delete();
        // oppure come ho fatto metto la on delete cascade nelle tabelle
        return redirect()->route('posts.index');
    }
}
