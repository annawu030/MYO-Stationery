var counter = 1;

function dragstart_handler(ev) {
  ev.dataTransfer.setData("text", ev.target.id); // Add the id of dragged source element (target) to the drag data payload
  ev.effectAllowed = "copy"; // Tell the browser that copy is possible
}

function dragover_handler(ev) {
  ev.preventDefault();
}

function drop_handler(ev) {
  ev.preventDefault();
  var id = ev.dataTransfer.getData("text"); // Get the id of dragged source element (target) from the drag data payload
  // Copy the element only if the source and destination ids are both "copy"
  if (id == "img1" && ev.target.id == "canvas") {
    // *****id condition need to fix to be dynamic
    var nodeCopy = document.getElementById(id).cloneNode(true);
    var string = "newId"; //+ counter;
    nodeCopy.id = string;
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
    setTranslate(activeItem.currentX, activeItem.currentY, activeItem);
  }
}

function setTranslate(xPos, yPos, el) { // transform selected element by x,y pos
  el.style.transform = "translate3d(" + xPos + "px, " + yPos + "px, 0)";
}

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
