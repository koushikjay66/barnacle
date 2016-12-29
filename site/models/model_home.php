 <?php 
if (!defined('LANDING_PAGE')) exit('No direct script access allowed');


/**
* 
*/
class model_home extends model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function pinned($user_name)
	{
		$sql = "SELECT projects_id FROM pinned_projects WHERE user_id='{$user_name}'";
		return $this->database->fetch_multiple_result($sql);
	}

}