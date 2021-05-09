$(document).ready(function(){
 
    // show html form when 'update product' button was clicked
    $(document).on('click', '.update-product-button', function(){
        // get product id
		var id = $(this).attr('data-id');
		// read one record based on given product id
		$.getJSON("http://localhost:82/api/v1/clienti/" + id, function(data){
			// values will be used to fill out our form
			var x_id = data.id;
			var x_username = data.username;
			var x_password = data.password;
			var x_nome = data.nome_cliente;
			var x_cognome = data.cognome_cliente;
			var x_email = data.email_cliente;
			var x_indirizzo = data.indirizzo;
     
			// store 'update product' html to this variable
			var update_product_html=`
				<div id='read-products' class='btn btn-primary pull-right m-b-15px read-products-button'>
					<span class='glyphicon glyphicon-list'></span> Modifica cliente
				</div>
			<!-- build 'update product' html form -->
			<!-- we used the 'required' html5 property to prevent empty fields -->
			<form id='update-product-form' action='#' method='post' border='0'>
				<table class='table table-hover table-responsive table-bordered'>
 
 					<!-- id field -->
					<tr>
						<td>ID</td>
						<td>` + id + `</td>
					</tr>
 
					<!-- username field -->
					<tr>
						<td>Username</td>
						<td><input type='text' name='username' class='form-control' value=\"` + x_username + `\" required /></td>
					</tr>
 
					<!-- password field -->
					<tr>
						<td>Password</td>
						<td><input type='password' name='password' class='form-control' value=\"` + x_password + `\" required /></td>
					</tr>
 
					<!-- nome field -->
					<tr>
						<td>Nome</td>
						<td><input type='text' name='nome_cliente' class='form-control' value=\"` + x_nome + `\" required /></td>
					</tr>
 
					<!-- cognome field -->
					<tr>
						<td>Cognome</td>
						<td><input type='text' name='cognome_cliente' class='form-control' value=\"` + x_cognome + `\" required /></td>
					</tr>
 
					<!-- email field -->
					<tr>
						<td>Email</td>
						<td><input type='email' name='email_cliente' class='form-control' value=\"` + x_email + `\" required /></td>
					</tr>
 
					<!-- indirizzo field -->
					<tr>
						<td>Indirizzo</td>
						<td><input type='text' name='indirizzo' class='form-control' value=\"` + x_indirizzo + `\" required /></td>
					</tr>
					
					<!-- hidden 'product id' to identify which record to delete -->
					<td><input value=\"` + id + `\" name='id' type='hidden' /></td>
 
					<tr>

						<!-- button to submit form -->
						<td>
							<button type='submit' class='btn btn-info'>
								<span class='glyphicon glyphicon-edit'></span> Aggiorna cliente
							</button>
						</td>

					</tr>
 
				</table>
			</form>`;				

			// inject to 'page-content' of our app
			$("#page-content").html(update_product_html);
 
			// chage page title
			changePageTitle("Modifica cliente");				
		});
		
    });
     
	// will run if 'create product' form was submitted
	$(document).on('submit', '#update-product-form', function()
	{ 
		// get form data
		var form_data = JSON.stringify($(this).serializeObject());
		//console.log(form_data);
		// submit form data to api
		$.ajax({
			url: "http://localhost:82/api/v1/clienti",
			type : "PUT",
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