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
		$sql = "select * from products where featured = 2";

		$query = $this->db->query($sql);
		$ans = $query->result();
		$data["data"] = $ans;

		$this->load->view('product_laptop', $data);
	}
	public function mobile()
	{
		$sql = "select * from products where featured = 1";

		$query = $this->db->query($sql);
		$ans = $query->result();
		$data["data"] = $ans;

		$this->load->view('product_mobile', $data);
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
		$firstName = $this->input->post("firstName");
		$password = $this->input->post("password");

		$this->db->select("*");
		$this->db->from("user");
		$this->db->where("firstName", $firstName);
		$this->db->where("password", $password);
		$query = $this->db->get("");
		$num = $query->num_rows();
		if ($num > 0) {
?>
			<script>
				alert("login successful");
				window.location.href = '<?php echo base_url('welcome'); ?>'
			</script>

		<?php
		} else {
		?>
			<script>
				alert("invalid user name or password");
				window.location.href = '<?php echo base_url('welcome/login'); ?>'
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

		$firstName = $this->input->post("firstName");
		$password = $this->input->post("password");

		$sql = "select * from admin where firstName='$firstName' and password='$password'";
		$query = $this->db->Query($sql);
		$res = $query->result();
		//var_dump($res);
		$num = $query->num_rows();


		if ($num > 0) {
		?>
			<script>
				alert("Welcome to admin panel");
				window.location.href = '<?php echo base_url('welcome/adminDtails'); ?>'
			</script>

		<?php
		} else {
		?>
			<script>
				alert("invalid user name or password");
				window.location.href = '<?php echo base_url('welcome/admin'); ?>'
			</script>

		<?php
		}
		//$this->load->view("adminDtails");
	}
	public function adminDtails()
	{
		$sql = "select * from products";

		$query = $this->db->query($sql);
		$ans = $query->result();
		$data["data"] = $ans;

		$this->load->view('adminDtails', $data);
	}
	public function edit($id)
	{

		$sql = "select *  from products where id= $id";
		$query = $this->db->query($sql);
		$ans = $query->result();
		$data["data"] = $ans;
		$this->load->view("edit_products", $data);
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

		$this->load->view("insert_view");
	}
	public function insert()
	{

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
	}
	public function delete($id)
	{
		
		$sql = "delete from products where id='$id' ";
		$query = $this->db->query($sql);
		
		if($query){
			?>
			<script>
				alert ("deleted ");
				window.location.href='<?php echo base_url('welcome/adminDtails'); ?>'
			</script>
			<?php
		}
	}
}
