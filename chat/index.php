<?php require_once __DIR__. '/partial_view/navigation.php'; ?>
<script>
 var userId = <?= isset($_GET['id'])? $_GET['id'] : 1 ?> ;
</script>


<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script src="asset/js/login.js" ></script>
<link href="asset/css/styles.css" rel="stylesheet">
<link href="asset/css/navigation.css" rel="stylesheet">

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
        console.log($message);
        var $send = $("#send");
        var $message = $("#message");
        
        var clickCounter = 0;
        var messagesList = [];
        
       function getMessages(){
            $.ajax({
                url:"api/messages.php",
                dataType: "json",
                method: "GET",
                success: function(data){
                   var newMessages = [];
                   
                   if(messagesList.length < data.length){
                        newMessages = data.slice(messagesList.length);
                        messagesList = data;
                   }
                   
                   $.each(newMessages, function(key, message){
                       
                       var classNames = message.user_id == userId? "me pull-left": "you pull-right";
                       $messages.append(
                               '<div class="clearfix"><blockquote class="' + classNames + '">'
                               + message.content 
                               +'</blockquote></div>' 
                        );
                    });
                    console.log($messages, $messages.height());
                    $messages.scrollTop($messages[0].scrollHeight)

                }
            });
            return 1;
        }
        // Powtarza wykonywanie getMessages co 1 sek
        setInterval(getMessages, 1000);


        function onClickSend(event){
           console.log(event);
           event.preventDefault();
            var message = $message.val();
            console.log("Wartość w inpucie: ", message);
            
            $.ajax({
                url: "api/messages.php",
                method: "POST",
                dataType: "json",
                headers: {API_TOKEN: 'bdnhpy'},
                data: {
                    content: message,
                    "user_id": userId
                },
                success: function (data){
                    $message.val('');
                }
            })
        }



        $message.keydown(function(event){
          if(event.keyCode == 13){
             console.log($message.val(), event);
             onClickSend(event);
           }

        });
        $send.click(onClickSend);

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


//$moja = function ($moja = null){
//    $args = func_get_args();
//    echo "argumenty funkcji";
//    var_dump($args);
//};
//
////moja("ja", "nsadnasd", "1", 2, 3, 4, 5,6
//var_dump($moja);
//
//$moja(12345, 2, 1234, 345, 546, 765,345);
?>