<?php
/*---------------------------------------------------------------*/
/*
Vérifier si un utilisateur est en ligne ou non                                                                                       
*/
/*---------------------------------------------------------------*/

class icq {
  var $timeout = 0;
  var $error = 0;
  var $errorString = '';


        //vérifie le statu
  function checkStatus($icq = '') {
    $raw_headers = '';

    $icq = init::toInteger($icq);
    $host = 'status.icq.com';
    $path = '/online.gif?icq='.$icq;
    
    $fp = @fsockopen ($host, 80, $errno, $errstr, $this->timeout); 
    $this->errno = $errno;
    $this->errstr = $errstr;
    if (!$fp) {
      return false;
    } 
    else { 
      fputs ($fp,"GET ".$path." HTTP/1.1\r\n"); 
      fputs ($fp,"HOST: ".$host."\r\n"); 
      fputs ($fp,
"User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)\r\n"); 
      fputs ($fp,"Connection: close\r\n\r\n"); 

      while (!feof ($fp)) {
        $raw_headers .= fgets ($fp, 128);
      }
    }
    fclose ($fp);

    ereg("/0/(.*)Content-Length", $raw_headers, $keywords);
    $filename = basename ($keywords[1]);
    switch (trim($filename)) { 
      case 'online1.gif': 
        return 'online';    
        break; 
      case 'online0.gif': 
        return 'offline';
        break; 
      default: 
        return 'disable';
        break; 
    }
  }
  
  function getErrno() {
    return $this->error;
  }
  
  function getErrstr() {
    return $this->errorString;
  }

}
?>