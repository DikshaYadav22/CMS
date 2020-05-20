 <?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *po
     * @return void
     */
    public function run()

    {
        $tag1 = Tag::create([
            'name' => 'Record'
        ]);

        $tag2 = Tag::create([
            'name' => 'Customers'
        ]);

        $tag3 = Tag::create([
            'name' => 'Job'
        ]);

        $tag4 = Tag::create([
            'name' => 'Design'
        ]);

        

        
        $category1 = Category::create([
                'name' => 'News'
        ]);

        $category2 = Category::create([
            'name' => 'Marketing'
        ]);

        $category3 = Category::create([
        'name' => 'Partnership'
        ]);

        $post1 = Post::create([
            'title' => 'Laravel React Rocks',
            'content'=>'Laravel is a free, open-source[3] PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern and based on Symfony. Some of the features of Laravel are a modular packaging system with a dedicated dependency manager, different ways for accessing relational databases, utilities that aid in application deployment and maintenance, and its orientation toward syntactic sugar.',
            'description'=> 'Laravel is awesome', 
            'category_id' => $category1->id,
            'image' => 'posts/4.jpg'
            
        ]);
    

            $post2 = Post::create([
                'title' => 'Magento Rocks',
                'content'=>'Laravel is a free, open-source[3] PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern and based on Symfony. Some of the features of Laravel are a modular packaging system with a dedicated dependency manager, different ways for accessing relational databases, utilities that aid in application deployment and maintenance, and its orientation toward syntactic sugar.',
                'description'=> 'Laravel is awesome', 
                'category_id' => $category2->id,
                'image' => 'posts/1.jpg'
            ]);
        

        $post3 = Post::create([
            'title' => 'React Rocks',
            'content'=>'Laravel is a free, open-source[3] PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern and based on Symfony. Some of the features of Laravel are a modular packaging system with a dedicated dependency manager, different ways for accessing relational databases, utilities that aid in application deployment and maintenance, and its orientation toward syntactic sugar.',
            'description'=> 'Laravel is awesome', 
            'category_id' => $category2->id,
            'image' => 'posts/2.jpg'
        ]);
        

        $post4 = Post::create([
            'title' => 'Nodejs Rocks',
            'content'=>'Laravel is a free, open-source[3] PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern and based on Symfony. Some of the features of Laravel are a modular packaging system with a dedicated dependency manager, different ways for accessing relational databases, utilities that aid in application deployment and maintenance, and its orientation toward syntactic sugar.',
            'description'=> 'Laravel is awesome', 
            'category_id' => $category3->id,
            'image' => 'posts/3.jpg'
        ]);

        $post1->tags()->attach([$tag1->id, $tag3->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post3->tags()->attach([$tag1->id, $tag4->id]);
        $post4->tags()->attach([$tag2->id, $tag4->id]);
    }
}