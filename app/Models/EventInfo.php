<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventInfo extends Model
{
    protected $table = 'event_info'; // Specify the new table name

    use HasFactory;
    protected $fillable = ['title', 'date', 'resource_link','url','description','metadata','image']; 
    public function resourceLinks()
    {
        return $this->hasMany(ResourceLink::class);
    }
}
