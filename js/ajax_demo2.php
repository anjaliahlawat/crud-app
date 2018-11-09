<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
            /* 
            $("button").click(function(){
                $.get("text.txt",function(data, status) {
                    $("#test").html(data);
                    alert(status); // status tells us if the action is a success or not
                })
            });
		});*/
        $(document).keyup(function(){
        	var name = $("input").val();
        	$.post("test1.php",{
        		suggestion:name
        	},function(data, status){
               $("#test").html(data);
        	});
        });
    });
	</script>
</head>
<body>
   <input type="text" name="name">
   <p id="test"></p>
</body>
</html>