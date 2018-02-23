<?php

class Toppvp_model extends CI_Model
{
	private $connection;

	public function getTopKillChars($count, $realm)
	{
		// Initialize the connection
		$realm->getCharacters()->connect();
		$this->connection = $realm->getCharacters()->getConnection();
		
		if(column('characters', 'totalKills', $realm->getId()))
		{
			// Select character data
			$query = $this->connection->query("SELECT ".columns("characters", array('guid', 'race', 'class', 'gender', 'level', 'name', 'totalKills'), $realm->getId())." FROM ".table('characters', $realm->getId())." WHERE ".column('characters', 'totalKills')." > 0 ORDER BY ".column('characters', 'totalKills', false, $realm->getId())." DESC LIMIT ".$count);
		}
		else
		{
			$query = $this->connection->query(query('pvp_character', $realm->getId()).$count);
		}

		if(!$query)
		{
			die($err = $this->connection->error());
		}
		
		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else 
		{
			return false;	
		}
	}
}