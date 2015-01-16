<?php
class Manufacturer extends DataMapper{
    var $table = "manufacturers";
    var $has_many= array("product");

    function __construct($id=null){
        parent::__construct($id);
    }
}
?>