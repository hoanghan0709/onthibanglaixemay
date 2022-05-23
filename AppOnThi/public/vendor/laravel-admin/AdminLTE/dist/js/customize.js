
$(document).bind('ready', initFunction);

function initFunction(){
    $(".grid-create-btn").remove();
   // var txt3 = document.createElement("p");  // Create with DOM
 // txt3.innerHTML = "Text.";
 var txt2 = $(".box-header")
 .append('<button onClick="addCHtoBT()" style="margin-right: 10px;background-color: green;color: white;" class="btn-group pull-right grid-create-btn">add cau hoi</button>');   // Create with jQuery
  //var txt3 = $(".box-header").("Button");
  //txt3.innerHTML("Add vaof bai thi");
}

function addCHtoBT(){
    alert("sssss");
   
}