$(document).ready(function(){
 
    // handle 'read one' button click
    $(document).on('click', '.read-one-product-button', function(){
        // get product id
		var id = $(this).attr('data-id');
		// read product record based on given ID
		$.getJSON("http://localhost:82/api/v1/clienti/" + id, function(data){
			// start html
			var read_one_product_html=`
			<!-- when clicked, it will show the product's list -->
			<div id='read-products' class='btn btn-primary pull-right m-b-15px read-products-button'>
				<span class='glyphicon glyphicon-list'></span> Lista clienti
			</div>
			<!-- product data will be shown in this table -->
			<table class='table table-bordered table-hover'>

				<!-- product id -->
				<tr>
					<td>ID</td>
					<td>` + data.id + `</td>
				</tr>

				<!-- product username -->
				<tr>
					<td class='w-30-pct'>Username</td>
					<td class='w-70-pct'>` + data.username + `</td>
				</tr>
 
				<!-- product password -->
				<tr>
					<td>Password</td>
					<td>` + data.password + `</td>
				</tr>
 
				<!-- product nome -->
				<tr>
					<td>Nome</td>
					<td>` + data.nome_cliente + `</td>
				</tr>
 
				<!-- product congome -->
				<tr>
					<td>Cognome</td>
					<td>` + data.cognome_cliente + `</td>
				</tr>
				
				<!-- product email -->
				<tr>
					<td>Email</td>
					<td>` + data.email_cliente + `</td>
				</tr>
				
				<!-- product indirizzo -->
				<tr>
					<td>Indirizzo</td>
					<td>` + data.indirizzo + `</td>
				</tr>
				
				<!-- product created at -->
				<tr>
					<td>Creato il:</td>
					<td>` + data.created_at + `</td>
				</tr>
 
			</table>`;
			
			// inject html to 'page-content' of our app
			$("#page-content").html(read_one_product_html);
 
			// chage page title
			changePageTitle("Dettaglio cliente");	
		});		
    });
});