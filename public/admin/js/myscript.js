$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true
    });
});

$("div.alert").delay(3000).slideUp();

function comfirmDelete (msg){
	if (window.confirm(msg)){
		return true;
	}
	return false;
}

// $(document).ready(function(){
// 	$('#addimg').click(function(){
// 		$('#insertImg').append('<div class="form-group"><input type="file" name="fImagesDetail[]"></div>');
// 	});
// });
function addImgDetail(){
	$('#insertImg').append('<div class="form-group"><input type="file" name="ImagesDetail[]"></div>');
}

$(document).ready(function(){
	$('a#delete_img').on('click',function(){
		var url = 'http://lara.com/admin/product/imgDelete/';
		var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
		var src_img = $(this).parent().find("img").attr("src");
		var idHinh = $(this).parent().find("img").attr("idHinh");
		$.ajax({
			url : url + idHinh,
			type : 'GET',
			cache : false,
			data : {"_token":_token,"idHinh":idHinh,"urlHinh":src_img},
			success : function(data){
				if(data == "done"){
					$("#"+idHinh).remove();
				}else{
					alert("Erorr");
				}
			}
		});
	});
});