var obj, dbParam, xmlhttp;

xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		var myObj = JSON.parse(this.responseText,true)
			//	myObj.collegeName=<?php echo "'$collegeName'"; ?>;

			//fill the fields in the forms. if fields are not present make it as hidden fields to avoid data loss
			for(var propt in myObj){

				if (document.getElementById(propt)) {

					document.getElementById(propt).value = myObj[propt];	
				}
			}	    	  
	}
};



$(window).load(function(){

		var admno=<?php if (isset($_GET['admissionno'])) {echo $_GET['admissionno'];}else { echo "''";}?>;
		var querystring="";
		if (admno != '') {
		document.getElementById("admno").readOnly=true;
		dbParam=admno;	
		document.getElementById("admno").value=dbParam;
		querystring="dataretrieve.php?admissionno=" + dbParam;	    	
		}
		else {
		querystring="dataretrieve.php";
		}
		xmlhttp.open("GET", querystring, true);
		xmlhttp.send();    



		});
$(document).ready(function(){

		$('.sidebar-menu').tree();	
		$flag=1;
		$("input").focusout(function(){
				if($(this).val()=='' && $(this).attr('data-validation') == 'required'){
				$(this).css("border-color", "#FF0000");
				$('#submit').attr('disabled',true);
				$("#error_msg").text("* You have to enter your !");
				}
				else
				{
				$(this).css("border-color", "#2eb82e");
				$('#submit').attr('disabled',false);
				$("#error_msg").text("");
				if($(this).attr('name') == 'admno')
				{
				document.getElementById("admno").readOnly=true;
				dbParam=document.getElementById("admno").value;
				document.getElementById("admno").value=dbParam;
				xmlhttp.open("GET", "dataretrieve.php?admissionno=" + dbParam, true);
				xmlhttp.send();
				}

				}
		});

		$("#reset").click(function(){
				document.getElementById("admno").readOnly=false;
				});
});


