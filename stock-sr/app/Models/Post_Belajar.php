<?php

namespace App\Models;

class Post
{
    private static $product_posts = [
        [
            "name"      => "Nama Barang",
            "slug"        => "nama-barang",
            "admin"     => "Riandalis Purnama Deva",
            "deskripsi" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum odio debitis esse error temporibus ullam tempora perspiciatis fugiat eveniet. Corrupti illo laborum iure similique sint voluptas velit aliquam inventore! Itaque quo, porro harum iure omnis, ex eaque natus quidem dignissimos, excepturi obcaecati! Autem mollitia ratione voluptatum. Facilis, aperiam sed amet minima dolorum laudantium dolor, neque ut minus repellendus accusantium libero mollitia odit quos, nostrum molestias. Excepturi molestias maiores illo expedita harum tempore sit minima ad soluta, impedit necessitatibus nam voluptates?"
        ],
        [
            "name"      => "Nama Barang 2",
            "slug"        => "nama-barang-2",
            "admin"     => "Wahit Bagus Bayunara",
            "deskripsi" => "2 Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum odio debitis esse error temporibus ullam tempora perspiciatis fugiat eveniet. Corrupti illo laborum iure similique sint voluptas velit aliquam inventore! Itaque quo, porro harum iure omnis, ex eaque natus quidem dignissimos, excepturi obcaecati! Autem mollitia ratione voluptatum. Facilis, aperiam sed amet minima dolorum laudantium dolor, neque ut minus repellendus accusantium libero mollitia odit quos, nostrum molestias. Excepturi molestias maiores illo expedita harum tempore sit minima ad soluta, impedit necessitatibus nam voluptates?"
        ]
    ];

    public static function all(){
        return collect(self::$product_posts);
    }

    public static function find($slug){
        
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }

    
}
