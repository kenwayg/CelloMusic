// $(document).ready(function () {
//   $("#btn").click(function () {
//     $(".load").load(
//       "data.txt",
//       {
//         data1: "sandwich",
//         data2: "ham",
//       },
//       function () {
//         alert("paradis");
//       }
//     );
//   });
// });

// AJAX PARAMETERS
// 1. url
// 2. data you want to pass in
// 3. callback what you want to happen
// $(document).ready(function () {
//   $("#btn").click(function () {
//     $.get("data.txt", function (data, status) {
//       $(".load").html(data);
//       alert(status);
//     });
//   });
// });
$(document).ready(function () {
  $("input").keyup(function () {
    var name = $("input").val();
    $.post(
      "suggest.php",
      {
        suggestion: name,
      },
      function (data, status) {
        $("#test").html(data);
      }
    );
  });
});
