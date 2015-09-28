UPDATE `fish`


`large_image_id`=`large_image_id` - 10,
`large_image_flipped_id`=`large_image_flipped_id` - 10,
`small_image_id`=`small_image_id` - 10,
`small_image_flipped_id`=`small_image_flipped_id` - 10,
`silhouette_image_id`=`silhouette_image_id` - 10,
`outline_image_id`=`outline_image_id` - 10,
`image_thumb_id`=`image_thumb_id` - 10,
`image_thumb_flipped_id`=`image_thumb_flipped_id` - 10,
`silhouette_thumb_id`=`silhouette_thumb_id` - 10,
`outline_thumb_id`=`outline_thumb_id` - 10,
`large_image_watermarked_id`=`large_image_watermarked_id` - 10
WHERE 1

regex 
find					=> 		replace
[\=][`]([A-Z_A-Z]*)[`]	=> 		\= $1.jpg