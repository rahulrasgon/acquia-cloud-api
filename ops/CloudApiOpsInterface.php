<?php

interface CloudApiOpsInterface {

  /**
   * @param array $options Additional info to pass in to Cloud
   * @param bool $print_output Whether to print or return the output
   * @return mixed
   */
  public function sendRequest($options = [], $print_output = TRUE);
}
