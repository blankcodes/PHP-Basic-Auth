<?php
  $api_key = '1a2b3c4d5e6f7';   
  $data_content = array();
  $api_base64_encode = base64_encode($api_key);

  $options = array( 
    'http' => array(
      'header'  => "Content-type: application/x-www-form-urlencoded\r\n".
          "Authorization: Basic ".$api_base64_encode,
        'method'  => 'POST', /* method */
        'content' => http_build_query($data_content),
    )   
  );  

  $context = stream_context_create($options);
  $contents = file_get_contents($api_url, false, $context);
  $api_data = json_decode($contents);

  return $api_data;
?>
