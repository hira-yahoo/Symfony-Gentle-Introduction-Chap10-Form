<?php

class Utility {
  public static function log($message) {
    $fileName = "app.log";
    file_put_contents(
    sfConfig::get('sf_log_dir')."/".$fileName,
    date("Y/m/d H:i:s")." : $message\n",
    FILE_APPEND);
  }
}
?>
