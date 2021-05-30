<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ProcessController extends Controller
{
    
    public function save_file(Request $request) {
        
        $data = $request->all();

        if (!(array_key_exists("people_file_to_process",$data) || array_key_exists("shiporders_file_to_process",$data))) {
            
            echo "erro sem um dos aquivos";

        } else {
            
            $file                   = $data['people_file_to_process'];
            $name                   = uniqid(date('HisYmd'));          
            $extension              = $file->extension(); 
            $nameFile               =  "{$name}.{$extension}";
            $upload                 = $file->storeAs('public', $nameFile);
            $people_file_to_process = "../storage/app/public/".$nameFile;

            $file                       = $data['shiporders_file_to_process'];
            $name                       = uniqid(date('HisYmd'));          
            $extension                  = $file->extension(); 
            $nameFile                   =  "{$name}.{$extension}";
            $upload                     = $file->storeAs('public', $nameFile);
            $shiporders_file_to_process = "../storage/app/public/".$nameFile;

            libxml_use_internal_errors(true);

            // Verify Files extructure
            try {

                $xml_file = file_get_contents(public_path($people_file_to_process));
                $xml_object = simplexml_load_string($xml_file);

                if ($xml_object) {
                    
                    $json                         = json_encode($xml_object);
                    $people_file_to_process_array = json_decode($json, true); 

                } else {
                    echo "Failed loading XML 1";
                    exit();
                }                

            } catch (Exception $e) {
                echo 'Failed loading File 1';
                exit();
            }

            try {

                $xml_file = file_get_contents(public_path($shiporders_file_to_process));
                $xml_object = simplexml_load_string($xml_file);
                
                if ($xml_object) {
                    
                    $json                         = json_encode($xml_object);
                    $shiporders_file_to_process_array = json_decode($json, true); 

                } else {
                    echo "Failed loading XML 2";
                    exit();
                }                

            } catch (Exception $e) {
                echo 'Failed loading File 2';
                exit();
            }


        }

        //$status_person     = \App\Models\People::verifyStructure($people_file_to_process_array);
        //$status_shiporders = \App\Models\Shiporder::verifyStructure($shiporders_file_to_process_array);

        // People
        foreach ($people_file_to_process_array as $persons) {
            
            if (array_key_exists("personid",$persons)) {
                    
                $personid   = $persons['personid'];
                $personname = $persons['personname'];
                $phones     = $person['phones'];

                // save 
                $new_person             = new \App\Models\People();
                $new_person->personid   = $personid;
                $new_person->personname = $personname;
                $new_person->save();

                if (is_array($phones['phone'])) {

                    foreach ($phones['phone'] as $phone) {
                        $new_phone = new \App\Models\People_Phone();
                        $new_phone->id_people = $new_person->id;
                        $new_phone->phone = $phone;
                        $new_phone->save();
                    }

                } else {

                    $phone = $phones['phone'];
                    $new_phone = new \App\Models\People_Phone();
                    $new_phone->id_people = $new_person->id;
                    $new_phone->phone = $phone;
                    $new_phone->save();

                }

            } else {

                foreach ($persons as $person) {

                    $personid   = $person['personid'];
                    $personname = $person['personname'];
                    $phones = $person['phones'];

                    // save
                    $new_person             = new \App\Models\People();
                    $new_person->personid   = $personid;
                    $new_person->personname = $personname;
                    $new_person->save();                    

                    if (is_array($phones['phone'])) {

                        foreach ($phones['phone'] as $phone) {
                            $new_phone = new \App\Models\People_Phone();
                            $new_phone->id_people = $new_person->id;
                            $new_phone->phone = $phone;
                            $new_phone->save();
                        }

                    } else {

                        $phone = $phones['phone'];
                        $new_phone = new \App\Models\People_Phone();
                        $new_phone->id_people = $new_person->id;
                        $new_phone->phone = $phone;
                        $new_phone->save();

                    }

                }

            }

        }
        

        foreach ($shiporders_file_to_process_array as $shiporders) {

            if (array_key_exists("orderid",$shiporders)) {

                $orderid        = $shiporders['orderid'];
                $orderperson    = $shiporders['orderperson'];
                $shipto         = $shiporders['shipto'];
                $items          = $shiporders['items'];

                $shipto_name    = $shipto['name'];
                $shipto_address = $shipto['address'];
                $shipto_city    = $shipto['city'];
                $shipto_country = $shipto['country'];

                $new_shiporder                 = new \App\Models\Shiporder();
                $new_shiporder->orderid        = $orderid;
                $new_shiporder->orderperson    = $orderperson;
                $new_shiporder->shipto_name    = $shipto_name;
                $new_shiporder->shipto_address = $shipto_address;
                $new_shiporder->shipto_city    = $shipto_city;
                $new_shiporder->shipto_country = $shipto_country;
                $new_shiporder->save();

                if (array_key_exists("title",$items['item'])) {

                    $title    = $items['item']['title'];
                    $note     = $items['item']['note'];
                    $quantity = $items['item']['quantity'];
                    $price    = $items['item']['price'];
                    
                    $new_shiporder_itens = new \App\Models\Shiporder_Items();
                    $new_shiporder_itens->id_shiporder = $new_shiporder->id;
                    $new_shiporder_itens->title        = $title;
                    $new_shiporder_itens->note         = $note;
                    $new_shiporder_itens->quantity     = $quantity;
                    $new_shiporder_itens->price        = $price;
                    $new_shiporder_itens->save();


                } else {

                    foreach ($items['item'] as $item) {

                        $title    = $item['title'];
                        $note     = $item['note'];
                        $quantity = $item['quantity'];
                        $price    = $item['price'];

                        $new_shiporder_itens = new \App\Models\Shiporder_Items();
                        $new_shiporder_itens->id_shiporder = $new_shiporder->id;
                        $new_shiporder_itens->title        = $title;
                        $new_shiporder_itens->note         = $note;
                        $new_shiporder_itens->quantity     = $quantity;
                        $new_shiporder_itens->price        = $price;
                        $new_shiporder_itens->save();

                    }


                }

            } else {

                foreach ($shiporders as $shiporder) {

                    $orderid        = $shiporder['orderid'];
                    $orderperson    = $shiporder['orderperson'];
                    $shipto         = $shiporder['shipto'];
                    $items          = $shiporder['items'];

                    $shipto_name    = $shipto['name'];
                    $shipto_address = $shipto['address'];
                    $shipto_city    = $shipto['city'];
                    $shipto_country = $shipto['country'];

                    $new_shiporder                 = new \App\Models\Shiporder();
                    $new_shiporder->orderid        = $orderid;
                    $new_shiporder->orderperson    = $orderperson;
                    $new_shiporder->shipto_name    = $shipto_name;
                    $new_shiporder->shipto_address = $shipto_address;
                    $new_shiporder->shipto_city    = $shipto_city;
                    $new_shiporder->shipto_country = $shipto_country;
                    $new_shiporder->save();

                    if (array_key_exists("title",$items['item'])) {

                        $title    = $items['item']['title'];
                        $note     = $items['item']['note'];
                        $quantity = $items['item']['quantity'];
                        $price    = $items['item']['price'];

                        $new_shiporder_itens = new \App\Models\Shiporder_Items();
                        $new_shiporder_itens->id_shiporder = $new_shiporder->id;
                        $new_shiporder_itens->title        = $title;
                        $new_shiporder_itens->note         = $note;
                        $new_shiporder_itens->quantity     = $quantity;
                        $new_shiporder_itens->price        = $price;
                        $new_shiporder_itens->save();


                    } else {

                        foreach ($items['item'] as $item) {

                            $title    = $item['title'];
                            $note     = $item['note'];
                            $quantity = $item['quantity'];
                            $price    = $item['price'];

                            $new_shiporder_itens = new \App\Models\Shiporder_Items();
                            $new_shiporder_itens->id_shiporder = $new_shiporder->id;
                            $new_shiporder_itens->title        = $title;
                            $new_shiporder_itens->note         = $note;
                            $new_shiporder_itens->quantity     = $quantity;
                            $new_shiporder_itens->price        = $price;
                            $new_shiporder_itens->save();

                        }


                    }

                }

            }

        }

        // View ? 

    }


}
