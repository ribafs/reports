<?php
require_once dirname(__FILE__)."/../../../vendor/autoload.php";

use \koolreport\KoolReport;
use \koolreport\processes\Filter;
use \koolreport\processes\Group;
use \koolreport\processes\Limit;
use \koolreport\processes\Custom;

class CarsByColor extends KoolReport
{
    function settings()
    {
        // Configuração do banco
        return array(
            "dataSources"=>array(
                "cars_color"=>array(
                    "connectionString"=>"mysql:host=localhost;dbname=cars",
                    "username"=>"root",
                    "password"=>"",
                    "charset"=>"utf8"
                ),
            )
        ); 
    }

    protected function setup()
    {
        // Configuração do relatório. Campos: color - horizontal, value - vertical
        $this->src('cars_color')
        ->query("SELECT color,value FROM colors")
        ->pipe(new Custom(function($row){
            $row["color"] = strtolower($row["color"]);
            return $row;
        }))
        ->pipe(new Group(array(
            "by"=>"color",
            "sum"=>"value"
        )))
        ->pipe($this->dataStore('cars_by_color'));
    } 
}
