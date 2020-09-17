<?php  

if (!defined('BASEPATH')) exit('No direct script access allowed');

	/**
	 * 
	 * @param type $original_file_name
	 * @param type $original_extension
	 * @return type
	 */
	function file_name($original_file_name, $original_extension) {
		$tempName = preg_replace('/[^a-z0-9-.]/i', '', $original_file_name);
	    return sprintf("%s-%s.%s", str_replace([" ", "."], ["_", ""], strtoupper($tempName)), time(), $original_extension);
	}

	/**
	 * 
	 * @param type $size
	 * @param type $conversion
	 * @return type
	 */
	function get_file_size($size, $conversion) {
	    if ($conversion == 'KB') {
	        return sprintf("%s KB", number_format(($size / 1024), 2));
	    }
	    return (string) $size;
	}

	/**
	 * @param type $request
	 * @param type $file_key_name
	 * @param type $folder
	 * @return type
	 */
	function ___fileUpload($request, $file_key_name = 'file', $folder = 'uploads/',$name=NULL) {

	    $file = $request[$file_key_name];
	    $returnArr = array();
	    $returnArr['file'] = "";

	    if (!empty($file['name'])) {
	        $file_size = get_file_size($file['size'], 'KB');
	        $extensionArr = explode('.', $file['name']);
	        $extension = end($extensionArr);
	        
	        $file_name = $name ? $name : file_name($file['name'], $extension);
	        //echo $file['tmp_name'];die;
	        $target = sprintf('%s%s',$folder,$file_name);

	        $result = move_uploaded_file($file['tmp_name'], $target);
	        $errorCode = $file['error'];

	        $returnArr = [
	        	'file_name' => $file_name,
	            'file' => $target,
	            'size' => $file_size,
	            'extension' => $extension,
	            'errors' => (!empty($errorCode) || $errorCode != "0") ? _codeToMessage($errorCode) : ''
	        ];
	    }
	    return $returnArr;
	}

	/**
	 * @param type $request
	 * @param type $file_key_name
	 * @param type $folder
	 * @return type
	 */
	function multUpload($request, $file_key_name = 'file', $folder = 'uploads/',$name=NULL,$key='') {
		
	    $file = $request;
	    $returnArr = array();
	    $returnArr['file'] = "";

	    if (!empty($file['name'][$key])) {
	        $file_size = get_file_size($file['size'][$key], 'KB');
	        $extensionArr = explode('.', $file['name'][$key]);

	        $extension = end($extensionArr);
	         
	        $imgFile = microtime().'.'.$extension;
	
	        $file_name = $name ? $name : file_name($file['name'][$key], $extension);
	        //echo $file['tmp_name'];die;
	        $target = sprintf('%s%s',$folder,$imgFile);
	        $result = move_uploaded_file($file['tmp_name'][$key], $target);
	        $errorCode = $file['error'][$key];

	        $returnArr = [
	        	'file_name' => $imgFile,
	            'file' => $target,
	            'size' => $file_size,
	            'extension' => $extension,
	            'errors' => (!empty($errorCode) || $errorCode != "0") ? _codeToMessage($errorCode) : ''
	        ];
	    }
	    return $returnArr;
	}

	/**
	 * @param type $request
	 * @param type $file_key_name
	 * @param type $folder
	 * @return type
	 */


	/**
	 * @param type $code
	 * @return string
	 */
	function _codeToMessage($code = NULL) {
		$CI =& get_instance();
	    $errors = array(
	        UPLOAD_ERR_INI_SIZE => $CI->lang->line('UPLOAD_ERR_INI_SIZE_LABEL'),
	        UPLOAD_ERR_FORM_SIZE => $CI->lang->line('UPLOAD_ERR_FORM_SIZE_LABEL'),
	        UPLOAD_ERR_PARTIAL => $CI->lang->line('UPLOAD_ERR_PARTIAL_LABEL'),
	        UPLOAD_ERR_NO_FILE => $CI->lang->line('UPLOAD_ERR_NO_FILE_LABEL'),
	        UPLOAD_ERR_NO_TMP_DIR => $CI->lang->line('UPLOAD_ERR_NO_TMP_DIR_LABEL'),
	        UPLOAD_ERR_CANT_WRITE => $CI->lang->line('UPLOAD_ERR_CANT_WRITE_LABEL'),
	        UPLOAD_ERR_EXTENSION => $CI->lang->line('UPLOAD_ERR_EXTENSION_LABEL')
	    );

	    if (array_key_exists($code, $errors)) {
	        return $errors[$code];
	    }
	    return $CI->lang->line('UNKNOWN_UPLOAD_LABEL');
	}
?>