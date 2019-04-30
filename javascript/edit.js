function news() {
  // var ctime = document.getElementByName("ctime");
  // ctime.value = new Date().toISOString().slice(0, 19).replace('T', ' ');
  var filled = true;
  document.getElementById("ctime").value = new Date().toISOString().slice(0, 19).replace('T', ' ');
  var elements = document.getElementById("new_stationery").elements;
  for (var i = 0, element; element = elements[i++];) {
    if (element.value === "") {
      filled = false;
      if (element.getAttribute("name") == "sname")
        alert("Stationery Name is not filled");
      if (element.getAttribute("name") == "tag")
        alert("Tag is not filled");
    }
  }
  if (filled == true)
    document.forms["new_stationery"].submit();
}