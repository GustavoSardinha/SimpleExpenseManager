<?php
      $url = (isset($_GET['url'])) ? $_GET['url']:'erro';
      $url = array_filter(explode('/',$url));
  
      $file = $url[0].'.php';
      if(is_file('views/home/' . $file)){
          include 'views/home/' . $file;
     }else{
          include 'views/erro/404.php';
      }   
    
?>