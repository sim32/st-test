<?php
namespace Models;

abstract class Base {

    public function find() {
        $table = explode('\\', get_called_class())[1];
        $query = "SELECT * FROM `" . $table . "`";

        $results = mysql_query($query);
        if(!$results || mysql_num_rows($results) == 0) return false;
        $returndValue = [];

        while($r = mysql_fetch_object($results)) {
            $returndValue[] = $r;
        }
        return $returndValue;
    }

    public function findWhere($where = '1 = 1') {
        $table = explode('\\', get_called_class())[1];
        $query = "SELECT * FROM `" . $table . "` WHERE " . $where ;
        $results = mysql_query($query);
        if(!$results || mysql_num_rows($results) == 0) return false;
        $returndValue = [];

        while($r = mysql_fetch_object($results)) {
            $returndValue[] = $r;
        }
        return $returndValue;

    }



}