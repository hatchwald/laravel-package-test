<?php
namespace MTR\PostPackage\Facades;

use Illuminate\Support\Facades\Facade;

class FilterPost extends Facade{
    protected static function getFacadeAccessor(){
        return 'filterpost';
    }
}   