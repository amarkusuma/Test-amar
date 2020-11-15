<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = [
        'name',
        'email',
        'company_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'company_id' => 'integer',
    ];
    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }


}
