<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    public static function verifyStructure($array_structure){

        if (array_key_exists("personid",$array_structure["person"])) {
            return People::verifyData($array_structure["person"]);
        } else {
            foreach ($array_structure['person'] as $data) {
                $status_data = People::verifyData($data);
                if (!$status_data) {
                    return $status_data;
                }
            }
            return true;
        }
    
        return false;

    }    

    public static function verifyData($array_data){
       
        if (!array_key_exists("personid",$array_data)) {
            return false;
        }

        if (!array_key_exists("personname",$array_data)) {
            return false;
        }

        if (!array_key_exists("phones",$array_data)) {
            return false;
        } else {
            if (!array_key_exists("phone",$array_data['phones'])) {
                return false;
            }
        }

        return true;

    }    

}
