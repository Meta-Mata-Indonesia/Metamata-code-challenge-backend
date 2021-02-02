<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    use HasFactory;
    protected $table = 'likes';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'count_likes',
        'story',
        'user_id',
        'updated_at',
        'created_at',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
