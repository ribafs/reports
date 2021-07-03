<?php
require_once dirname(__FILE__)."/../autoload.php";

use \koolreport\KoolReport;
use \koolreport\processes\Filter;
use \koolreport\processes\TimeBucket;
use \koolreport\processes\Group;
use \koolreport\processes\Limit;

class CarsByDate extends KoolReport
{
    function settings()
    {
        // Configuração do banco
        return array(
            "dataSources"=>array(
                "cars_date"=>array(
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
        // Configuração do relatório. Campos: date/mês - horizontal, value - vertical
        $this->src('cars_date')
        ->query("SELECT date,value FROM colors")
        ->pipe(new TimeBucket(array(
            "date"=>"month"
        )))
        ->pipe(new Group(array(
            "by"=>"date",
            "sum"=>"value"
        )))
        ->pipe($this->dataStore('cars_by_date'));
    } 
}
