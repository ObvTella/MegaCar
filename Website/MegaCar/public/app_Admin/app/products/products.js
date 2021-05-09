// product list html
function readProductsTemplate(data, keywords){
 
    var read_products_html=`
        <!-- search products form -->
        <form id='search-product-form' action='#' method='post'>
        <div class='input-group pull-left w-30-pct'>
 
            <input type='text' value='` + keywords + `' name='keywords' class='form-control product-search-keywords' placeholder='Cerca...' />
 
            <span class='input-group-btn'>
                <button type='submit' class='btn btn-default' type='button'>
                    <span class='glyphicon glyphicon-search'></span>
                </button>
            </span>
 
        </div>
        </form>
 
        <!-- when clicked, it will load the create product form -->
        <div id='create-product' class='btn btn-primary pull-right m-b-15px create-product-button'>
            <span class='glyphicon glyphicon-plus'></span> Aggiungi
        </div>
 
        <!-- start table -->
        <table class='table table-bordered table-hover'>
 
            <!-- creating our table heading -->
            <tr>
                <th class='w-15-pct text-align-center'>Username</th>
				<th class='w-15-pct text-align-center'>Password</th>
                <th class='w-30-pct'></th>
            </tr>`;
 
 
    // loop through returned list of data
    $.each(data, function(key, val) {
 
        // creating new table row per record
        read_products_html+=`<tr>
 
            <td class ='text-align-center'>` + val.username + `</td>
			<td class ='text-align-center'>` + val.password + `</td>
 
            <!-- 'action' buttons -->
            <td class ='text-align-center'>
                <!-- read product button -->
                <button class='btn btn-primary m-r-10px read-one-product-button' data-id='` + val.username + `'>
                    <span class='glyphicon glyphicon-eye-open'></span> Read
                </button>
 
                <!-- edit button -->
                <button class='btn btn-info m-r-10px update-product-button' data-id='` + val.username + `'>
                    <span class='glyphicon glyphicon-edit'></span> Edit
                </button>
 
                <!-- delete button -->
                <button class='btn btn-danger delete-product-button' data-id='` + val.username + `'>
                    <span class='glyphicon glyphicon-remove'></span> Delete
                </button>
            </td>
        </tr>`;
    });
 
    // end table
    read_products_html+=`</table>`;
 
    // inject to 'page-content' of our app
    $("#page-content").html(read_products_html);
}