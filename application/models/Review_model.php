<?php
class review_model extends MY_Model{
	public $table = 'tblReview';
	public $table_id = 'review_id';

	public function get_review_and_student_list($review_course, $limit, $offset){
		$sql = "
			SELECT `review_content`, `review_rate`, CONCAT(`stud_fname`,' ',`stud_lname`) AS `stud_name`, `review_date` FROM `tblReview`, `tblStudent` WHERE `review_stud` = `stud_id` AND `review_course` = ? LIMIT ? OFFSET ?
		";
		$query = $this->db->query($sql, array($review_course, $limit, $offset));
		return $query->result();
	}

}
?>