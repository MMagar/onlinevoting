<?php
if (isset($errorMessages)) {
  echo '<script type="text/javascript">';
  foreach ($errorMessages as $message) {
    echo 'messageError("' . $message . '");';
  }
  echo '</script>';
}
if (isset($successMessages)) {
  echo '<script type="text/javascript">';
  foreach ($successMessages as $message) {
    echo 'messageSuccess("' . $message . '");';
  }
  echo '</script>';
}
if (isset($infoMessages)) {
  echo '<script type="text/javascript">';
  foreach ($infoMessages as $message) {
    echo 'messageInfo("' . $message . '");';
  }
  echo '</script>';
}
?>