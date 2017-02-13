<?php
	function xoadautv($ten)
	{ 
	 	$ten = str_replace(" ", "-", str_replace(".","-",$ten)); 
	 	$ten = str_replace("@", "a", str_replace("!","i",$ten)); 
	 	$ten = str_replace("+", "cong", str_replace("&","va",$ten)); 
	 	$ten = str_replace("(", "", str_replace(")","",$ten)); 
	 	$ten = str_replace("^", "", str_replace("#","",$ten)); 
	 	$ten = str_replace("*", "", str_replace("|","",$ten)); 
	 	$ten = str_replace("=", "", str_replace("~","",$ten)); 
	 	$ten = str_replace("/", "-", str_replace("\\","-",$ten)); 
	 	$ten = str_replace("--", "-",$ten); 
	 	$ten = str_replace("--", "-",$ten); 
	 	$ten = str_replace("%", "",$ten);
	 	$ten = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $ten); 
	 	$ten = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $ten); 
	 	$ten = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $ten); 
	 	$ten = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $ten); 
	 	$ten = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $ten); 
	 	$ten = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $ten); 
	 	$ten = preg_replace("/(đ)/", 'd', $ten); 
	 	$ten = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $ten); 
	 	$ten = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $ten); 
	 	$ten = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $ten); 
	 	$ten = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $ten); 
	 	$ten = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $ten); 
	 	$ten = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $ten); 
	 	$ten = preg_replace("/(Đ)/", 'D', $ten); 
	 	$ten = mb_strtolower($ten,'utf8'); 
	 	return $ten; 
	}
	function filterAlias($value){
		$unicode = array(
			'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
			'd'=>'đ',
			'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
			'i'=>'í|ì|ỉ|ĩ|ị',
			'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
			'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
			'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
			'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
			'D'=>'Đ',
			'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
			'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
			'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
			'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
			'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
			'' =>'\+|\:|\/|\.|\*|\,',
		);
		// Chuyển thành chữ thường
		$value = strtolower($value);
		// Lọc dấu
		foreach ($unicode as $replaceCharacter => $character){
		$value = preg_replace('#('.$character.')#i', $replaceCharacter, $value);
		}
		// Lọc khoảng trắng
		$value = trim($value);
		$value = preg_replace('#(\s)+#', ' ', $value);
		// Lọc dấu: nhiều dấu - => 1 dấu -
		$value = str_replace(' ', '-', $value);
		$value = preg_replace('#(-)+#', '-', $value);
		return $value;
	}
	function cate_parent($data , $parent_id = 0 , $str = '--' , $select = 0){
		foreach($data as $val){	
			$id = $val['id'];
			$name = $val['name_cate'];
			if($val['parent_id_cate'] == $parent_id){
				if ($select != 0 && $id == $select) {
					echo "<option value='$id' selected='selected'>$str $name</option>";
				}else{
					echo "<option value='$id'>$str $name</option>";
				}
				cate_parent($data , $id , $str.' --' , $select);
			}

		}
	}	

?>