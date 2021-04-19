var cardButton = document.getElementById("newReview");
cardButton.onclick = function() {
document.getElementById("newCard").innerHTML = '<div id="newCard"><div class="card mt-4"><img class="card-img" src="https://alphasys.com.au/wp-content/themes/corporate-theme/images/placeholder.png" alt=""><div class="card-body"><form id="newGame" action="../Control/ControlGameInsert.php" method="POST"><div class="form-inputs"><input type="text" class="form-control" name="title" placeholder="Title"><br /><input type="text" class="form-control" name="rating" placeholder="Rating"><br /><input type="text" class="form-control" name="picture" placeholder="Image Link"><br /></div><div class="form-desc"><textarea class="form-control" name="description" placeholder="Description" id="descBox"></textarea><br /></div><div class="form-buttons"><button type="submit" class="formButtons" id="formSubmit">Submit</button><button type="button" class="formButtons" id="cancelSubmit">Cancel</button></div></form></div></div></div>';
    console.log("I am here")
    var cancelButton = document.getElementById("cancelSubmit");
    cancelButton.onclick = function() {
        document.getElementById("newCard").innerHTML = "";
    }
}

var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
      //console.log("o am here");
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}

