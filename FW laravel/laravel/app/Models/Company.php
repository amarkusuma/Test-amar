<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';   
    
    protected $fillable = [
         'name',
         'email',
         'logo',
         'website',
    ];

    protected $casts = [
         'id' => 'integer',
         'name' => 'string',
         'email' => 'string',
         'logo' => 'string',
         'website' => 'striing',
    ];

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
