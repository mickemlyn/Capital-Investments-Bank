<html>
<head>
    <script src="bootstrap-3.3.6-dist/js/jquery-2.2.2.min.js"></script>
    <script>
$(document).ready(
    function(){
        $('input:file').change(
            function(){
                if ($(this).val()) {
                    $('input:submit').attr('disabled',false);
                    // or, as has been pointed out elsewhere:
                    // $('input:submit').removeAttr('disabled'); 
                } 
            }
            );
    });
</script>
</head>
<body>
<form action="#" method="post">
    <input type="file" name="fileInput" id="fileInput" />
    <input type="submit" value="submit" disabled />
</form>
<div id="result"></div>
    </body>
</html>