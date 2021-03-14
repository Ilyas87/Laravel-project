<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'image',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function deleteImage() {
        if (!$this->image)
            return;

        $path = storage_path('public/' . $this->image);

        if (file_exists($path))
            unlink($path);
    }
}
