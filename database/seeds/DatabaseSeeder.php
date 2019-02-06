<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('RolesTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('ModulesTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('ArticlesTableSeeder');
        $this->call(ProfilesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(ImageWoodprojectTableSeeder::class);
        $this->call(WoodprojectsTableSeeder::class);
        $this->call(RecipesTableSeeder::class);
        $this->call(RecipeUserTableSeeder::class);
        $this->call(AlbumsTableSeeder::class);
        $this->call(ArticleUserTableSeeder::class);
        $this->call(GalleryTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(PostTagTableSeeder::class);
    }
}
