<?php

use Illuminate\Database\Seeder;
use App\Tag;
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags=['sport','calcio','gossip','tecnologia','spazio','salute','cronaca'];
        foreach ($tags as $tag) {
          $newtag=new Tag();
          $newtag->name=$tag;
          $newtag->save();
        }
    }
}
