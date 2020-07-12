var coll = document.getElementsByClassName("colaps");
var cont = document.getElementsByClassName("content");
var i,j;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    for(j=0; j < cont.length; j++){
      if((cont[j].style.maxHeight)){
        cont[j].style.maxHeight = null;
      }
    }
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}