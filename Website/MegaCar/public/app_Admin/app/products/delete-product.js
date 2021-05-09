$(document).ready(function(){
 
    // will run if the delete button was clicked
    $(document).on('click', '.delete-product-button', function(){
        // get the product id
		var username = $(this).attr('data-id');
		
		// This is where we will use the Bootbox.js library for good looking 'confirm pop up'
		bootbox.confirm({
			message: "<h4>Sicuro di voler cancellare questo utente?</h4>",
			buttons: {
				confirm: {
					label: '<span class="glyphicon glyphicon-ok"></span> Yes',
					className: 'btn-danger'
				},
				cancel: {
					label: '<span class="glyphicon glyphicon-remove"></span> No',
					className: 'btn-primary'
				}
			},
			callback: function (result) {
				if(result==true){
					// send delete request to api / remote server
					$.ajax({
						url: "http://localhost:82/api/v1/clienti/" + username,
						type : "DELETE",
						success : function(result) {
							// re-load list of products
							showProducts();
						},
						error: function(xhr, resp, text) {
							console.log(xhr, resp, text);
						}
					});
				}
			}
		});
    });
});