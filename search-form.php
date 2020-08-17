<html lang="en">
<head>
<meta charset="UTF-8">
<title>Live Search using PHP, MySQL Database and Javascript</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="css/w3.css">
<style type="text/css">
    body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
    .search-box{
        width: 400px;
        position: relative;
        display: inline-block;
        font-size: 24px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
        background: white;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
</style>

</head>
<body>
<center>
  <div class="search-box">
        <input id="search-box1" type="text" autocomplete="on" placeholder="Search databases User..." />
        <div class="result"><br/></div>
    </div>
<br/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    $('#search-box1').keyup(function(){
        var inputVal = $(this).val();
        var final_value = inputVal.toLowerCase();
        var resultDropdown = $(this).siblings(".result");
        if(final_value.length){
            $.post("backend-search2.php", {term: inputVal}, function(data,status){
                var obj = JSON.parse(data);
                console.log(obj.result[0]);
                //$.each(obj, function(index, value){
                    //$.each(value, function(ind, val){
                    //    console.log(val);
                        resultDropdown.html(obj.result[0]);
                    //});
                //});
            });
        }
        else{
            resultDropdown.html("");
        }
    });
});
</script>
</center>
</body>
</html>