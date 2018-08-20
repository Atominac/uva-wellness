<html>
<head>
    <script src="jquery-3.3.1.min.js"></script>
    <script>
jQuery(document).ready(function($){

$('.live-search-list li').each(function(){
$(this).attr('data-search-term', $(this).text().toLowerCase());
});

$('.live-search-box').on('keyup', function(){
    alert("hy");

var searchTerm = $(this).val().toLowerCase();

    $('.live-search-list li').each(function(){

        if ($(this).filter('[data-search-term *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1) {
            $(this).show();
        } else {
            $(this).hide();
        }

    });

});

});
</script>
</head>
<style>
.live-search-list {
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
padding: 1em;
background-color: #2c3e50;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
font-family: 'Lato', sans-serif;
color: #fff;
}

.live-search-box {
width: 100%;
display: block;
padding: 1em;
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
border: 1px solid #3498db;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
}

.live-search-list li {
color: fff;
list-style: none;
padding: 0;
margin: 5px 0;
}
</style>
    
    
<input type="text" class="live-search-box" placeholder="search here" />

<ul class="live-search-list">
<li>Lorem</li>
<li>ipsum</li>
<li>dolor</li>
<li>sit</li>
<li>amet</li>
</ul>
    
    </html>