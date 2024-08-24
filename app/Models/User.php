<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class, 'fk_department');
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class, 'fk_designation');
    }
}
