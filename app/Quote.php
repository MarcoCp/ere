<?php

namespace App;

use App\Client;
use Illuminate\Database\Eloquent\Model;

class quote extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','client_id','date','project','budget',
    ];

    /**
     * Obtiene los clientes de las cotizaciones.
     */
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    /**
     * Obtiene los detalles de las cotizaciones.
     */
    public function quotedetails()
    {
        return $this->hasMany('App\QuoteDetails');
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
        		->orWhere('project', 'like', '%'.$search.'%')
        		->orWhere('date', 'like', '%'.$search.'%')
        		->orWhere('budget', 'like', '%'.$search.'%')
                ->orWhereHas('client', function ($query) use ($search)
                {
                    $query->where('name', 'like', '%'.$search.'%')
                        ->orwhere('lastname', 'like', '%'.$search.'%');   
                });
        }
    }
}
