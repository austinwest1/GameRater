
<main class ="col-7 col-m-12">
  <section>
    <h1> Register </h1>
  <form name="theForm" onsubmit="return validateForm();"action="Control/ControlUserInsert.php"  method="POST">
      <div class="mb-3">
        <label for="emailhtml" class="form-label">Email address</label>
        <input type="email" class="form-control" id="emailhtml" aria-describedby="emailHelp" name="username" required>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="passwordhtml" class="form-label">Password</label>
        <input type="password" class="form-control" id="passwordhtml" name="password" required>
      </div>
      <div class="mb-3">
        <label for="fnamehtml" class="form-label">First Name</label>
        <input type="text" class="form-control" id="fnamehtml" name="firstName" required>
      </div>
      <div class="mb-3">
        <label for="lnamehtml" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lnamehtml" name="lastName" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </section>
</main>
<?php
if(isset($_SESSION['errorMessage'])){
echo ("<SCRIPT> window.onload =  function(){alert('".$_SESSION['errorMessage']."');} </SCRIPT>");
unset($_SESSION['errorMessage']);
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
</script>
<script>
function validateForm(){
var email = document.forms["theForm"]["username"].value;
var pass = document.forms["theForm"]["password"].value;
var namef = document.forms["theForm"]["firstName"].value;
var namel = document.forms["theForm"]["lastName"].value;

if(email.length >79){
  alert('Email Address is too Long');
  return false;
}
if(namef.length > 19){
  alert('First name is too long');
  return false;
}
if(namel.length > 19){
  alert('Last name is too long');
  return false;
}
if(pass.length < 7){
  alert('Password is too short');
  return false;
}
return true;
}
</script>
