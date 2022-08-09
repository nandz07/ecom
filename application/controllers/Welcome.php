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
	public function login($flag)
	{
		
		if($flag == 1){
			$f["f"]=1;
		$this->load->view("login",$f);
		}else{
			$f["f"]=2;
			$this->load->view("login",$f);
		}
	}
	public function signup()
	{
		$this->load->view("signup");
	}
	public function user()
	{
		$flag=NULL;

		

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
		$f = $this->input->post("f");
		if($f == 1){
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
			$db_id = $details->id;
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
			$_SESSION['userid'] = $db_id;
			$this->db->set("userid", $db_id);
			$this->db->where("userid", NULL);
			$this->db->update("cart");
		?>
			<script>
				alert("login sucess 1")
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
	}else{
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
			$db_id = $details->id;
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
			$_SESSION['userid'] = $db_id;
			//....add to cart and update user id NILL to __ from not user login to login while place order....
			$this->db->set("userid", $db_id);
			$this->db->where("userid", NULL);
			$this->db->update("cart");
		?>
			<script>
				alert("login sucess 2")
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
	}

	public function userLogout()
	{
		session_start();
		if (isset($_SESSION['username'])) {
			unset($_SESSION["username"]);
			unset($_SESSION["userid"]);
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
			unset($_SESSION["uname"])
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
		$this->db->where("proid", $id);
		$sql1 = $this->db->get("");
		$data1 = $sql1->result();
		foreach ($data1 as $ans) {
			$c_db_proid = $ans->proid;
			$c_db_status = $ans->status;

			
		}

		//.........cart add
		if ($data1 != NULL) {
			if ($c_db_proid == $id) {
				//current user with alredy inserted data
				if($c_db_status == 1){  
				
				$this->db->select("*");
				$this->db->from("cart");
				$this->db->where("userid",  $u_db_userid);
				$this->db->where("proid", $id);
				$sql = $this->db->get("");
				$data = $sql->result();
				foreach ($data as $ans) {
					$db_qnt = $ans->quantity;
				}
				$this->db->set("quantity", ++$db_qnt);
				$this->db->where("userid",  $u_db_userid);
				$this->db->where("proid",  $c_db_proid);
				$this->db->update("cart");
				redirect(base_url('welcome/'));
			}else{
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
		if(isset($_SESSION['username'])){
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
		$data1["data1"] = $ans;
		//var_dump($data1);

		$this->load->view("cart_details", $data1);
	}else{
		$this->db->select("*");
		$this->db->from("cart");
		$this->db->where("userid", NULL);
		$sql1 = $this->db->get("");
		$ans = $sql1->result();
		$data1["data1"] = $ans;
		//var_dump($data1);

		$this->load->view("cart_details", $data1);
	}
	}
	public function increaseCartPro($id)
	{

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
	public function deleteCartPro($id)
	{

		$sql = "delete from cart where id='$id' ";
		$query = $this->db->query($sql);

		redirect(base_url('welcome/cartDetails'));
	}
	public function decreaseCartPro($id)
	{

		$id1 = $id;
		$this->db->select("*");
		$this->db->from("cart");
		$this->db->where("id",  $id);
		$sql = $this->db->get("");
		$data = $sql->result();
		foreach ($data as $ans) {
			$db_qnt = $ans->quantity;
		}
		if ($db_qnt > 1) {
			$this->db->set("quantity", --$db_qnt);
			$this->db->where("id",  $id);

			$this->db->update("cart");

			redirect(base_url('welcome/cartDetails'));
		} else {
			$d = $this->deleteCartPro($id1);
		}
	}
	public function purchase()
	{
		session_start();
		if(isset($_SESSION['username'])){
			$t = $this->input->post("total");
			$data["hai"] = $t;
	
			$this->load->view("purchase_details", $data);
		}elseif($_SESSION['username'] == NULL){
			$flag =2;
			redirect(base_url('welcome/login/').$flag);
		}
		
	}
	public function placeOrder()
	{
		session_start();
		$t=time();
		if(isset($_SESSION['username'])){

		
		$firstName = $this->input->post("firstName");
		$address = $this->input->post("address");

		$emailAddress = $this->input->post("emailAddress");
		$phoneNumber = $this->input->post("phoneNumber");

		$payment = $this->input->post("payment");
		$total = $this->input->post("total");
		$uid = $this->input->post("uid");

		$this->db->select("*");
		$this->db->from("user");
		$this->db->where("firstName", $_SESSION['username']);
		$sql = $this->db->get("");
		$data = $sql->result();
		foreach ($data as $ans) {
			$u_db_userid = $ans->id;
		}

		$new = [
			"firstName" => $firstName,
			"address" => $address,
			"emailAddress" => $emailAddress,
			"phoneNumber" => $phoneNumber,
			"payment" => $payment,
			"total" => $total,
			"uid" => $u_db_userid,
			"time"=>$t
		];
		$res = $this->db->insert("order", $new);



		$this->db->select("*");
		$this->db->from("user");
		$this->db->where("firstName", $_SESSION['username']);
		$sql = $this->db->get("");
		$data = $sql->result();
		foreach ($data as $ans) {
			$u_db_userid = $ans->id;
		}
		

		$this->db->set("status", "2");
		$this->db->set("time", $t);
		
		$this->db->where("userid", $u_db_userid);
		$this->db->where("status", "1");

		$this->db->update("cart");

		redirect(base_url('welcome/cartDetails'));
	}elseif($_SESSION['username'] == NULL){
		$flag =2;
		redirect(base_url('welcome/login/').$flag);
	}

	}
	public function adminOrder()
	{
		session_start();
		
		$this->db->select("*");
		$this->db->from("order");
		$sql = $this->db->get("");
		$data["data"] = $sql->result();

		$this->load->view("admin_order", $data);
	}
	public function orderOfCustomer($id)
	{

		$this->db->select("*");
		$this->db->from("order");
		$this->db->where("id", $id);
		$sql = $this->db->get("");
		$data = $sql->result();
		foreach ($data as $ans) {
			$o_db_userid = $ans->uid;
			$o_db_time =$ans->time;
		}


		$this->db->select("*");
		$this->db->from("cart");
		$this->db->where("userid", $o_db_userid);
		$this->db->where("time", $o_db_time);
		$sql1 = $this->db->get("");
		$ans = $sql1->result();
		$data1["data1"] = $ans;

		$this->load->view("oreder_of_customer", $data1);
	}
	public function allowOrder()
	{
		$userid = $this->input->post("userid");
		$t = $this->input->post("time");
		echo $userid;


		$this->db->set("status","3");
		$this->db->where("userid",  $userid);
		$this->db->where("time",  $t);
		$this->db->where("status",  "2");
		$this->db->update("cart");

		$this->db->set("status","3");
		$this->db->where("uid",  $userid);
		$this->db->where("time",  $t);
		//$this->db->where("status",  "0");
		$this->db->update("order");

		redirect(base_url('welcome/adminOrder'));
		
	}
	public function clearCancelledorder(){
		$this->db->from("cart");
		$this->db->where("status",4);
		$this->db->delete();

		$this->db->from("cart");
		$this->db->where("status",4);
		redirect(base_url('welcome/adminOrder'));
	}
	public function cancelCartPro($id){
		session_start();
		//status 4 in cart =>cancelled project

		$this->db->select("*");
		$this->db->from("cart");
		$this->db->where("id",  $id);
		$sql = $this->db->get("");
		$data = $sql->result();
		foreach ($data as $ans) {
			$db_qnt = $ans->quantity;
			$db_proid=$ans->proid;
		}
		$this->db->select("*");
		$this->db->from("order");
		$this->db->where("uid",  $_SESSION['userid']);
		$sql = $this->db->get("");
		$data = $sql->result();
		foreach ($data as $ans) {
			$db_total = $ans->total;
		}
		$this->db->select("*");
		$this->db->from("products");
		$this->db->where("id",$db_proid );
		$sql = $this->db->get("");
		$data = $sql->result();
		foreach ($data as $ans) {
			$db_price = $ans->price;
		}

		$cancelled=$db_total-($db_price*$db_qnt);

		$this->db->set("total",$cancelled);
		$this->db->where("uid", $_SESSION['userid']);
		$this->db->where("status", NULL);
		$this->db->update("order");

		

		$this->db->set("status","4");
		$this->db->where("id",  $id);
		$this->db->update("cart");
		redirect(base_url('welcome/cartDetails'));
	}
	public function cartHistory(){
		session_start();

		$this->db->select("*");
		$this->db->from("cart");
		$this->db->where("userid",$_SESSION['userid']);

		$sql=$this->db->get("");
		$data["data"]=$sql->result();

		$this->load->view("cart_history",$data);

	}
}
