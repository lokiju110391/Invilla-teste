<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shiporder extends Model
{
    use HasFactory;

    public static function verifyStructure($array_structure){


        if (array_key_exists("shiporder",$array_structure)) {
            foreach ($array_structure['shiporder'] as $data) {
                $status_data = Shiporder::verifyData($data);
                if (!$status_data) {
                    return $status_data;
                }
            }
            return true;
        } else {
            return false;
        }
        
    }    

    public static function verifyData($array_data){

        if (!array_key_exists("orderid",$array_data)) {
            return false;
        }

        if (!array_key_exists("orderperson",$array_data)) {
            return false;
        }

        if (!array_key_exists("shipto",$array_data)) {
            return false;
        } else {
            if (!array_key_exists("name",$array_data['shipto'])) {
                return false;
            }
            if (!array_key_exists("address",$array_data['shipto'])) {
                return false;
            }
            if (!array_key_exists("city",$array_data['shipto'])) {
                return false;
            }
            if (!array_key_exists("country",$array_data['shipto'])) {
                return false;
            }
        }

        if (!array_key_exists("items",$array_data)) {
            return false;
        } else {
            if (!array_key_exists("item",$array_data['items'])) {
                return false;
            } 
        }

        return true;

    }    

}
