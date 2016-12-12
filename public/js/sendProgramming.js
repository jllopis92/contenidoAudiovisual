var j = jQuery.noConflict();
j(document).ready(function(e) {
			var options = {
			  valueNames: [ 'name', 'duration' ],
			  page: 5,
			  plugins: [
			      ListPagination({})
			    ]
			};
			var moviesList = new List('movies', options);
		});

var j = jQuery.noConflict();
j("#registro").click(function(){
	var name = j("#name").val();
	var url = j("#url").val();
	alert("envio "+name+", "+url);

	var route = "/test";
	var token = j("#token").val();

	var bar = j('.bar');
	var percent = j('.percent');
	var status = j('#status');

	j.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{name: name, url:url},

		beforeSend: function() {
			status.empty();
			var percentVal = '0%';
			bar.width(percentVal);
			percent.html(percentVal);
		},
		uploadProgress: function(event, position, total, percentComplete) {
			var percentVal = percentComplete + '%';
			bar.width(percentVal);
			percent.html(percentVal);
		},
		complete: function(xhr) {
			status.html(xhr.responseText);
		}
	});
});