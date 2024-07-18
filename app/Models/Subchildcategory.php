<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subchildcategory extends Model
{
    protected $fillable = ['childcategory_id','name','slug'];
    public $timestamps = false;

    public function childcategory()
    {
    	return $this->belongsTo('App\Models\Childcategory');
    }

    public function subcategory()
    {
    	return $this->belongsTo('App\Models\Subcategory');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_replace(' ', '-', $value);
    }

    public function attributes() {
        return $this->morphMany('App\Models\Attribute', 'attributable');
    }
}
