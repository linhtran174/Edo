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

}
?>