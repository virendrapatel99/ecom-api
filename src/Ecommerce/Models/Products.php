<?php

namespace Ecommerce\Models;

class Products extends \Illuminate\Database\Eloquent\Model {
    
    protected $table = 'products';

    public function category(){
        return $this->belongsTo('Ecommerce\Models\Category','id');
    }

}