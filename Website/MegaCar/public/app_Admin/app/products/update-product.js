$(document).ready(function(){
 
    // show html form when 'update product' button was clicked
    $(document).on('click', '.update-product-button', function(){
        // get product id
		var id = $(this).attr('data-id');
		// read one record based on given product id
		$.getJSON("http://localhost/esempiTW/REST/api/product/read_one.php?id=" + id, function(data){
			// values will be used to fill out our form
			var name = data.name;
			var price = data.price;
			var description = data.description;
			var category_id = data.category_id;
			var category_name = data.category_name;
     
			// store 'update product' html to this variable
			var update_product_html=`
				<div id='read-products' class='btn btn-primary pull-right m-b-15px read-products-button'>
					<span class='glyphicon glyphicon-list'></span> Read Products
				</div>
			<!-- build 'update product' html form -->
			<!-- we used the 'required' html5 property to prevent empty fields -->
			<form id='update-product-form' action='#' method='post' border='0'>
				<table class='table table-hover table-responsive table-bordered'>
 
					<!-- name field -->
					<tr>
						<td>Name</td>
						<td><input value=\"` + name + `\" type='text' name='nome' class='form-control' required /></td>
					</tr>
 
					<!-- price field -->
					<tr>
						<td>Price</td>
						<td><input value=\"` + price + `\" type='number' min='1' name='prezzo' class='form-control' required /></td>
					</tr>
 
					<!-- description field -->
					<tr>
						<td>Description</td>
						<td><textarea name='descrizione' class='form-control' required>` + description + `</textarea></td>
					</tr>
 
				<!-- category id field *NB* PER NOI LA CATEGORIA NON E' UN MENU (CI MANCA l'API PER AVERE LA LISTA DELLE CATEGORIE !!! -->
					<tr>
						<td>Category ID</td>
						<td><input value=\"` + category_id + `\" type='number' name='cat_id' class='form-control' required /></td>
					</tr>
 
					<tr>
 
						<!-- hidden 'product id' to identify which record to delete -->
						<td><input value=\"` + id + `\" name='id' type='hidden' /></td>

						<!-- button to submit form -->
						<td>
							<button type='submit' class='btn btn-info'>
								<span class='glyphicon glyphicon-edit'></span> Update Product
							</button>
						</td>

					</tr>
 
				</table>
			</form>`;				

			// inject to 'page-content' of our app
			$("#page-content").html(update_product_html);
 
			// chage page title
			changePageTitle("Update Product");				
		});
		
    });
     
	// will run if 'create product' form was submitted
	$(document).on('submit', '#update-product-form', function(){
     
		// get form data
		var form_data=JSON.stringify($(this).serializeObject());
		//console.log(form_data);
		// submit form data to api
		$.ajax({
			url: "http://localhost/esempiTW/REST/api/product/update.php",
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
			}
		});
		return false;
	});
});