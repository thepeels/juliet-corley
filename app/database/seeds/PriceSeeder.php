<?php
 
class PriceSeeder
  extends DatabaseSeeder
{
  public function run()
  {
    $prices = [
      [
        "name" => "icons",
        "first_price" => 1800,
        "second_price" => 1500,
        "third_price" => 500,
        "fourth_price" => 200,
        "special_price" => 2500,
      ]
    ];
  
    foreach ($prices as $price) {
      Price::create($price);
    }
  }
}