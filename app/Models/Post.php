<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class Post extends Model
{ 
    use HasFactory;
    protected $guarded = [''];
    protected $hidden = ['created_at', 'updated_at'];
    protected $appends = ['store_at'];


    // public function getStoredAtAttribute(){
    //     return $this->created_at->diffForHumans();
    // }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

}
