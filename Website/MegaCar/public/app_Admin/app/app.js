$(document).ready(function(){

// home html template
    var app_html = "<div class='container'>";
	app_html += "<div class='page-header'>";
	app_html += "<h1 id='page-title'>Read Products</h1>";
	app_html += "</div>";
	app_html += "<!-- content here -->";
	app_html += "<div id='page-content'></div>";
	app_html += "</div>";

    // inject to 'app' element (in index.html)
    $("#app").html(app_html);

});
 
// change page title
function changePageTitle(page_title){
    $('#page-title').text(page_title); // page title
    document.title=page_title; // window title
}
 
// function to make form values to json format
$.fn.serializeObject = function() {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};