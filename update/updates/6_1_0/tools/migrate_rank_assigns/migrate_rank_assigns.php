<?php

class Migrate_rank_assigns
{
	public $version = "6.1.0";
	public $name = "Migrate rank assigns";
	public $defaultGroupIds = array(
		"GM" => 3,
		"Developer" => 6,
		"Administrator" => 7,
		"Owner" => 8
	);

	public function __construct()
	{
		require_once("lib/auth.php");
	}

	public function run()
	{
		$oldQuery = Update::$db->query("SELECT * FROM ranks");

		if(!$oldQuery->num_rows)
		{
			die("Error: there are no <6.05 ranks");
		}

		$out = "Scanning...<br /><br />";

		while($oldResult = $oldQuery->fetch_array(MYSQLI_ASSOC))
		{
			if($oldResult['is_owner'])
			{
				$out .= $this->migrate($oldResult['access_id'], $this->defaultGroupIds['Owner']) . "<br /><br />";
			}
			elseif($oldResult['is_admin'])
			{
				$out .= $this->migrate($oldResult['access_id'], $this->defaultGroupIds['Administrator']) . "<br /><br />";
			}
			elseif($oldResult['is_dev'])
			{
				$out .= $this->migrate($oldResult['access_id'], $this->defaultGroupIds['Developer']) . "<br /><br />";
			}
			elseif($oldResult['is_gm'])
			{
				$out .= $this->migrate($oldResult['access_id'], $this->defaultGroupIds['GM']) . "<br /><br />";
			}
			else
			{
				// No special permissions (guest or player); don't migrate
			}
		}

		$out .= "<span style='font-size:13px;color:red;'><b>(!)</b> Please note that the FusionCMS permission system no longer relies on GM levels. If you want to assign a group (rank), it must be done via the admin panel.</span><br />";

		$out .= "<br /><b>Done!</b>";

		return $out;
	}

	/**
	 * Assign all accounts with a certain access id to a certain group
	 * @param Int $accessId
	 * @param Int $groupId
	 * @return String
	 */
	private function migrate($accessId, $groupId)
	{
		$groupName = array_keys($this->defaultGroupIds, $groupId);

		// Get the IDs from the GM level
		$accountIds = array();

		$gmQuery = Auth::$db->query("SELECT ".Auth::$emulator->getColumn("account_access", "id")." `id`
										FROM ".Auth::$emulator->getTable("account_access")."
										WHERE ".Auth::$emulator->getColumn("account_access", "gmlevel")."=".$accessId);

		if(!$gmQuery->num_rows)
		{
			return "Found no accounts with <b>GM level ".$accessId."</b>; no one assigned to FusionCMS group <b>".$groupName[0]."</b>";
		}

		while($gmResult = $gmQuery->fetch_array(MYSQLI_ASSOC))
		{
			array_push($accountIds, $gmResult['id']);
		}

		// Get account names from the IDs
		$accounts = array();

		$accountQuery = Auth::$db->query("SELECT ".Auth::$emulator->getColumn("account", "username")." `username`
										FROM ".Auth::$emulator->getTable("account")."
										WHERE ".Auth::$emulator->getColumn("account", "id")." IN(".implode(",", $accountIds).")");

		while($accountResult = $accountQuery->fetch_array(MYSQLI_ASSOC))
		{
			array_push($accounts, $accountResult['username']);
		}

		// Assign groups
		foreach($accountIds as $accountId)
		{
			$query = Update::$db->query("SELECT COUNT(*) `total` FROM acl_account_groups WHERE account_id=".$accountId." AND group_id=".$groupId);
			$result = $query->fetch_array(MYSQLI_ASSOC);

			if(!$result['total'])
			{
				Update::$db->query("INSERT INTO acl_account_groups(account_id, group_id) VALUES(".$accountId.", ".$groupId.")");
			}
		}

		return "Assigned <i>".implode(", ", $accounts)."</i> with <b>GM level ".$accessId."</b> to FusionCMS group <b>".$groupName[0]."</b>";
	}
}