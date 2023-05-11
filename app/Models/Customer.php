<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use \Illuminate\Auth\Authenticatable;
    static $rules = [
		'name' => 'required',
		'fiscal_data' => 'required',
    'email' => 'required'
    
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'fiscal_data', 'email'];



}
