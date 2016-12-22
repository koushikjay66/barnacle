<!DOCTYPE html>
<html>
<head>
	<title>Text Editor</title>
	<script type="text/javascript" src="tinymce/tinymce.min.js" ></script>
	<script type="text/javascript">
		tinymce.init({
	selector: "div#test", // To get the editor
	// text editor plugins
	plugins: [
		" advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
		"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		"save table contextmenu directionality template paste textcolor colorpicker imagetools codesample jbimages "
	],
	image_caption: true,	// image caption
	// toolbar options
	toolbar: "insertfile undo redo | styleselect fontselect fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link media jbimages | print preview | forecolor backcolor table | codesample save",
	// codesample options
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
	
	<form id="my_form" method="POST" action="tofile.php" target="form_target" enctype="multipart/form-data">
	<div id="test"></div>
	<button name="submitbtn" >POST</button>
	
	</form>
</body>
</html>