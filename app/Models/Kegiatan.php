<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';

    protected $fillable = ['title', 'start', 'end', 'description', 'type', 'user_id'];

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
