<?php

if(! function_exists('create')){
    function create($model, $data = [], $count = null)
    {
        return factory($model, $count)->create($data);
    }
}


if(! function_exists('make')){
    function make($model, $data = [], $count = null)
    {
        return factory($model, $count)->make($data);
    }
}
