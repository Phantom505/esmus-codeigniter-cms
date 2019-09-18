<?php  

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (!function_exists('Library')) {
    /**
     * @param string $library
     *
     * @return mixed
     */
    function Library($library = 'default', $params = NULL)
    {
        $MY_Library = new MY_Library();
        return $MY_Library->Library($library, $params);
    }
}

/* get success or error message */
if (!function_exists('getMessages')) {
    /**
     * @return string
     */
    function getMessages()
    {
        $str = '';
        $CI  =& get_instance();

        $globalMessages = (array)$CI->session->userdata('globalMessages');

        /*remove empty items*/
        $globalMessages = array_filter($globalMessages);

        if (count($globalMessages) > 0) {
            foreach ($globalMessages as $k => $v) {
                echo '<div class="alert alert-' . $k . '" role="alert"><a class="close" data-dismiss="alert">X</a>';

                foreach ((array)$v as $w) {
                    echo "$w\n";
                }

                echo '</div>';
            }
        }

        $CI->session->unset_userdata('globalMessages');

        return $str;
    }
}

/* set success or error message */
if (!function_exists('setMessages')) {
    /**
     * @param string $msg
     * @param string $type
     * @param bool   $is_multiple
     */
    function setMessages($msg = '', $type = 'error', $is_multiple = true)
    {
        $CI =& get_instance();

        $globalMessages = (array)$CI->session->userdata('globalMessages');

        foreach ((array)$msg as $v) {
            if ($is_multiple) {
                $globalMessages[$type][] = (string)$v;
            } else {
                $globalMessages[$type][0] = (string)$v;
            }
        }
        if (isset($globalMessages[0])) {
            unset($globalMessages[0]);
        }

        $CI->session->set_userdata('globalMessages', $globalMessages);
    }
}
/* for clean request input */
if (!function_exists('Input')) {
  function Input($txt) {
        $txt = preg_replace('!<script[^>]*>(.)*</script>!Uis', '', $txt);
        $txt = stripslashes($txt);
        $txt = trim($txt);
        $txt = htmlspecialchars($txt);
        $txt = preg_replace("~ +~", " ", $txt);
        $txt = preg_replace("/(\r\n){3,}/", "\r\n\r\n", $txt);
        $txt = str_replace("\'", "&#39;", $txt);
        $txt = str_replace('\\', "&#92;", $txt);
        $txt = str_replace("|", "I", $txt);
        $txt = str_replace("||", "I", $txt);
        $txt = str_replace("/\\\$/", "&#36;", $txt);
        return $txt;
    }
}

if (!function_exists('load_css')) {
	function load_css($filename) 
	{ 
    return '<link rel="stylesheet" href="'.$filename.'">';
  } 
}

if (!function_exists('load_js')) {
	function load_js($filename) 
	{ 
    return '<script src="'.$filename.'"></script>';
  } 
}

if (!function_exists('asset')) {
	function asset($filename, $time = false, $module = true) 
	{ 
	$CI  =& get_instance();
    if($module){
      $module = explode('/', uri_string())[1];
    }
    
    $array = explode('.', $filename);
    $extension = end($array);
    if($time){
      $filename = $filename . '?t=' . time();
    }
    if($module){
      $path = '/modules/' . $module . '/assets/'. $CI->config->item('default_theme') . '/'.$extension . '/';
    }else {
      $path = '/templates/'.$CI->config->item('default_theme').'/'. $extension . '/';
    }
    if($extension == 'css'){
      return load_css($path . $filename);
    }else if($extension == 'js'){
      return load_js($path . $filename);
    }
  } 
}

if (!function_exists('assets')) {
	function assets($files, $time = false, $module = true) 
	{ 
    $assets = '';
    foreach ($files as $key => $file) {
      $assets .= asset($file, $time, $module);
    }
    return $assets;
  } 
}

if(!function_exists('utfToAscii'))
{
  function utfToAscii($text)
  {
    $utf8 = [
  'ü', 'Ü', 'ö', 'Ö', 'ğ', 'Ğ', 'ı', 'I', 'ə', 'Ə', 'ç', 'Ç', 'ş', 'Ş', 'İ',' ','}','{',']','[','<','>','"','\'','/','\\','.',',','$','#','%','^','&','?','*','(',')','+','-','@','!',';',':','=',
  'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я','А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я'
    ];

    $ascii = [
      'u', 'U', 'o', 'O', 'g', 'G', 'i', 'I', 'a', 'A', 'c', 'C', 's', 'S', 'I','_','','','','','','','','','','','','','','','','','','','','','','','','','','','','',
	  'a','b','v','g','d','e','e','j','z','i','i','k','l','m','n','o','p','r','s','t','u','f','x','c','ch','sh','sch','','i','','e','yu','ya','A','B','V','G','D','E','E','J','Z','I','I','K','L','M','N','O','P','R','S','T','U','F','X','C','CH','SH','SCH','','I','','E','YU','YA'
    ];

    return str_replace($utf8, $ascii, $text);
  }
}
if (!function_exists('personInfo')) {
    /**
     * @return array
     */
    function personInfo($ses)
    {
        $CI  =& get_instance();
        $CI->load->model('users/users_model');
        $arr = $CI->users_model->personDataInfo($ses);
        return $arr;
    }

}

if (!function_exists('settingsInfo')) {
    /**
     * @return array
     */
    function settingsInfo($module,$lang = null)
    {
        $CI  =& get_instance();
        $CI->load->model('control/Settings_model');
		if($module=='contact')
		{
			$arr = $CI->Settings_model->contactInfo($module);
		}
		else
		{
			$arr = $CI->Settings_model->setInfo($module,$lang);
		}
        return $arr;
    }

}

if (!function_exists('cut_paragraph')) {
	function cut_paragraph($string,$your_desired_width){
	$string = substr($string, 0, $your_desired_width+1);

	if (strlen($string) > $your_desired_width)
	{
		$string = wordwrap($string, $your_desired_width);
		$i = strpos($string, "\n");
		if ($i) {
			$string = substr($string, 0, $i);
		}
	}
	return $string;
	}

}