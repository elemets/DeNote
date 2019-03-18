function register(){
  var pass = true,
      message = "";

   // CHECKS
  if ($('#name').val() == "") {
    message += "Please enter your name." + "\n";
    pass = false;
  }
  if ($('#email').val() == "") {
    message += "Please enter your email." + "\n";
    pass = false;
  }
  if ($('#password').val() == "") {
    message += "Please enter your password." + "\n";
    pass = false;
  }

  // PROCESS AJAX OR SHOW ERROR MESSAGE
  if (pass) {
    $.ajax({
      url : "ajax-register.php",
      method : "POST",
      dataType: 'JSON',
      data : {
        name : $('#name').val(),
        email : $('#email').val(),
        password : $('#password').val(),
        year : $('#year').val(),
      }
    }).done(function(res){
      if (res['status']) {
        // REGISTER OK - REDIRECT
        window.location.href = "2-more.html";
      } else {
        // REGISTER FAIL
        alert(res['message']);
      }
    });
  } else {
    alert(message);
  }
  return false;
}
