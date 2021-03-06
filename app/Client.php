<?php

namespace App;

use App\Quote;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lastname','position','company','phone','email',
    ];

    /**
     * Obtiene los cotizaciones de los clientes.
     */
    public function quotes()
    {
        return $this->hasMany('App\Quote');
    }

    /**
    * Scope a query to search clients.
    *
    * @param \Illuminate\Database\Eloquent\Builder $query
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeSearch($query, $search)
    {
        if (trim($search) != "") {
        	return $query->where('id', $search)
        		->orWhere('name', 'LIKE', '%'.$search.'%')
        		->orWhere('lastname', 'LIKE', '%'.$search.'%')
        		->orWhere('email', 'LIKE', '%'.$search.'%')
        		->orWhere('company', 'LIKE', '%'.$search.'%')
        		->orWhere('position', 'LIKE', '%'.$search.'%');
        }
    }
}
