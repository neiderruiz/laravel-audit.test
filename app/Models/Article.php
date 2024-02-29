<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["title", "description","deleted_at"];

    public function changes()
    {
        return $this->hasMany(AuditLog::class, 'model_id')
            ->where('model_type', self::class)
            ->orderBy('created_at', 'desc');
    }
}
