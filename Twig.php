<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

define('TWIG_LIB',__DIR__.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'twig'.DIRECTORY_SEPARATOR);

require_once TWIG_LIB.'Autoloader.php';

class Twig
{
	/**
	 * @var CI_Controller
	 */
	private $CI;

	/**
	 * @var Twig_Environment
	 */
	public $environment;

	function __construct()
	{
		$this->CI = & get_instance();
		$this->init();
	}

	protected function init()
	{
		Twig_Autoloader::register();
		$twigconfig = $this->getConfig();

		$_apppath = FCPATH.APPPATH;

		$loader = new Twig_Loader_Filesystem($_apppath.$twigconfig['twig_template_path']);
		$this->environment = new Twig_Environment($loader,array(
													'debug'=>$twigconfig['twig_debug'],
													'cache'=> ($twigconfig['twig_cache_path'] === FALSE ? false: $_apppath . $twigconfig['twig_cache_path']),
													'auto_reload'=>$twigconfig['twig_auto_reload'],
													'strict_variables'=>$twigconfig['twig_strict_variables'],
													'autoescape'=>$twigconfig['twig_autoescape'],
													'optimizations'=>$twigconfig['twig_optimizations'],
													'charset'=>$twigconfig['twig_charset']));
	}

	/**
	 * Return twig configuration from "APPPATH/config/config.php".
	 * @return mixed
	 */
	protected function getConfig()
	{
		$twigconfig=array(
							'twig_debug'=>false, 
							'twig_charset'=>'utf-8',
							'twig_auto_reload'=>true,
							'twig_strict_variables'=>true,
							'twig_autoescape'=>true,
							'twig_optimizations'=>-1,
							'twig_template_path'=>'views',
							'twig_cache_path'=>'cache');

		$ci_config = $this->CI->config->config;

		$keys = array_keys($twigconfig);

		foreach($keys as $k)
		{
			if(is_string($k))
			{
				if(isset($ci_config[$k]))
				{
					$twigconfig[$k]=$ci_config[$k];
				}
			}
		}

		return $twigconfig;
	}

}