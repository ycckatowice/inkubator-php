<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link href="asset/css/styles.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading"><b> Chat </b> <small>online</small></div>
            <div class="panel-body" id="messages" >

            </div>
            <div class="input-group">
                <input id="message" class="form-control width100">
                <span class="input-group-btn">
                    <button id="send" class="btn btn-info">Send</button>
                </span>
            </div>
        </div>
    </div>
</div>

<script>
   $(document).ready(function (){
        
        var $messages = $("#messages");

       function getMessages(){
            $.ajax({
               url:"api/messages.php",
                dataType: "json",
                method: "GET",
               success: function(data){
                   
                   $.each(data, function(key, message){
                                console.log(message);
                       $messages.append('<div class="clearfix"><blockquote class="you pull-left">'+ message.content +'</blockquote></div>' );
                            });

                }
            });
        }

        getMessages();

        var clickCounter = 0;
        var $send = $("#send");

        function onClickSend(){
            clickCounter++;
            console.log("click: ", clickCounter);
        }

        send.click(onClickSend);

    });

    // w czystym javascripcie
    // 
    // document.addEventListener("DOMContentLoaded", function(){
    //     console.log("cos");
    // });
    // 
    // a w jQuery ($):
    //
    // $(document).ready(function(){
    //   console.log("cos");
    // });
    // 
    // albo jeszcze krócej:
    //
    // $(function(){
    //   console.log("cos");
    // });
    //
</script>

<?php


$moja = function ($moja = null){
    $args = func_get_args();
    echo "argumenty funkcji";
    var_dump($args);
};

//moja("ja", "nsadnasd", "1", 2, 3, 4, 5,6
var_dump($moja);

$moja();
?>