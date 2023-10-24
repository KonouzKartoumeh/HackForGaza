<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceLink extends Model
{
    use HasFactory;
    public function event_Info()
    {
        return $this->belongsTo(EventInfo::class);
    }
protected $fillable = ['url','data_type_id'];

}
