var counter = 1;

function dragstart_handler(ev) {
  ev.dataTransfer.setData("class_name", ev.target.className);
  ev.dataTransfer.setData("id", ev.target.id); // Add the id of dragged source element (target) to the drag data payload
  ev.effectAllowed = "copy"; // Tell the browser that copy is possible
}

function dragover_handler(ev) {
  ev.preventDefault();
}

function drop_handler(ev) {
  ev.preventDefault();
  var c = ev.dataTransfer.getData("class_name");
  var id = ev.dataTransfer.getData("id");// Get the id of dragged source element (target) from the drag data payload
  // Copy the element only if the source and destination ids are both "copy"
  if (c == "img1" && ev.target.id == "canvas") {
    // *****id condition need to fix to be dynamic
    var nodeCopy = document.getElementById(id).cloneNode(true);
    var string = "newId" + counter;
    nodeCopy.id = string;
    nodeCopy.className = "size50px";
    counter += 1;
    ev.target.appendChild(nodeCopy);
  }
}

function dragend_handler(ev) {
  // Remove all drag data
  ev.dataTransfer.clearData();
}

// ----- code block used to test img ids (children of canvas div) --------------
var dragItem = document.querySelector("#canvas").children;
function myFunction() {
  var txt = "";
  var i;
  for (i = 0; i < dragItem.length; i++) {
    txt = txt + dragItem[i].id + "<br>";
  }
  document.getElementById("demo").innerHTML = txt;
}
// -----------------------------------------------------------------------------

var container = document.querySelector("#canvas"); // set canvas as the space where images can move within
var activeItem = null;
var active = false;

//add 3 event listeners each for mousedown, mouseup, and while mouse is moving
container.addEventListener("mousedown", dragStart, false);
container.addEventListener("mouseup", dragEnd, false);
container.addEventListener("mousemove", drag, false);

container.addEventListener("dblclick", doubleClick, false);
function doubleClick(e) {
  container.removeChild(document.getElementById(e.target.id));
}

// function that is triggered at mousedown
function dragStart(e) {
  if (e.target !== e.currentTarget) { //if target is not identical element as current target
    active = true; // set bool active to true
    activeItem = e.target; // set item we interact with

    if (activeItem !== null) { // if there is an active item
      if (!activeItem.xOffset) { // set xOffset of the item to 0 if not exist
        activeItem.xOffset = 0;
      }
      if (!activeItem.yOffset) { // set yOffset of the item to 0 if not exist
        activeItem.yOffset = 0;
      }
      activeItem.initialX = e.clientX - activeItem.xOffset; //set inital x, y
      activeItem.initialY = e.clientY - activeItem.yOffset;

    }
  }
}

// if there is an active item, set active item's initial x, y to current x, y. Change bool active back to false and clear active item to null
function dragEnd(e) {
  if (activeItem !== null) {
    activeItem.initialX = activeItem.currentX;
    activeItem.initialY = activeItem.currentY;
  }
  active = false;
  activeItem = null;
}

// while drag, set current x, y of the active item to its coordinate on screen. make the x, y offsets equal the current x, y values. 
function drag(e) {
  if (active) {
    activeItem.currentX = e.clientX - activeItem.initialX;
    activeItem.currentY = e.clientY - activeItem.initialY;
    activeItem.xOffset = activeItem.currentX;
    activeItem.yOffset = activeItem.currentY;
    // setTranslate(activeItem.currentX, activeItem.currentY, activeItem);
    activeItem.style.transform = setTranslate(activeItem.currentX, activeItem.currentY);
  }
}

// function setTranslate(xPos, yPos, el) { // transform selected element by x,y pos
//   el.style.transform = "translate3d(" + xPos + "px, " + yPos + "px, 0)";
// }

var setTranslate = (xPos, yPos) => "translate3d(" + xPos + "px, " + yPos + "px, 0)";

function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

// document.getElementById("change_canvas_color").addEventListener("click", function () {
//   // document.getElementById("colorpicker").focus();
//   // document.getElementById("colorpicker").value = "#FFCC00";
//   document.getElementById("colorpicker").click();
// });
var color_picker;
var defaultColor = "#ffffff";
// setup background color selector
window.addEventListener("load", startup, false);
function startup() {
  color_picker = document.querySelector("#colorpicker");
  color_picker.value = defaultColor;
  color_picker.addEventListener("input", updateFirst, false);
  color_picker.select();
}

function updateFirst(event) {
  var canvas = document.querySelector("#canvas");
  if (canvas) {
    canvas.style.backgroundColor = event.target.value;
  }
}

function tryprint() {
  var bcolor = document.getElementById("bcolor");
  bcolor.value = document.getElementById("canvas").style.backgroundColor;
  var c = document.getElementById("canvas").getBoundingClientRect();
  // document.getElementsById("info").value = "ffffff";
  // document.getElementById("info").value = "HEY HEY";
  var imgs_info = document.getElementById("info");
  imgs_info.value = '';

  var select_imgs = document.querySelector("#canvas").children;
  for (var i = 0; i < select_imgs.length; i++) {
    var img_rect = select_imgs[i].getBoundingClientRect();
    imgs_info.value += "filepath" + ":" + select_imgs[i].src + "," + "xpos" + ":" + (img_rect.left - c.left) + ",ypos" + ":" + (img_rect.top - c.top) + ";";

  }
  document.forms["element_form"].submit();
}

//attempt to put js values into input value to submit to db through php
// function myFunction() {
//   var select_imgs = document.querySelector("#canvas").children;
//   var bcolor = document.getElementById("bcolor");
//   bcolor.value = document.getElementById("canvas").style.backgroundColor;
//   var img_src1 = document.getElementById("img_src1");
//   img_src1.value = select_imgs[0].id;
//   document.getElementById("showinfo").innerHTML = select_imgs[0].id
// }
//https://www.w3schools.com/code/tryit.asp?filename=G34YJVIXXWD4
//https://stackoverflow.com/questions/623172/how-to-get-image-size-height-width-using-javascript
