<?php 
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\widgets\google\ColumnChart;
    use \koolreport\widgets\google\PieChart;
?>

<div class="report-content">
    <div class="text-center">
        <h1>Cars by Color</h1>
        <p class="lead">This report show cars by color</p>
    </div>

    <?php
    PieChart::create(array(
        "dataStore"=>$this->dataStore('cars_by_color'),  
        "columns"=>array(
            "color"=>array(
                "label"=>"Cor",
                "type"=>"string",
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
            "dataSource"=>$this->dataStore("cars_by_color"),
            "columns"=>[
                "color",
                "value"=>[
                    "style"=>function($row) {
                        switch($row["color"])
                        {
                            case "branco":
                                return "color: #aaa";
                            case "preto":
                                return "color: #000";
                            case "vermelho":
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
        "dataStore"=>$this->dataStore('cars_by_color'),
        "columns"=>array(
            "color"=>array(
                "label"=>"Cor",
                "type"=>"string",
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
