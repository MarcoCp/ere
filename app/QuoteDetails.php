<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuoteDetails extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quote_id','category','name','duration','pricehour','price',
    ];

    /**
     * Obtiene las cotizaciones de los detalles.
     */
    public function quote()
    {
        return $this->belongsTo('App\Quote');
    }

    /**
    * Scope a query to search quote details.
    *
    * @param \Illuminate\Database\Eloquent\Builder $query
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeSearch($query, $search)
    {
        if (trim($search) != "") {
        	return $query->where('id', $search)
        		->orWhere('category', 'LIKE', '%'.$search.'%')
        		->orWhere('name', 'LIKE', '%'.$search.'%')
        		->orWhere('duration', 'LIKE', '%'.$search.'%')
        		->orWhere('pricehour', 'LIKE', '%'.$search.'%')
        		->orWhere('price', 'LIKE', '%'.$search.'%');
        }
    }
}
