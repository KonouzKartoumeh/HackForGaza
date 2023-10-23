<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateframeInfo extends Model
{
    protected $table = 'dateframe_info'; // Specify the new table name

    use HasFactory;
    protected $fillable = ['content', 'year', 'resource_link','url','summary','metadata']; // Add 'content' here
    public function resourceLinks()
    {
        return $this->hasMany(ResourceLink::class);
    }
}
