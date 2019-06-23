window.onload = function(){
       
    //Hides #fibDiv
    $('#hidepop').click(function(){
        $('#fibDiv').hide();
    })

    //Shows #fibDiv
    $('#showpop').click(function(){
        $('#fibDiv').show();
    })

    //At #btn click calls ajaxSend()
    $(document).ready(function(){
       $('#btn').click(function(){
        var dt = { fibInput: $('#fibInput').val() } //Here we sent only Index 
        ajaxSend(dt);                               //to see if DB has one
       });
    });
}

//Uses to send POST request to fiboWrite.php
function ajaxSend(dt){
    //fiboText = fibo($('#fibInput').val()); //Input data 5, 8, 15 etc
    fiboIndex = $('#fibInput').val(); //Fibonacci seqns at given pos

    $.ajax({
        url: "fiboWrite.php",
        method: "post",
        data: dt,
        success: function(res){
            //signal uses to determine if there are no such key => value in DB
            /*if (res == "signal"){
                var newdt = {
                    fibInput: fiboIndex, //Here we sent index with value to add to db
                    fibAns:  fiboText 
                }
                ajaxSend(newdt); //Recursive call of method to add new item to db
            }else{
                $str = "F(" + fiboIndex + ") = " + fiboText; 
                $('#output').text($str);
            }*/
            alert(res);
            $str = "F(" + fiboIndex + ") = " + res; 
            $('#output').text($str);
        }
    })
}



function fibo(num){
    var n1 = 1;
    var n2 = 1;
    var result = 0;
    for (var i = 2; i <= num; i++){
        result = n1 + n2;
        n1 = n2;
        n2 = result;
    }
    return result; 
}





