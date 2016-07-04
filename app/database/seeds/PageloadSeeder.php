<?php
 
class PageloadSeeder
  extends DatabaseSeeder
{
  public function run()
  {
    $pageloads = [
      [
        "pdf" => 1
      ],
      [
        "free_icon" => 1
      ],
      [
        "preview"=>1
      ]
    ];
  
    foreach ($pageloads as $pageload) {
      Pageload::create($pageload);
    }
  }
}