<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categoryList = [
            'cronaca',
            'sport',
            'opinione',
            'musica',
            'cinema',
            'moda'
        ];

        
        $listOfCategoryID = [];  

        foreach($categoryList as $category) {

            $categoryObject = new Category();

            $categoryObject->name = $category;
            $categoryObject->save();
            
            $listOfCategoryID[] = $categoryObject->id;
        }





        for($i=0;$i<50; $i++){
            $post= new Post();
            $post->title= $faker->sentence(5);
            $post->author= $faker->words(2,true);
            $post->img_path= $faker->imageUrl(360, 360);

            //dalla lista degli indici ne estrae uno random restituendoci il suo indice nella lista
            $randIndexofIndex = array_rand($listOfCategoryID, 1);
            //utilizzando l'indice randomico salviamo il valore corrispondente nella variabile $categoryID
            $categoryID = $listOfCategoryID[$randIndexofIndex];
            //assegno questo valore alla proprietà category_id
            $post->category_id = $categoryID;

            $post->save();

        }
    }
}
