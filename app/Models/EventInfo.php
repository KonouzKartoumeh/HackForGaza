<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventInfo extends Model
{
    protected $table = 'event_info'; // Specify the new table name

    use HasFactory;
    protected $fillable = ['title', 'date', 'resource_link','url','description','event_year','metadata','priority_level','image']; 
    public function resourceLinks()
    {
        return $this->hasMany(ResourceLink::class);
    }
    public function eventsForYear($year)
    {
        return $this->date ? date('Y', strtotime($this->date)) : null;
    }
}
