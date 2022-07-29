<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		session_start();
		$sql = "select * from products";
		//var_dump("hai");
		$query = $this->db->query($sql);
		$ans = $query->result();
		$data["data"] = $ans;
		//var_dump($ans);
		$this->load->view('my_shop', $data);
	}
	public function details($id)
	{
		$sql = "select * from products where id=$id";

		$query = $this->db->query($sql);
		$ans = $query->result();
		$data["data"] = $ans;

		$this->load->view('pro_details', $data);
	}
	public function laptop()
	{
		session_start();
		$sql = "select * from products where featured = 2";

		$query = $this->db->query($sql);
		$ans = $query->result();
		$data["data"] = $ans;

		$this->load->view('my_shop', $data);
	}
	public function mobile()
	{
		session_start();
		$sql = "select * from products where featured = 1";

		$query = $this->db->query($sql);
		$ans = $query->result();
		$data["data"] = $ans;

		$this->load->view('my_shop', $data);
	}
	public function login()
	{
		$this->load->view("login");
	}
	public function signup()
	{
		$this->load->view("signup");
	}
	public function user()
	{
		$firstName = $this->input->post("firstName");
		$password = $this->input->post("password");

		$emailAddress = $this->input->post("emailAddress");
		$phoneNumber = $this->input->post("phoneNumber");

		$sql = "insert into user values('','$firstName','$password','$emailAddress','$phoneNumber')";
		$query = $this->db->Query($sql);
		redirect(base_url('welcome/'));
	}
	public function user_check()
	{
		session_start();
		$firstName = $this->input->post("firstName");
		$password = $this->input->post("password");

		$this->db->select("*");
		$this->db->from("user");
		$this->db->where("firstName", $firstName);
		$this->db->where("password", $password);
		$query = $this->db->get("");
		$res = $query->result();


		$db_firstName = NULL;
		$db_password = NULL;


		foreach ($res as $details) {
			$db_firstName = $details->firstName;
			$db_password = $details->password;
		}




		if (isset($_SESSION['username'])) {
?>
			<script>
				alert("you didn't logout")
				window.location.href = "<?php echo base_url('welcome/') ?>";
			</script>
		<?php
		} elseif ($db_firstName == $firstName && $db_password == $password) {
			$_SESSION['username'] = $db_firstName;
		?>
			<script>
				alert("login sucess")
				window.location.href = "<?php echo base_url('welcome/') ?>";
			</script>
		<?php
		} else {
		?>
			<script>
				alert("Invalid user name or pasword !")
				window.location.href = "<?php echo base_url('welcome/login') ?>";
			</script>
		<?php
		}
	}

	public function userLogout()
	{
		session_start();
		if (isset($_SESSION['username'])) {
			session_destroy();
		?>
			<script>
				alert("Logout successfully !")
				window.location.href = "<?php echo base_url('welcome/') ?>";
			</script>
		<?php
		}
	}
	// $res = $query->result();
	// var_dump($res);
	// $data['data']=$res;
	// foreach($data as $std)
	//             {
	//                 echo $std->firstName;
	//             }
	// //var_dump($res);
	// if ($res != NULL) {
	// 	redirect(base_url('welcome/'));
	// } else {

	// <script>
	// 		alert("user name or password is inncorrect")
	// 		window.location.href = '<-?php echo base_url('welcome/login'); ?=>'
	// 	</script>

	public function admin()
	{
		$this->load->view("admin");
	}
	public function adminLogin()
	{
		session_start();
		$firstName = $this->input->post("firstName");
		$password = $this->input->post("password");

		$this->db->select("*");
		$this->db->from("admin");
		$this->db->where("firstName", $firstName);
		$this->db->where("password", $password);
		$query = $this->db->get("");
		$res = $query->result();


		$db_firstName = NULL;
		$db_password = NULL;


		foreach ($res as $details) {
			$db_firstName = $details->firstName;
			$db_password = $details->password;
		}




		if (isset($_SESSION['uname'])) {
		?>
			<script>
				alert("you didn't logout")
				window.location.href = "<?php echo base_url('welcome/adminDtails') ?>";
			</script>
		<?php
		} elseif ($db_firstName == $firstName && $db_password == $password) {
			$_SESSION['uname'] = $db_firstName;
		?>
			<script>
				alert("login sucess")
				window.location.href = "<?php echo base_url('welcome/adminDtails') ?>";
			</script>
		<?php
		} else {
		?>
			<script>
				alert("Invalid user name or pasword !")
				window.location.href = "<?php echo base_url('welcome/admin') ?>";
			</script>
		<?php
		}
	}
	public function adminDtails()
	{
		session_start();

		$sql = "select * from products";

		$query = $this->db->query($sql);
		$ans = $query->result();
		$data["data"] = $ans;

		if ($_SESSION['uname'] != NULL) {
			$this->load->view('adminDtails', $data);
		} else {
		?>
			<script>
				alert("enter username and password")
				window.location.href = "<?php echo base_url('welcome/admin') ?>";
			</script>
		<?php
		}
	}
	public function adminLogout()
	{
		session_start();
		if (isset($_SESSION['uname'])) {
			session_destroy();
		?>
			<script>
				alert("Logout successfully !")
				window.location.href = "<?php echo base_url('welcome/admin') ?>";
			</script>
		<?php
		}
	}
	public function edit($id)
	{

		$sql = "select *  from products where id= $id";
		$query = $this->db->query($sql);
		$ans = $query->result();
		$data["data"] = $ans;

		session_start();
		if ($_SESSION['uname'] != NULL) {
			$this->load->view("edit_products", $data);
		} else {
		?>
			<script>
				alert("enter username and password")
				window.location.href = "<?php echo base_url('welcome/admin') ?>";
			</script>
		<?php
		}
	}
	public function editResult()
	{
		$id = $this->input->post("id");
		$title = $this->input->post("title");
		$price = $this->input->post("price");
		$brandname = $this->input->post("brandname");
		$description = $this->input->post("description");
		$featured = $this->input->post("featured");

		//..................Image update process...........



		$file_name = $_FILES['myfile']['name'];

		if ($file_name != NULL) {
			$temp = $_FILES['myfile']['tmp_name'];
			$new_file_name = time() . $file_name;
			move_uploaded_file($temp, 'images/' . $new_file_name);
			$image = 'images/' . $new_file_name;
		} else {

			$image = $this->input->post("image");
			echo $image;
		}



		$sql = "update products set title='$title',price='$price',brandname='$brandname',image='$image',description='$description',featured='$featured' where id='$id'";
		$res = $this->db->query($sql);
		//var_dump($res);

		if ($res) {
		?>
			<script>
				alert("Updation done");
				window.location.href = '<?php echo base_url('welcome/adminDtails'); ?>'
			</script>

		<?php
		}
	}
	public function insertView()
	{
		session_start();
		if ($_SESSION['uname'] != NULL) {
			$this->load->view("insert_view");
		} else {
		?>
			<script>
				alert("enter username and password")
				window.location.href = "<?php echo base_url('welcome/admin') ?>";
			</script>
			<?php
		}
	}
	public function insert()
	{

		session_start();
		if ($_SESSION['uname'] != NULL) {
			$file_name = $_FILES['myfile']['name'];
			$tem = $_FILES['myfile']['tmp_name'];
			$new_file_name = time() . $file_name;
			move_uploaded_file($tem, 'images/' . $new_file_name);

			$title = $this->input->post("title");
			$price = $this->input->post("price");
			$brandname = $this->input->post("brandname");
			$image = $this->input->post("image");
			$description = $this->input->post("description");
			$featured = $this->input->post("featured");

			$new = [
				"title" => $title,
				"price" => $price,
				"brandname" => $brandname,
				"image" => 'images/' . $new_file_name,
				"description" => $description,
				"featured" => $featured
			];
			$res = $this->db->insert("products", $new);
			if ($res) {
			?>
				<script>
					alert("Inserted new value");
					window.location.href = '<?php echo base_url('welcome/adminDtails'); ?>'
				</script>

			<?php
			}
		} else {
			?>
			<script>
				alert("enter username and password")
				window.location.href = "<?php echo base_url('welcome/admin') ?>";
			</script>
		<?php
		}
	}
	public function delete($id)
	{

		$sql = "delete from products where id='$id' ";
		$query = $this->db->query($sql);

		if ($query) {
		?>
			<script>
				alert("deleted ");
				window.location.href = '<?php echo base_url('welcome/adminDtails'); ?>'
			</script>
			<?php
		}
	}
	//.................cart..........

	public function addCart($id)
	{
		session_start();
		//.......userid
		$this->db->select("*");
		$this->db->from("user");
		$this->db->where("firstName", $_SESSION['username']);
		$sql = $this->db->get("");
		$data = $sql->result();
		foreach ($data as $ans) {
			$u_db_userid = $ans->id;
		}
		$this->db->select("*");
		$this->db->from("cart");
		$this->db->where("userid", $u_db_userid);
		$sql1 = $this->db->get("");
		$data1 = $sql1->result();
		foreach ($data1 as $ans) {
			$c_db_proid = $ans->proid;
		}

		//.........cart add
		if ($data1 != NULL) {
			if ($c_db_proid == $id) {
				//current user with alredy inserted data
				$this->db->select("*");
				$this->db->from("cart");
				$this->db->where("userid",  $u_db_userid);
				$sql = $this->db->get("");
				$data = $sql->result();
				foreach ($data as $ans) {
					$db_qnt = $ans->quantity;
				}
				$this->db->set("quantity", ++$db_qnt);
				$this->db->where("userid",  $u_db_userid);
				$this->db->where("proid",  $c_db_proid);
				$this->db->update("cart");
			?>
				<script>
					alert("Added to cart ! ");
					window.location.href = '<?php echo base_url('welcome/'); ?>'
				</script>
<?php
			} else {
				//alredy inserted user with new product
				$qnt = 0;
				$new = [
					"userid" => $u_db_userid,
					"proid" => $id,
					"quantity" => ++$qnt
				];
				$this->db->insert("cart", $new);
				redirect(base_url('welcome/'));
			}
		} else {
			//new user insert
			$qnt = 0;
			$new = [
				"userid" => $u_db_userid,
				"proid" => $id,
				"quantity" => ++$qnt
			];
			$this->db->insert("cart", $new);
			redirect(base_url('welcome/'));
		}
	}
	public function cartDetails()
	{
		session_start();

		$this->db->select("*");
		$this->db->from("user");
		$this->db->where("firstName", $_SESSION['username']);
		$sql = $this->db->get("");
		$data = $sql->result();
		foreach ($data as $ans) {
			$u_db_userid = $ans->id;
		}

		$this->db->select("*");
		$this->db->from("cart");
		$this->db->where("userid", $u_db_userid);
		$sql1 = $this->db->get("");
		$ans = $sql1->result();
		$data1["data1"]=$ans;
		//var_dump($data1);
		
		$this->load->view("cart_details",$data1);
		
	}
	public function increaseCartPro($id){

		$this->db->select("*");
				$this->db->from("cart");
				$this->db->where("id",  $id);
				$sql = $this->db->get("");
				$data = $sql->result();
				foreach ($data as $ans) {
					$db_qnt = $ans->quantity;
				}
				$this->db->set("quantity", ++$db_qnt);
				$this->db->where("id",  $id);
				
				$this->db->update("cart");

				redirect(base_url('welcome/cartDetails'));
	}
	public function deleteCartPro($id){

		$sql = "delete from cart where id='$id' ";
		$query = $this->db->query($sql);

				redirect(base_url('welcome/cartDetails'));
	}
	public function decreaseCartPro($id){

		$id1=$id;
		$this->db->select("*");
				$this->db->from("cart");
				$this->db->where("id",  $id);
				$sql = $this->db->get("");
				$data = $sql->result();
				foreach ($data as $ans) {
					$db_qnt = $ans->quantity;
				}
				if($db_qnt>1){
				$this->db->set("quantity", --$db_qnt);
				$this->db->where("id",  $id);
				
				$this->db->update("cart");

				redirect(base_url('welcome/cartDetails'));
				}else{
					$d=$this->deleteCartPro($id1);
				}
	}
	public function purchase(){
		
	}
	
}
