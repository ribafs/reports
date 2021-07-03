<?php 
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\widgets\google\ColumnChart;
    use \koolreport\widgets\google\PieChart;
?>

<div class="report-content">
    <div class="text-center">
        <h1>Cars by Date</h1>
        <p class="lead">This report show cars by date</p>
    </div>

    <?php
    PieChart::create(array(
        "dataStore"=>$this->dataStore('cars_by_date'),  
        "columns"=>array(
            "date"=>array(
                "label"=>"Mês",
                "type"=>"datetime",
                "format"=>"Y-n",
                "displayFormat"=>"F, Y",
            ),
            "value"=>array(
                "label"=>"Valor",
                "type"=>"number",
                "prefix"=>"$",
            )
        ),
        "width"=>"100%",
    ));
    ?>

    <?php
        ColumnChart::create([
            "dataSource"=>$this->dataStore("cars_by_date"),
            "columns"=>[
                "date",
                "value"=>[
                    "style"=>function($row) {
                        switch($row["date"])
                        {
                            case "2020-05":
                                return "color: #00F";
                            case "2020-06":
                                return "color: #0F0";
                            case "2020-07":
                                return "color: #F00";
                        }
                    }
                ]
            ],
            "width"=>"100%",
        ]);
    ?>

    <?php
    Table::create(array(
        "dataStore"=>$this->dataStore('cars_by_date'),
        "columns"=>array(
            "date" => array(
                "label"=>"Mês",
                "type"=>"datetime",
                "format"=>"Y-n",
                "displayFormat"=>"F, Y",
            ),
            "value"=>array(
                "label"=>"Valor",
                "type"=>"number",
                "prefix"=>"$",
            )
        ),
        "cssClass"=>array(
            "table"=>"table table-hover table-bordered"
        )
    ));
    ?>
</div>

<br>
<hr>
<h3>Cars by color</h3>
<p>Aqui descreva o relatório</p>
