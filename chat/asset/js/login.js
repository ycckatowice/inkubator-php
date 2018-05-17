$(function(){
   var $loginForm = $("#login-form");
   var $logoutButton = $("#logout");
   var $loggedUser = $("#logged-user");
    
//  console.log($loginForm, $lougoutButton, $loggedUser);
  // funkcja logoutAction, parametr event
  function logoutAction(event){
      event.preventDefault();
      
      $loginForm.css({
                 "display": "inline-block"
             });
             // add single css instruction at once
             $logoutButton.css("display", "none");
             $loggedUser.html('');
  }
  // 
  // funkcja processLoginSession
  
  function processLoginSession(){
      if(localStorage.user){
        var user = JSON.parse(localStorage.user);
        prepareLoggedInUserView(user);
        
        }
  }
  function prepareLoggedInUserView(user){
    $loginForm.css({
               "display": "none"
           });
    $logoutButton.css("display", "inline-block");
    $loggedUser.html(
            user.first_name + ' '
            + user.last_name + ' ('
            + user.email + ')'
            );
    }
  
  
  //funkcja loginAction , parametr event
  function loginAction(event){
      
      event.preventDefault();
      
      var data = $loginForm.serialize();
      
      console.log("submit", data);
      // url
      // data
      // dataType
      // method
      // success
      //
      
      $.ajax({
         url: "api/login.php",
         method: "POST",
         data: data,
         dataType: "json",
         success: function(response){
             $loginForm[0].reset();         
             localStorage.user = JSON.stringify(response.user);
             prepareLoggedInUserView(response.user);
            
         },
         error: function(response){
             console.log(response);
             alert(response.responseJSON.message);
         }
      });
  }
  
  $loginForm.submit(loginAction);
  $logoutButton.click(logoutAction);
  processLoginSession();
});