<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>toggleClass demo</title>
  <style>
  p {
    margin: 4px;
    font-size: 16px;
    font-weight: bolder;
    cursor: pointer;
  }
  .blue {
    color: blue;
  }
  .highlight {
    background: yellow;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
 
<p class="blue">Click to toggle</p>
<p class="blue highlight">highlight</p>
<p class="blue">on these</p>
<p class="blue">paragraphs</p>
 
<script>
$( "p" ).click(function() {
  $( this ).toggleClass( "highlight" );
});
</script>
 
</body>
</html