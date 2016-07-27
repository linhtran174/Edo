<?php
class course_model extends MY_Model{
	public $table = 'tblCourse';
	public $table_id = 'course_id';

	public function getCoursePage($page){
		
		$query = "SELECT * FROM ".$this->table." LIMIT ".($page*5).",".($page*5+5);
		//SELECT * FROM tbtCourse LIMIT 10, 20
		$result = $this->db->query($query)->result();
		return $result;
	}

	public function filterCoure($input){
		if($input['level'] == null){
			if($input['fee'] != 0){
				$query = "SELECT * FROM ".$this->table." WHERE course_fee > 0";
			}
			else $query = "SELECT * FROM ".$this->table." WHERE course_fee = 0";
		}
		else if($input['fee'] == null){
			$query = "SELECT * FROM ".$this->table." WHERE course_level = ".$input['level'][0];
		}
		else{
			if($input['fee'] != 0){
				$query = "SELECT * FROM ".$this->table." WHERE course_fee > 0 AND course_level = ".$input['level'][0];
			}
			else $query = "SELECT * FROM ".$this->table." WHERE course_fee = 0 AND course_level = ".$input['level'][0];
		}
		$result = $this->db->query($query)->result();
		return $result;
	}

}
?>