// $(function(){

// 	var inputs = $(":input:not([type=submit]):not([type=reset]):not([type=hidden])");

// 	$("<span>*</span>").insertBefore(inputs);

// 	inputs.on("blur",function(){
// 		//inside envent handlers, this refers to the DOM object handling the event
// 		checkEmpty($(this));
// 	});


// 	function checkEmpty(input){
// 		//var oField = document.getElementById(sFieldID);
// 		var sValue = input.val();
// 		var bResult = false;

// 		if (sValue.length < 1){
// 			input.prev().html("Please complete this field");
// 			input.prev().addClass("red-font");
// 			input.prev().removeClass("green-font");

// 		}else{
// 			input.prev().html("*");
// 			input.prev().removeClass("red-font");
// 			input.prev().addClass("green-font");
// 			bResult = true;
// 		}
// 		return bResult;
// 	}

// });