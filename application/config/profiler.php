<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Profiler Sections
| -------------------------------------------------------------------------
| This file lets you determine whether or not various sections of Profiler
| data are displayed when the Profiler is enabled.
| Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/profiling.html
|
*/

$config['benchmarks']          = TRUE;
$config['get']         = TRUE;
$config['memory_usage']         = TRUE;
$config['post']         = TRUE;
$config['uri_string']         = FALSE;
$config['controller_info']         = TRUE;
$config['queries']         = TRUE;
$config['query_toggle_count']         = FALSE;
$config['http_headers']         = TRUE; #The HTTP headers for the current request	
$config['config']         = TRUE; #CodeIgniter Config variables



/* End of file profiler.php */
/* Location: ./application/config/profiler.php */
