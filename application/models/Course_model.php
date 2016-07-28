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

	public function getCourseDetail($course_id) {
		$sql = "SELECT `course_id`, `course_name`, `course_desc`, `course_shortDesc`, `course_totalTime`, `course_teacher`, `course_level`, `course_createAt`, `course_startAt`, `course_video`, `course_fee`, `course_forum`, `course_cate`, `course_rate`, `teacher_fname`, `teacher_lname`, `teacher_desc` FROM `tblCourse` AS c, `tblTeacher` as t WHERE c.`course_id` = ? AND c.`course_teacher` = t.`teacher_id`";
		$query = $this->db->query($sql, array($course_id));
		return $query->result();
	}

}
?>