<html>
    <?php 
    include_once 'constant.php';
?>
<script>
    <?php
    
    $send=array('');
$json_catch=apicall('general.svc/statecity',$send);
$display= $json_catch['statecity_psResult']['UVA_StateCity_List'];
    ?>
var countryStateInfo =<?php echo json_encode($json_catch); ?>
    
window.onload = function () {
setTimeout(function() { alert(countryStateInfo); }, 3000);
	//Get html elements
	var countySel = document.getElementById("countySel");
	var stateSel = document.getElementById("stateSel");	
	var citySel = document.getElementById("citySel");
	var zipSel = document.getElementById("zipSel");
	
	//Load countries
	for (var country in countryStateInfo['statecity_psResult']['UVA_StateCity_List']) {
		countySel.options[countySel.options.length] = new Option(country, country);
	}
	
	//County Changed
	countySel.onchange = function () {
		 
		 stateSel.length = 1; // remove all options bar first
		 citySel.length = 1; // remove all options bar first
		 zipSel.length = 1; // remove all options bar first
		 
		 if (this.selectedIndex < 1)
			 return; // done
		 
		 for (var state in countryStateInfo[this.value]) {
			 stateSel.options[stateSel.options.length] = new Option(state, state);
		 }
	}
	
	//State Changed
	stateSel.onchange = function () {		 
		 
		 citySel.length = 1; // remove all options bar first
		 zipSel.length = 1; // remove all options bar first
		 
		 if (this.selectedIndex < 1)
			 return; // done
		 
		 for (var city in countryStateInfo[countySel.value][this.value]) {
			 citySel.options[citySel.options.length] = new Option(city, city);
		 }
	}
	
	//City Changed
	citySel.onchange = function () {
		zipSel.length = 1; // remove all options bar first
		
		if (this.selectedIndex < 1)
			return; // done
		
		var zips = countryStateInfo[countySel.value][stateSel.value][this.value];
		for (var i = 0; i < zips.length; i++) {
			zipSel.options[zipSel.options.length] = new Option(zips[i], zips[i]);
		}
	}	
}
    
</script>
<form name="myform" id="myForm">
  <select id="countySel" size="1">
        <option value="" selected="selected">-- Select Country --</option>
    </select>
     <br>
    <br>
  
    <select id="stateSel" size="1">
        <option value="" selected="selected">-- Select State--</option>
    </select>
    <br>
    <br>    
    <select id="citySel" size="1">
        <option value="" selected="selected">-- Select City--</option>
    </select>
    <br>
    <br>
    <select id="zipSel" size="1">
        <option value="" selected="selected">-- Select Zip--</option>
    </select>
</form>


</html>