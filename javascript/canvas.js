var nodeCopy = null;
var counter = 1;
function dragstart_handler(ev) {
  console.log("dragStart");
  // Change the source element's background color to signify drag has started
  // ev.currentTarget.style.border = "dashed";
  // Add the id of the drag source element to the drag data payload so
  // it is available when the drop event is fired
  ev.dataTransfer.setData("text", ev.target.id);
  // Tell the browser both copy and move are possible
  ev.effectAllowed = "copy";
}
function dragover_handler(ev) {
  console.log("dragOver");
  // Change the target element's border to signify a drag over event
  // has occurred
  // ev.currentTarget.style.background = "lightblue";
  ev.preventDefault();
}
function drop_handler(ev) {
  console.log("Drop");
  ev.preventDefault();
  // Get the id of drag source element (that was added to the drag data
  // payload by the dragstart event handler)
  var id = ev.dataTransfer.getData("text");
  // Only Move the element if the source and destination ids are both "move"
  //  if (id == "src_move" && ev.target.id == "dest_move")
  //    ev.target.appendChild(document.getElementById(id));
  // Copy the element if the source and destination ids are both "copy"
  if (id == "img1" && ev.target.id == "canvas") {
    nodeCopy = document.getElementById(id).cloneNode(true);
    var string = "newId" + counter;
    nodeCopy.id = string;
    counter += 1;
    ev.target.appendChild(nodeCopy);
  }
}
function dragend_handler(ev) {
  console.log("dragEnd");
  // Restore source's border
  //  ev.target.style.border = "solid black";
  // Remove all of the drag data
  ev.dataTransfer.clearData();
}

var dragItem = document.querySelector("#canvas").children;
var container = document.querySelector("#canvas");

// var c = document.getElementById("design_items").children;
function myFunction() {
  var txt = "";
  var i;
  for (i = 0; i < dragItem.length; i++) {
    txt = txt + dragItem[i].id + "<br>";
  }

  document.getElementById("demo").innerHTML = txt;
}

var active = false;
var currentX;
var currentY;
var initialX;
var initialY;
var xOffset = 0;
var yOffset = 0;

// container.addEventListener("touchstart", dragStart, false);
// container.addEventListener("touchend", dragEnd, false);
// container.addEventListener("touchmove", drag, false);

container.addEventListener("mousedown", dragStart, false);
container.addEventListener("mouseup", dragEnd, false);
container.addEventListener("mousemove", drag, false);

function dragStart(e) {
  // if (e.type === "touchstart") {
  //   initialX = e.touches[0].clientX - xOffset;
  //   initialY = e.touches[0].clientY - yOffset;
  // } else {
  initialX = e.clientX - xOffset;
  initialY = e.clientY - yOffset;
  // }

  if (e.target === dragItem) {
    active = true;
  }
}

function dragEnd(e) {
  initialX = currentX;
  initialY = currentY;

  active = false;
}

function drag(e) {
  if (active) {

    e.preventDefault();

    // if (e.type === "touchmove") {
    //   currentX = e.touches[0].clientX - initialX;
    //   currentY = e.touches[0].clientY - initialY;
    // } else {
    currentX = e.clientX - initialX;
    currentY = e.clientY - initialY;
    // }

    xOffset = currentX;
    yOffset = currentY;

    setTranslate(currentX, currentY, dragItem);
  }
}

function setTranslate(xPos, yPos, el) {
  el.style.transform = "translate3d(" + xPos + "px, " + yPos + "px, 0)";
}

// function allowDrop(ev) {
//   ev.preventDefault();
// }

// function drag(ev) {
//   ev.dataTransfer.setData("text", ev.target.id);
// }

// function drop(ev) {
//   ev.preventDefault();
//   var data = ev.dataTransfer.getData("text");
//   var nodeCopy = document.getElementById(data).cloneNode(true);
//   nodeCopy.id = "newId";
//   ev.target.appendChild(nodeCopy);
// }

// let currentDroppable = null;

// newId.onmousedown = function (event) {

//   let shiftX = event.clientX - newId.getBoundingClientRect().left;
//   let shiftY = event.clientY - newId.getBoundingClientRect().top;

//   newId.style.position = 'absolute';
//   newId.style.zIndex = 1000;
//   document.body.append(newId);

//   moveAt(event.pageX, event.pageY);

//   function moveAt(pageX, pageY) {
//     newId.style.left = pageX - shiftX + 'px';
//     newId.style.top = pageY - shiftY + 'px';
//   }

//   function onMouseMove(event) {
//     moveAt(event.pageX, event.pageY);

//     newId.hidden = true;
//     let elemBelow = document.elementFromPoint(event.clientX, event.clientY);
//     newId.hidden = false;

//     if (!elemBelow) return;

//     let droppableBelow = elemBelow.closest('.droppable');
//     if (currentDroppable != droppableBelow) {
//       if (currentDroppable) { // null when we were not over a droppable before this event
//         leaveDroppable(currentDroppable);
//       }
//       currentDroppable = droppableBelow;
//       if (currentDroppable) { // null if we're not coming over a droppable now
//         // (maybe just left the droppable)
//         enterDroppable(currentDroppable);
//       }
//     }
//   }

//   document.addEventListener('mousemove', onMouseMove);

//   newId.onmouseup = function () {
//     document.removeEventListener('mousemove', onMouseMove);
//     newId.onmouseup = null;
//   };

// };

// newId.ondragstart = function () {
//   return false;
// };