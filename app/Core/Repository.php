<?php
/**
 * Created by PhpStorm.
 * User: Percy
 * Date: 30/09/2018
 * Time: 04:34 PM
 */
namespace App\Core;

class Repository
{
    public function getData($asc=false){
        $path = public_path('json/employees.json');
        $file = file_get_contents($path);
        return json_decode($file, $asc);
    }
}