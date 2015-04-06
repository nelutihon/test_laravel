<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class Category extends Model {

    protected $table = 'categories';

    public function product() {
        return $this->hasMany( 'App\Product' );
    }

    public function delete() {
        $this->product()->delete();
        return parent::delete();
    }

}