let e = document.querySelector("#ed");
e.addEventListener("mousedown", function (e) {
  alert(this.offsetLeft);
});
e.addEventListener("mousemove", function (event) {
  alert(this.offsetLeft);
});
