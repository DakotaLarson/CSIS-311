<!DOCTYPE html>
<head>
<title>Example Title</title>
<style>
p{
font-family:Verdana;
font-size: 30px;
}
body{
text-align:center;
}
.red{
color: red;
}
.blue{
color: blue;
}
</style>
</head>
<body>
	<h2>Hello There</h2>
	<?php
	for($i=0; $i<10; $i++):
	if($i%2 == 0):?>
		<p class=red><?php echo 'Hello again';?></p>
	<?php else:?>
		<p class=blue><?php echo 'Hello again';?></p>
	<?php endif;?>
	<?php endfor; ?>
</body>