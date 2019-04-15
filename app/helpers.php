<?php

function flash($title = null, $message = null)
{
    $flash = app('App\Http\Flash');
  if(func_num_args() == 0)
  {
    return $flash;
  }
  return $flash->info($title,$message);
}

/**
 * Gets string from string between start string and end string
 * @param  [string] $content  ---Container string
 * @param  [string] $start   
 * @param  [string] $end     
 * @return [string]          
 */
function getStringBetween($content, $start, $end){
	$result = explode($start, $content);
	if(isset($result[1])){
		$result = explode($end, $result[1]);
		return $result[0];
	}
	return '';
}