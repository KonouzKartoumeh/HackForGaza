<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'date_frame'; // Specify the new table name

    use HasFactory;
    protected $fillable = ['content', 'year', 'resource_link']; // Add 'content' here
    public function resourceLinks()
    {
        return $this->hasMany(ResourceLink::class);
    }
}
