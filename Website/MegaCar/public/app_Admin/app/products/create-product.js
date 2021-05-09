$(document).ready(function(){
	
    // show html form when 'create product' button was clicked
    $(document).on('click', '.create-product-button', function(){

		// The "read products" button is needed so that we can go back to the products list		
		var create_product_html=`
 
			<!-- 'read products' button to show list of products -->
			<div id='read-products' class='btn btn-primary pull-right m-b-15px read-products-button'>
				<span class='glyphicon glyphicon-list'></span> Lista clienti
			</div>		

		<!-- 'create product' html form -->
		<form id='create-product-form' action='#' method='post' border='0'>
			<table class='table table-hover table-responsive table-bordered'>
 
				<!-- username field -->
				<tr>
					<td>Username</td>
					<td><input type='text' name='username' class='form-control' required /></td>
				</tr>
				
				<!-- password field -->
				<tr>
					<td>Password</td>
					<td><input type='password' name='password' class='form-control' required /></td>
				</tr>
 
				<!-- name field -->
				<tr>
					<td>Nome</td>
					<td><input type='text' name='nome_cliente' class='form-control' required /></td>
				</tr>
 
				<!-- cognome field -->
				<tr>
					<td>Cognome</td>
					<td><input type='text' name='cognome_cliente' class='form-control' required /></td>
				</tr>
 
				<!-- email field -->
				<tr>
					<td>Email</td>
					<td><input type='email' name='email_cliente' class='form-control' required /></td>
				</tr>
				
				<!-- indirizzo field -->
				<tr>
					<td>Indirizzo</td>
					<td><input type='text' name='indirizzo' class='form-control' required /></td>
				</tr>
				
				<!-- button to submit form -->
				<tr>
					<td></td>
					<td>
						<button type='submit' class='btn btn-primary'>
							<span class='glyphicon glyphicon-plus'></span> Aggiungi cliente
						</button>
					</td>
				</tr>

			</table>
		</form>`;

		// inject html to 'page-content' of our app
		$("#page-content").html(create_product_html);
 
		// chage page title
		changePageTitle("Aggiungi cliente");

	});

	// 'create product form' handle: run if create product form was submitted
	$(document).on('submit', '#create-product-form', function(){
		// get form data
		var form_data = JSON.stringify($(this).serializeObject());
		//console.log(form_data);
		// submit form data to api
		$.ajax({
			url: "http://localhost:82/api/v1/clienti",
			type : "POST",
			contentType : 'application/json',
			data : form_data,
			success : function(result) {
				// product was created, go back to products list
				showProducts();
			},
			error: function(xhr, resp, text) {
				// show error to console
				console.log(xhr, resp, text);
				console.log(form_data);
			}
		});
		return false;
	});

});