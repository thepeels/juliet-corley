<?php
 
class DetailSeeder
  extends DatabaseSeeder
{
  public function run()
  {
    $details = [
      [
        "id" 			=> "1",
        "user_id" 		=> "1",
        "alias" 		=> "me, myself, I",
        "author_name"   => "John Corley BSc.",
        "note"			=> "This is a note to myself",
        "address"		=> "The Peels, Harbottle",
        "postcode"		=> "NE65 7DL"
      ],
      [
        "id" 			=> "2",
        "user_id" 		=> "2",
        "alias" 		=> "not me, myself, nor I",
        "author_name"   => "Juliet Corley BSc.",
        "note"			=> "",
        "address"		=> "Australia",
        "postcode"		=> "NE65 7DL"
      ],
      [
        "id" 			=> "3",
        "user_id" 		=> "3",
        "alias" 		=> "me, myself, I",
        
      ],
      [
        "id" 			=> "4",
        "user_id" 		=> "4",
        "alias" 		=> "other person",
        
      ]
    ];
  
    foreach ($details as $detail) {
      Detail::create($detail);
    }
  }
}