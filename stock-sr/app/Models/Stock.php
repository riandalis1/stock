<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['category', 'user'];

    public function scopeFilter($query, array $filters){

        // if(isset($filters['search']) ? $filters['search'] : false){
        //     return $query->where('name', 'like', '%' . $filters['search'] . '%')
        //     ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                            ->orWhere('body', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category){
                $query->where('slug', $category);
            });
        });
    }

    // Relation
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
