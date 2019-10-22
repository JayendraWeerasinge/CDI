<?php
class user_model extends CI_Model
{
	function can_login($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$query = $this->db->get('user');
		//SELECT * FROM users WHERE username = '$username' AND password = '$password'
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function userdetails(){
		$query = $this->db->get('user');
		return $query;
	}

	function update_user_account_data($data,$username){
        $this->db->where('username', $username);
        $this->db->update('user',$data);

    }

    function delete_user_account_data($username){
        $this->db->where("username",$username);
        $this->db->delete('user');
    }
    function fetch_single_data($username){
        $this->db->where('username', $username);
        $query = $this->db->get("user");
        return $query;
    }

	function fetch_single_file($file_name){
		$this->db->where('file_name', $file_name);
		$query = $this->db->get("fileupload");
		return $query;
	}
	function deleteFiles($path,$file_name){
		$files = glob($path.$file_name); // get all file names
		foreach($files as $file){ // iterate files
			if(is_file($file))
				unlink($file); // delete file
			//echo $file.'file deleted';
		}
	}

    function update_data($data,$username){
        $this->db->where('username', $username);
        $this->db->update("user",$data);
    }

	function fetch_data($query){
        $this->db->select("*");
        $this->db->from("user");
        if ($query != '') {
            $this->db->like('username', $query);
            $this->db->or_like('email', $query);
			$this->db->or_like('post', $query);
			$this->db->or_like('type', str_replace(' ', '_',$query));
        }
        $this->db->order_by('username', 'ASC');
        return $this->db->get();
	}

	function insert_data($data){
		$this->db->insert("user",$data); // mysqli_query("insert into user(a,b,c) values("1","2","3"));
	}

    function insert_file($data){
        $this->db->insert("fileupload",$data);
    }

    function insert_cat($data){
        $this->db->insert("category_data",$data);
    }

    function insert_External($data){
        $this->db->insert("external",$data);
    }

    function insert_Postgraduate($data){
        $this->db->insert("postgraduate",$data);
    }


    function fetch_cat(){
        $query = $this->db->get("category_data");
        return $query;
    }
	function fetch_accounts(){
		$query = $this->db->get("user");
		return $query;
	}
	function fetch_accounts_user(){
		$this->db->where("type",'User');
		$query = $this->db->get("user");
		return $query;
	}

	function fetch_accounts_qac(){
		$this->db->where("type",'qac');
		$query = $this->db->get("user");
		return $query;
	}

    function delete_cat($category){
        $this->db->where("category",$category);
        $this->db->delete('category_data');
    }

    public function create_tables($name){

        $this->load->dbforge();
        $fields = array(
            'subject_code' => array(
                'type' => 'VARCHAR',
                'constraint' => 10,
            ),
            'subject_name' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
            ),
            'year' => array(
                'type' => 'VARCHAR',
                'constraint' => 10,
            ),
            'semester' => array(
                'type' => 'VARCHAR',
                'constraint' => 10,
            )
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('subject_code',true);
        $this->dbforge->create_table($name);
    }

    public function delete_tables($category){
        $this->load->dbforge();
        $this->dbforge->drop_table($category,true);
    }

    function insertdata($tname,$data){
        $this->db->insert($tname,$data);
    }

    function fetch_subject($category_name){
        $this->db->order_by('subject_code', 'ASC');
        $query = $this->db->get($category_name);
        $output = '<option value=""></option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->subject_code.'">'.$row->subject_code.'</option>';

        }
        return $output;
    }

    function fetch_subject_year($year,$category_name){
        $this->db->where('year', $year);
        $this->db->order_by('subject_code', 'ASC');
        $query = $this->db->get($category_name);
        $output = '<option value=""></option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->subject_code.'">'.$row->subject_code.'</option>';
        }
        return $output;
    }

    function fetch_subject_year_semester($year,$category_name,$semester){
        $this->db->where('year', $year);
        $this->db->where('semester', $semester);
        $this->db->order_by('subject_code', 'ASC');
        $query = $this->db->get($category_name);
        $output = '<option value="">select subject code</option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->subject_code.'">'.$row->subject_code.'</option>';
        }
        return $output;
    }


    function fetch_category($query)
    {
        $this->db->select("*");
        $this->db->from("category_data");
        if ($query != '') {
            $this->db->like('category', $query);
        }
        $this->db->order_by('category', 'ASC');
        return $this->db->get();
    }

    function fetch_doc($query)
    {
        $this->db->select("*");
        $this->db->from("fileupload");
        if ($query != '') {
            $this->db->like('file_name', $query);
            $this->db->or_like('date_created', $query);
            $this->db->or_like('category', $query);
            $this->db->or_like('year', $query);
            $this->db->or_like('semester', $query);
            $this->db->or_like('academic_year', $query);
            $this->db->or_like('subject_code', $query);
            $this->db->or_like('author', $query);
            $this->db->or_like('comment', $query);
        }
        $this->db->order_by('file_name', 'ASC');
        return $this->db->get();
    }

    function fetch_data_cat_table($cat){
        $this->db->order_by('year', 'ASC');
        $this->db->order_by('semester', 'ASC');
        $this->db->order_by('subject_code', 'ASC');
        $query = $this->db->get($cat);
        return $query;
    }

    function rename_category($Oldname,$Newname){
        $this->load->dbforge();
        $this->dbforge->rename_table($Oldname, $Newname);
    }

    function update_data_category($Oldname,$Newname){
        $this->db->where('category', $Oldname);
        $this->db->update("category_data",$Newname);
    }

    function delete_cat_data($subject,$category){
        $this->db->where("subject_code",$subject);
        $this->db->delete($category);
    }

    function fetch_subject_cat($query){
        $this->db->select("*");
        $this->db->from($_SESSION['x']);
        if ($query != '') {
            $this->db->like('subject_code', $query);
            $this->db->or_like('subject_name', $query);
        }
        $this->db->order_by('year', 'ASC');
        $this->db->order_by('semester', 'ASC');
        $this->db->order_by('subject_code', 'ASC');

        return $this->db->get();
    }

    function update_category_date($tname,$data,$old_subject_code){
        $this->db->where('subject_code', $old_subject_code);
        $this->db->update($tname,$data);
    }

    function verify_delete($username,$password){
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('type', 'admin');

        $query = $this->db->get('user');

        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    //------------------------------------------------------------------------------------------------------------------

	function fetch_subject_update($category_name){
		$this->db->order_by('subject_code', 'ASC');
		$query = $this->db->get($category_name);
		$output = '<option value=""></option>';
		foreach($query->result() as $row)
		{
			$output .= '<option value="'.$row->subject_code.'">'.$row->subject_code.'</option>';

		}
		return $output;
	}

	function fetch_subject_year_update($year,$category_name){
		$this->db->where('year', $year);
		$this->db->order_by('subject_code', 'ASC');
		$query = $this->db->get($category_name);
		$output = '<option value=""></option>';
		foreach($query->result() as $row)
		{
			$output .= '<option value="'.$row->subject_code.'">'.$row->subject_code.'</option>';
		}
		return $output;
	}

	function fetch_subject_year_semester_update($year,$category_name,$semester){
		$this->db->where('year', $year);
		$this->db->where('semester', $semester);
		$this->db->order_by('subject_code', 'ASC');
		$query = $this->db->get($category_name);
		$output = '<option value="">select subject code</option>';
		foreach($query->result() as $row)
		{
			$output .= '<option value="'.$row->subject_code.'">'.$row->subject_code.'</option>';
		}
		return $output;
	}

	//------------------------------------------------------------------------------------------------------------------
	function fetch_single_data_users($username,$password){
		$this->db->where('username', $password);
		$this->db->where('username', $username);
		$query = $this->db->get("user");
		return $query;
	}

}
