<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link href="asset/css/styles.css" rel="stylesheet">
<div class="container"></div>
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
        console.log("Jestem");
        console.log($(".container"));
        console.log($("div"));
   });
   
   
   $(function(){
       console.log("Jestem też tutaj");
   });
</script>