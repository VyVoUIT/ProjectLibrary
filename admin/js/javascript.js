function readURL(input,thumbimage) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#thumbimage").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
                $("#thumbimage").show();
            }
            else {
                $("#thumbimage").attr('src', input.value);
                $("#thumbimage").show();
            }
}
function goBack() {
    window.history.back();
}
function ConfirmDelete()
{
  if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
}
$(function () {
                $('#datetimepicker1').datetimepicker();
                $('#datetimepicker2').datetimepicker();
            });
//Kiểm tra validate cho các form
 $(document).ready(function() {
	 //Kiểm tra cho form thêm sản phẩm mới
	 $("#form_themsanpham").validate({
	 rules: {
		 tensanpham: "required",
		 gia: "required",
		 soluong: {
		 required: true,
		 maxlength: 8
		 },
	 },
	 messages: {
		 tensanpham: "Vui lòng nhập tên sản phẩm",
		 gia: "Vui lòng giá",
		 soluong: {
		 required: "Nhập vào số lượng",
		 maxlength: "Số lượng quá dài"
		 },
		},
	 });
 });
 //Kiểm tra validate cho các form
 $(document).ready(function() {
	 //kiêm tra tính hợp lên của mật khẩu/tính năng đổi mật khẩu của user
	 $("#form_doimatkhau #passwordmoi").focusout(function(){
		$("#loipassmoi").html("");
		var html = "";
		var passwordmoi = $(this).val();
		if((passwordmoi.length) < 8){
			html = "Mật khâu phải ít nhất 8 ký tự";
			$("#loipassmoi").append(html);
			$("#doipass").hide();
		}
		else if(passwordmoi.search(/[a-z]/i) == -1){
			html = "Mật khẩu phải có chữ";
			$("#loipassmoi").append(html);
			$("#doipass").hide();
		}
		else{
			$("#doipass").show();
		}
	 });
 //kiểm tra cho form đăng ký thành viên mới
	 $("#themusermoi").validate({
		 rules:{
			username:{
				required : true,
				minlength: 2
			},
			email: "required",
			tenuser:{
				required: true,
				minlength: 2
			},
		 },
		 messages:{
			 username: {
				 required: "Vui lòng nhập username",
				 minlength: "Bạn nhập tên đăng nhập quá ngắn"
			 },
			 email: "Vui lòng nhập email",
			 tenuser:{
				 required: "Vui lòng nhập tên user",
				 minlength: "Tên user quá ngắn"
			 },
		 },
	 });
	 //kiem tra user da ton tai chua khi dang ky user moi
	 $("#themusermoi input#username").focusout(function(){ // Sử dụng event focusout , khi người dùng rời khỏi input cần check thì bđầu gửi request
		$('#loiuser').html('');
		var username = $("input#username").val();
		$.ajax({
        type: 'post',
        dataType: 'json',
        url: 'modules/php/kiemtrauser.php',
        data : {
            username : username,
        },
        success : function (result)
        {
            var html = '';
            // Lấy thông tin lỗi username
            if ($.trim(result.username) != ''){
                html += result.username + '<br/>';
            }
            // Cuối cùng kiểm tra xem có lỗi không
            // Nếu có thì xuất hiện lỗi
            if (html != ''){
                $('#loiuser').append(html);
				$('#themuser').hide();
            }
            else {
                // Thành công
                $('#loiuser').append('Username hợp lệ!');
				$('#themuser').show();
				}
			}
		});
	return false;
	});
	//kiem tra username da ton tai chua khi user sua username
	 $("#suathongtinuser input#username").focusout(function(){ // Sử dụng event focusout , khi người dùng rời khỏi input cần check thì bđầu gửi request
		$('#loiuser').html('');
		var username = $("input#username").val();
		$.ajax({
        type: 'post',
        dataType: 'json',
        url: 'modules/php/kiemtrauser.php',
        data : {
            username : username,
        },
        success : function (result)
        {
            var html = '';
            // Lấy thông tin lỗi username
            if ($.trim(result.username) != ''){
                html += result.username + '<br/>';
            }
            // Cuối cùng kiểm tra xem có lỗi không
            // Nếu có thì xuất hiện lỗi
            if (html != ''){
                $('#loiuser').append(html);
				$('#suauser').hide();
            }
            else {
                // Thành công
                $('#loiuser').append('Username hợp lệ!');
				$('#suauser').show();
				}
			}
		});
	return false;
	});
});
//number format cho phan gia
//Hàm FormatNumber khi đang nhập dữ liệu
function FormatNumber(obj) {
var strvalue;
if (eval(obj))
    strvalue = eval(obj).value;
else
    strvalue = obj; 
var num;
    num = strvalue.toString().replace(/\$|\./g,'');

    if(isNaN(num))
    num = "";
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num*100+0.50000000001);
    num = Math.floor(num/100).toString();
    for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
    num = num.substring(0,num.length-(4*i+3))+'.'+
    num.substring(num.length-(4*i+3));
    //return (((sign)?'':'-') + num);
    eval(obj).value = (((sign)?'':'-') + num);
}
//Hàm FormatNumber khi đã nhập xong cần FormatNumber dữ liệu vừa nhập
function formatCurrency(num) 
 {
    num = num.toString().replace(/\$|\,/g,'');
    if(isNaN(num))
    num = "0";
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num*100+0.50000000001);
    num = Math.floor(num/100).toString();
    for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
    num = num.substring(0,num.length-(4*i+3))+','+
    num.substring(num.length-(4*i+3));
    return (((sign)?'':'-') + num);
}