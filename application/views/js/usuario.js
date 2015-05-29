$(document).ready(function(){
	if($('#mensError').length>0){
		$('#mensError').css({
			border:'1px solid red',
			padding:5,
			marginBottom:10,
			width:'89%',
			marginLeft:'5%'
		});
		
		$('#mensError').find('div').css({
			border:'1px solid red',
			color:'red',
			padding:5
		});
		
		setTimeout(function(){$('#mensError').fadeOut()}, 10000);
	}
	
	$('#confirma')
	.add($('#nuevaContra'))
	.each(function(){
		$(this).bind('keyup', function(){
			 if($('#nuevaContra').val() != "" && $('#confirma').val() != ""){
			 	if(!boolIgualPass()){
					if($('#contra').val() == "")
						$('#guardar').attr("disabled", "disabled");					
					$('#filaMsg').css({visibility:'inherit'});	
				}
				else{
					$('#filaMsg').css({visibility:'hidden'});
					if($('#contra').val() != "")
						$('#guardar').removeAttr("disabled");
				}
			 }
			 else{
			 	$('#filaMsg').css({visibility:'hidden'});
			 }				
		})
		/*$(this).click(function(){
			$('#filaMsg').css({visibility:'hidden'});
		})*/
	});
	
	$('#contra').blur(function(){
		if(!boolIgualPass() && $('#contra').val() != ""){
			$('#guardar').attr("disabled", "disabled");
		}
		else $('#guardar').removeAttr("disabled");
	})
	
});

function boolIgualPass(){
	if($('#nuevaContra').val() == $('#confirma').val() && $('#nuevaContra').val() != "" && $('#confirma').val() != "" )
		return true;
	return false;	
}