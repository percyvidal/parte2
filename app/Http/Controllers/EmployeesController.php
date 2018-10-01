<?php

namespace App\Http\Controllers;

use App\Core\Repository;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    //
    protected $repository;


    public function __construct()
    {
        $this->repository = new Repository();
    }


    public function index(Request $request){

        $jsonArray = $this->repository->getData();
        $array_result =[];

        if($request->has('email')){

            foreach ($jsonArray as $row){

                $input = strtolower($request->email);
                $result = preg_match ("/^{$input}/", $row->email);

                if($result){
                    array_push($array_result, $row);
                }
            }

            $jsonArray = $array_result;
        }
        return view('employees.index', compact('jsonArray'));
    }


    public function detail($id)
    {
        $jsonArray = $this->repository->getData();
        $obj = null;
        foreach ($jsonArray as $row){

            if($row->id == $id){
                $obj = $row;
                break;
            }
        }

        return view('employees.detail', compact('obj'));
    }

    public function webService(Request $request)
    {
        $jsonArray = $this->repository->getData(true);

        $filter = [];
        foreach ($jsonArray as $row){

            $salary = floatval(str_replace('$', '', str_replace(',', '', $row['salary'])));

            if($request->min <= $salary && $request->max >= $salary){
                array_push($filter, $row);
            }
        }

        $xml = new \SimpleXMLElement("<?xml version=\"1.0\"?><employees></employees>");

        $this->arrayToXml($filter,$xml);
        header("Content-type: text/xml");
        return $xml->asXML();
    }

    private function arrayToXml($array, &$xml_user_info) {
        foreach($array as $key => $value) {
            if(is_array($value)) {
                if(!is_numeric($key)){
                    $subnode = $xml_user_info->addChild("$key");
                    $this->arrayToXml($value, $subnode);
                }else{
                    $subnode = $xml_user_info->addChild("i$key");
                    $this->arrayToXml($value, $subnode);
                }
            }else {
                $xml_user_info->addChild("$key",htmlspecialchars("$value"));
            }
        }
    }


}
