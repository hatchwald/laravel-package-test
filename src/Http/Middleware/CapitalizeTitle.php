<?php
namespace MTR\PostPackage\Http\Middleware;

use Closure;
class CapitalizeTitle {

    public function handle($request,Closure $next)
    {
        if ($request->has('title')) {
            $temp_arr = [];
            $arr = explode(" ",$request->title);
            foreach($arr as $value){
                $temp_arr[] = ucfirst($value);
            }
            $string = implode(" ",$temp_arr);
            $request->merge([
                'title' => $string
            ]);
        }
        return $next($request);
    }
}