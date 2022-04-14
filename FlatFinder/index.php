<!DOCTYPE html>
<html>
<head>
    <title>SearchRPO</title>
    <link rel="stylesheet" href ="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/consultant.css">
</head>
<body>
<div class="topnav">
  <a class="active" href="consultant.php">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
</div>

    <div class ="container" style="max-width: 50%;">

        <div class="text-center mt-5 mb-4">
            <h2>RPO Search Bar</h2>
    </div>

    <input type="text" class="form-control" id ="live_search" autocomplete="off" placeholder="Search...">
    </div>
    <div id ="searchresult"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#live_search").keyup(function(){
                var input = $(this).val();
        

                if(input != ""){
                    $.ajax({

                        url:"searchRPO.php",
                        method:"POST",
                        data:{input:input},

                        success:function(data){
                            $("#searchresult").html(data);
                            $("#searchresult").css("display","block");
                        }
                    });
                }else {
                    $("#searchresult").css("display", "none");
                }
            });
        });
    </script>
</body>
</html>