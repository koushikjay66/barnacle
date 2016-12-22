<!DOCTYPE html>
<html>
<head>
	<title> Editor</title>
	<script type="text/javascript" src="tinymce/tinymce.min.js" ></script>
	<script type="text/javascript">
		tinymce.init({
	selector: "div#test",
	theme: "modern",
	plugins: [
		"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
		"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		"save table contextmenu directionality template paste textcolor colorpicker imagetools codesample"
	],
	image_caption: true,
	add_unload_trigger: false,
	content_css: 'css/preview.content.css',
	toolbar: "insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor table | codesample save",
	codesample_languages: [
        {text: 'HTML/XML', value: 'markup'},
        {text: 'JavaScript', value: 'javascript'},
        {text: 'CSS', value: 'css'},
        {text: 'PHP', value: 'php'},
        {text: 'Ruby', value: 'ruby'},
        {text: 'Python', value: 'python'},
        {text: 'Java', value: 'java'},
        {text: 'C', value: 'c'},
        {text: 'C#', value: 'csharp'},
        {text: 'C++', value: 'cpp'}
    ],

});
	</script>
</head>
<body>
	
	<form method="POST" action="tofile.php">
	<div id="test">
		<?php
			
			$homepage = file_get_contents('server/file.txt');
			echo $homepage;

		?>
	</div>
	<button name="submitbtn" >POST</button>
	</form>
</body>
</html>