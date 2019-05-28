<?php

namespace App\Implementation;

class Tools {


    /**
     * Se eliminan todos los objetos que de arr1 que coincidan con los de arr2.
     * @author Jesus Moris
     */
    public static function limpiarLista($arr1, $arr2){
        $arr3 = [];
        foreach($arr1 as $item){
            foreach($arr2 as $it){
                if($item->id == $it->id){
                    $arr3[] = $it;
                    break;
                }
            }
        }
        return $arr3;
    }
}