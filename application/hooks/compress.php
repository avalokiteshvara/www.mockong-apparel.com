<?php defined('BASEPATH') OR exit('No direct script access allowed');

// To disable UhOh! simply change IN_PRODUCTION to TRUE.
if ( ! defined('IN_PRODUCTION')){

	define('IN_PRODUCTION', FALSE);
	
}


function compress()
{
	// If we are in production, then lets dump out now.
	if (IN_PRODUCTION)
	{
		return;
	}
	
    $CI =& get_instance();
    $buffer = $CI->output->get_output();

    $inline_scripts=array();
    if (preg_match_all('|([removed]]*?&gt;.*?<\/script>)|is', $buffer, $pock))
    {
        foreach ($pock[1] as $key=>$content)
        {
            $inline_scripts['INLINE_SCRIPT_'.$key]=$content;
        }
        $buffer=str_replace(array_values($inline_scripts), array_keys($inline_scripts), $buffer);
    }

    $search = array(
        '/\>[^\S ]+/s',
        '/[^\S ]+\</s',
        '/(\s)+/s',
    );
    
    $replace = array(
        '>',
        '<',
        '\\1',
    );

    $buffer = preg_replace($search, $replace, $buffer);

    if (count($inline_scripts)>0)
    {
        $buffer=str_replace(array_keys($inline_scripts), array_values($inline_scripts), $buffer);
    }

    $CI->output->set_output($buffer);
    $CI->output->_display();
}
