// $(document).ready(function () {
//   $("#search").on("keyup", function () {
//     const search_bar = $("#search").val();
//     $.ajax({
//       type: "POST",
//       url: "web_services/searchBar.php",
//       data: { main_key: search_bar },
//       success: function (data) {
//         $("#search_modal").modal("show");
//         $("#search_result").html(data);
//       },
//     });
//   });
// });
document.addEventListener("DOMContentLoaded", () => {
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
  function myDisplay(some) {
    document.querySelector(".demo").innerHTML = some;
  }
  function calc(x, y, z) {
    var result = x + y;
    z(result);
  }
  calc(2, 3, myDisplay);
});
