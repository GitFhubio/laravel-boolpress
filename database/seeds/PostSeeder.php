<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Author;
use App\AuthorDetails;
use App\Comment;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <20 ; $i++) {
            $author= new Author();
            $author->name=$faker->firstName();
            $author->surname=$faker->lastName();
            $author->email= $faker->email();
            $author->save();

            $authorDetail= new AuthorDetails();
            $authorDetail->bio=$faker->text();
            $authorDetail->website=$faker->url();
            $authorDetail->pic= 'https://picsum.photos/seed/'.rand(0, 1000).'/200/300';
            $author->detail()->save($authorDetail);
            // quella di sopra è una one to one la posso fare subito
            for ($x=0; $x < rand(2, 5); $x++) {
                $post=new Post();
                $post->title= $faker->text(20);
                $post->body= $faker->text(1000);

                // for ($v=0;$v < rand(2, 5) ; $v++) {
                //     $comment=new Comment();
                //     $comment->body= $faker->text(20);
                //     $comment->likes= rand(0,1000);
                //     $post->comments()->save($comment);
                // }

                $author->posts()->save($post);
            }

            //$authorDetail->author_id=$author->id;
        // vai nell'autore,prendi il suo dettaglio(il metodo ritorna un authordetail che inizializza)
        }
    }
}
