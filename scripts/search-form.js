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