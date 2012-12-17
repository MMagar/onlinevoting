<?php

function addErrorMessage($message) {
  global $errorMessages;
  if (!isset($errorMessages)) {
    $errorMessages = array();
  }
  array_push($errorMessages, str_replace('"', "'",$message));
}

function addSuccessMessage($message) {
  global $successMessages;
  if (!isset($successMessages)) {
    $successMessages = array();
  }
  array_push($successMessages, str_replace('"', "'",$message));
}

function addInfoMessage($message) {
  global $infoMessages;
  if (!isset($infoMessages)) {
    $infoMessages = array();
  }
  array_push($infoMessages, str_replace('"', "'",$message));
}