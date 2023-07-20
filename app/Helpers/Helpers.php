<?php
/**
 * @param $date
 * @param $output
 *
 */
function customDate($date,$output){

    $str = strtotime($date);
    return date($output,$str);

}
