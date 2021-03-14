<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'education',
        'personal_information',
        'image',
    ];

    public function profileImage() {
        $imagePath = $this->image ? $this->image : 'profile/default.jpg';

        return $imagePath;
    }

    public function friends() {
        return $this->belongsToMany(User::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
