<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Smarty Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Smarty
 * @author		Kepler Gelotte
 * @link		http://www.coolphptools.com/codeigniter-smarty
 */
require_once( APPPATH.'third_party/Smarty/Smarty.class.php' );

class SmartyEngine extends Smarty {

	function __construct()
	{
		parent::__construct();

		$this->compile_dir = APPPATH . "cache/templates";
		$this->template_dir = APPPATH;
		$this->assign( 'APPPATH', APPPATH );
		$this->assign( 'BASEPATH', BASEPATH );

        $CI = &get_instance();
        // Should let us access Codeigniter stuff in views
        // This means we can go for example {$this->session->userdata('item')}
        // just like we normally would in standard CI views
        $this->assign("this", $CI);

        // This will fix various issues like filemtime errors that some people experience
        // The cause of this is most likely setting the error_reporting value above
        // This is a static function in the main Smarty class
        Smarty::muteExpectedErrors();

		log_message('debug', "Smarty Class Initialized");
	}


	/**
	 *  Parse a template using the Smarty engine
	 *
	 * This is a convenience method that combines assign() and
	 * display() into one step.
	 *
	 * Values to assign are passed in an associative array of
	 * name => value pairs.
	 *
	 * If the output is to be returned as a string to the caller
	 * instead of being output, pass true as the third parameter.
	 *
	 * @access	public
	 * @param	string
	 * @param	array
	 * @param	bool
	 * @return	string
	 */
	public function view($template, $data = array(), $return = FALSE)
	{
		try
		{
			if($data == ''){ $data = array(); }

			foreach($data as $key => $val)
			{
				$this->assign($key, $val);
			}

			if($return == FALSE)
			{
				$CI = &get_instance();
				if(method_exists($CI->output, 'set_output'))
				{
					$CI->output->set_output( $this->fetch($template) );
				}
				else
				{
					$CI->output->final_output = $this->fetch($template);
				}
				return;
			}
			else
			{
				return $this->fetch($template);
			}
		}
		catch(SmartyException $e)
		{
			return "<span style='color:red;'><div style='font-size:16px;color:black;font-weight:bold;text-align:center;'>An error has occured while trying to load the requested view.</div><br /><br /><b>Template path:</b> ".$template."<br /><br /><b>Error:</b> ".nl2br(preg_replace("/Stack trace\:/", "<br /><b>Stack trace:</b>", $e))."</span>";
		}
	}
}
// END Smarty Class
