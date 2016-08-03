<?php
class Classroom_model extends MY_Model{
	public $table = 'tblClassroom';
	public $table_id = 'class_id';

	public function get_student_classrooms($studentID){
		$query = "SELECT * from tblClassroom where class_stud = ".$studentID;
		return $this->db->query($query)->result();
	}



	
}
?>