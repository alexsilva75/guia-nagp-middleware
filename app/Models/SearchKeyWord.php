<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchKeyWord extends Model
{
    use HasFactory;

    protected $table = "search_key_word";
    protected $fillable = ['search_term', 'key_word'];
}
