<?php header('Access-Control-Allow-Origin: *'); ?>
      <?php 
        $current_dir = "$DOCUMENT_ROOT"."Quotes/";    //Put in second part, the directory - without a leading slash but with a trailing slash! 
        $dir = opendir($current_dir);        // Open the directory
        $json = '{"pictures":[';

        while ($file = readdir($dir))            // while loop 
          { 
          $parts = explode(".", $file);                    // pull apart the name and dissect by period 
          if (is_array($parts) && count($parts) > 1) {    // does the dissected array have more than one part 
              $extension = end($parts);        // set to we can see last file extension 
              if ($extension == "jpg" OR $extension == "JPG")    // is extension jpg or JPG ? 
                $json = $json.'{"url":"http://www.labtpe.com/Quotes/'.urlencode($file).'"},';
            } 
          } 

          $json = $json.'{"url":null}]}';

        closedir($dir);        // Close the directory after we are done 
        echo $json;
      ?>