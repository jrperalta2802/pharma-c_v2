<?php include 'inc/header.php';?>
<?php 
$login = Session::get("cuslogin");
if ($login == true) {
	header("Location:order.php");
}
 ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $custLogin = $cmr->customerLogin($_POST);
}

?> 

<style>
/* Login & Registration Form Styling */

.register_account h3, .login_panel h3 {
    font-size: 24px;
    color: #333;
    font-family: 'Monda', sans-serif;
    padding-bottom: 10px;
}

.register_account, .login_panel {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 25px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    margin: 0 auto;
    margin-bottom: 10px;
}

/* Form Inputs */
.register_account form input[type="text"],
.register_account form input[type="password"],
.register_account form select,
.login_panel input[type="text"],
.login_panel input[type="password"] {
    font-size: 14px;
    color: #444;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin: 5px 0;
    width: 100%;
    box-sizing: border-box;
}

/* Table Layout Fix */
.register_account table {
    width: 100%;
}

.register_account table td {
    width: 50%;
    vertical-align: top;
    padding: 5px;
}

/* Form Element Spacing */
.register_account form div {
    margin-bottom: 10px;
}

/* Terms & Notes */
p.terms, p.note {
    font-size: 14px;
    color: #666;
}
p.terms a, p.note a {
    text-decoration: underline;
    color: #7C2DC5;
}
p.terms a:hover, p.note a:hover {
    text-decoration: none;
}

/* Buttons */
.buttons button, .search button.grey {
    padding: 12px 18px;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    background: linear-gradient(to bottom, #4a90e2, #357ABD);
    border: 1px solid #357ABD;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
}
.buttons button:hover, .search button.grey:hover {
    background: linear-gradient(to bottom, #357ABD, #2b5ea0);
}

/* Button Alignment */
.search {
    display: flex;
    justify-content: flex-start;
    margin-top: 10px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .register_account, .login_panel {
        width: 90%;
        float: none;
        margin-bottom: 20px;
    }
    .register_account form input[type="text"],
    .register_account form select,
    .register_account form input[type="password"],
    .login_panel input[type="text"],
    .login_panel input[type="password"] {
        width: 100%;
    }
}


</style>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">

    	 	<?php 

    		if (isset($custLogin)) {
    			echo $custLogin;
    		}
    		 ?>
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post">
                	<input name="email" placeholder="Email" type="text"/>
                    <input name="pass" placeholder="Password" type="password"/>
                    <div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
                      </div>
                 </form>
                 
                    
                  


<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $customerReg = $cmr->customerRegistration($_POST);
}

?>          
    	<div class="register_account">
    		<?php 

    		if (isset($customerReg)) {
    			echo $customerReg;
    		}
    		 ?>
    		<h3>Register New Account</h3>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Name"/>
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="City"/>
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="Zip-Code"/>
							</div>
							<div>
								<input type="text" name="email" placeholder="Email"/>
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Address"/>
						</div>
		    		
						<div>
							<input type="text" name="country" placeholder="Country"/>
						</div>
				 	        
	
		           <div>
		          <input type="text" name="phone" placeholder="Phone"/>
		          </div>
				  
				  <div>
					<input type="password" name="pass" placeholder="Password"/>
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php';?>
