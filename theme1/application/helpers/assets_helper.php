<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function other_resource_url($resource_name, $module_name = NULL, $resource_type = NULL)
{
	$oBject =& get_instance();
	$base_url = $oBject->config->item('base_url');

	$resource_location = $base_url.'assets/';

	if(!empty($module_name)) {
		
    $resource_location .= 'modules/'.$module_name.'/';
	
  }

	$resource_location .= $resource_name;

	return $resource_location;

}

function _parse_resource_html($attributes = NULL)
{

	if(is_array($attributes)) {
		$attribute_str = '';

		foreach($attributes as $key => $value) {
			$attribute_str .= ' '.$key.'="'.$value.'"';
		}

		return $attribute_str;
	}

	return '';
}

// Resource css location
function css_resource_url($resource_name, $module_name = NULL)
{
	return other_resource_url($resource_name, $module_name, '');
}

function css_res($resource_name, $module_name = NULL, $attributes = array())
{
	$attribute_str = _parse_resource_html($attributes);

	return '<link href="'.css_resource_url($resource_name, $module_name).'" rel="stylesheet" type="text/css"'.$attribute_str.' />';
}

// Resource images location
function image_resource_url($resource_name, $module_name = NULL)
{
	return other_resource_url($resource_name, $module_name, '');
}

function img_res($resource_name, $module_name = '', $attributes = array())
{
	$attribute_str = _parse_resource_html($attributes);
	return '<img src="'.image_resource_url($resource_name, $module_name).'"'.$attribute_str.' />';
}

function img_url($resource_name, $module_name = '', $attributes = array())
{
	return image_resource_url($resource_name, $module_name);
}

// Resource javaScript location
function js_resource_url($resource_name, $module_name = NULL, $user = NULL)
{
	if($user == NULL) {
		return other_resource_url($resource_name, $module_name, '');
	} else {
		return other_resource_url($resource_name, $module_name, $user);
  }
}

function js_res($resource_name, $module_name = NULL, $user = NULL)
{
	if($user == NULL) {
		return '<script type="text/javascript" src="'.js_resource_url($resource_name, $module_name).'"></script>';
	} else {
		return '<script type="text/javascript" src="'.js_resource_url($resource_name, $module_name, $user).'"></script>';
  }
}

?>