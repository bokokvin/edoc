<?php if ( ! defined('BASEPATH')) exit('No direct script access
allowed');
	if ( ! function_exists('images_answer_url'))
	{
		function images_answer_url($nom)
		{
			return base_url() . 'uploads/images_answer/' . $nom;
		}
	}
	
	if ( ! function_exists('images_defis_url'))
	{
		function images_defis_url($nom)
		{
			return base_url() . 'uploads/images_defis/' . $nom;
		}
	}
	
	if ( ! function_exists('videos_answer_url'))
	{
		function videos_answer_url($nom)
		{
			return base_url() . 'uploads/videos_answer/' . $nom;
		}
	}
	
	if ( ! function_exists('videos_defis_url'))
	{
		function videos_defis_url($nom)
		{
			return base_url() . 'uploads/videos_defis/' . $nom;
		}
	}