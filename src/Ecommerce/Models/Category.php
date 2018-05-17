<?php

namespace Ecommerce\Models;

class Category extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'category';
    
    public $frndName =  'Ashu';

    public function products(){
        return $this->hasMany('Ecommerce\Models\Products','cat_id');
    }
    
}   