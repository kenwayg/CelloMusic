function getContent(fragmentId, myCallback) {
  let xhr = new XMLHttpRequest();
  xhr.onload = function () {
    myCallback(xhr.responseText);
  };
  //Fetch the partial html files
  xhr.open("GET", fragmentId + ".php");
  xhr.send();
}

function navigate() {
  const content = document.querySelector("#app");
  fragmentId = location.hash.substr(1);
  //Display current pages content
  getContent(fragmentId, (comp) => {
    content.innerHTML = comp;
    /////PROFILE JS
    if (location.hash == "#profile") {
      var x = document.querySelector(".wr");
      x.onclick = function () {
        alert("ede");
      };
      const prof_image = document.querySelector(".profile_image");
      // btn = document.querySelector(".btn");

      // console.log(prof_image);
      // btn.onclick = function () {
      //   console.log(prof_image.value);
      // };
      //Get the Modal
      const modal = document.querySelector(".modal"),
        //Get the close button
        closeBtn = document.querySelector(".closeBtn"),
        //Get modal content paragraph
        modPara = document.querySelector(".para");

      const modClose = () => {
        modal.style.display = "none";
      };

      closeBtn.addEventListener("click", modClose);
      prof_image.onchange = function () {
        ///DO EPIC SHIT

        const file = prof_image.files[0];

        modal.style.display = "block";
        modPara.innerHTML = `The file you selected is ${file.name}`;
      };

      //Profile header
      const prof_header = document.querySelector(".profile_header");

      //Get the Modal
      const modal2 = document.querySelector(".modal2"),
        //Get the close button
        closeBtn2 = document.querySelector(".closeBtn2"),
        //Get modal content paragraph
        modPara2 = document.querySelector(".para2");
      var x = document.querySelector(".wr");

      const modClose2 = () => {
        modal2.style.display = "none";
      };

      closeBtn.addEventListener("click", modClose2);
      prof_header.onchange = function () {
        ///DO EPIC SHIT

        const file2 = prof_header.files[0];

        modal2.style.display = "block";
        modPara2.innerHTML = `The file you selected is ${file2.name}`;
      };
      const like = document.querySelectorAll(".basi");
      console.log(like.length);
    }
    /////HOME JS
    if (location.hash == "#home") {
      console.log("uj");
      const like = document.querySelectorAll(".basi");
      let song = document.querySelector(".nun");
      let c = document.querySelector(".aud");

      console.log(song);
      for (let i = 0; i < like.length; i++) {
        like[i].onclick = function (e) {
          e.preventDefault();
          let p = e.target;
          let fn = p;
          let b = fn.getAttribute("data-file");
          console.log(b);
          let src = "./admin/uploads/" + b;
          console.log(src);
          let m = c.getAttribute("src");
          console.log(m);
          c.setAttribute("src", src);
          console.log(c);
        };
      }
    }
  });
}
//Make Homepage default
if (!location.hash) {
  location.hash = "#home";
}
let fragmentId = location.hash;
if (location.hash == fragmentId) {
  navigate();
}
window.addEventListener("hashchange", navigate);
