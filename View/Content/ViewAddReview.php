<main class ="col-7 col-m-12">
  <section>
    <h1> New Game Rating </h1>
  <form name="theForm" onsubmit ="return validateForm();" action="Control/ControlGameInsert.php" method="POST">
      <div class="mb-3">
        <label for="gameTitleHtml" class="form-label">Game Name</label>
        <input type="text" class="form-control" id="gameTitleHtml" name="title" required>
      </div>
      <div class="mb-3">
        <label for="ratingHtml" class="form-label">Rating(1-5)</label>
        <select name = "rating" id = "ratingHtml" class = "form-control">
          <option value = 1>1 star</option>
          <option value = 2>2 star</option>
          <option value = 3>3 star</option>
          <option value = 4>4 star</option>
          <option value = 5>5 star</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="descriptionHtml" class="form-label">Review</label>
        <input type="text" class="form-control" id="descriptionHtml" name="description" required>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script>
function validateForm(){
var nameg= document.forms["theForm"]["title"].value;
var desc= document.forms["theForm"]["description"].value;

if (nameg.length > 99){
  alert('Name is too long');
  return false;
}
if(desc.length >255){
  alert('Review is too long');
  return false;
}
return true;
}
</script>
