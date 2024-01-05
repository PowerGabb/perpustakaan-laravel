<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\BookCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::create([
            'name' => 'Novel',
        ]);

        Category::create([
            'name' => 'Technology',
        ]);

        Category::create([
            'name' => 'History',
        ]);

        Category::create([
            'name' => 'Story',
        ]);

        Role::create([
            'name' => 'admin',
        ]);

        
        Role::create([
            'name' => 'client',
        ]);

        User::create([
            'username' => 'admin',
            'slug' => null,
            'password' => '$2y$10$xpNiLr7I8m1XX3dx64a10.BH0JO6DCth73DvEXQGkzdGrFZhGbgzm',
            'phone' => '081539872889',
            'address' => 'Jl. Mawar No. 4, Bandung',
            'status' => 'active',
            'role_id' => 1
        ]);

        User::create([
            'username' => 'client',
            'slug' => null,
            'password' => '$2y$10$.GbRTa9xfkCoesiEl7js3uKud0cZg52Na26bV8e7.GifY9e1EXuvq',
            'phone' => '081210189246',
            'address' => 'Jl. depok No. 4, Bandung',
            'status' => 'active',
            'role_id' => 2
        ]);

        User::create([
            'username' => 'guest',
            'slug' => null,
            'password' => '$2y$10$.GbRTa9xfkCoesiEl7js3uKud0cZg52Na26bV8e7.GifY9e1EXuvq',
            'phone' => '0812123213',
            'address' => 'Jl. Sudirman No. 4, Bandung',
            'status' => 'inactive',
            'role_id' => 2
        ]);

        

        Book::create([
            'book_code' => 'A-001',
            'title' => 'Perahu Kertas',
            'cover' => '1704477573-Perahu Kertas.jpg',
            'slug' => null,
            'status' => 'in stock'
        ]);

        Book::create([
            'book_code' => 'A-002',
            'title' => 'Bj Habibie',
            'cover' => '1704477722-Bj Habibie.jpg',
            'slug' => null,
            'status' => 'in stock'
        ]);

        Book::create([
            'book_code' => 'A-003',
            'title' => 'Kepemimpinan',
            'cover' => '1704477794-Kepemimpinan.jpg',
            'slug' => null,
            'status' => 'in stock'
        ]);

        Book::create([
            'book_code' => 'A-0034',
            'title' => 'IOT',
            'cover' => '1704477827-IOT.jpg',
            'slug' => null,
            'status' => 'in stock'
        ]);

        BookCategory::create([
            'category_id' => 1,
            'book_id' => 1
        ]);

        BookCategory::create([
            'category_id' => 3,
            'book_id' => 2
        ]);

        BookCategory::create([
            'category_id' => 1,
            'book_id' => 3
        ]);

        BookCategory::create([
            'category_id' => 2,
            'book_id' => 4
        ]);




    }
}
