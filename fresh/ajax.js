$(document).ready(function () {
  var commCount = 2;
  $("#btn").click(function () {
    commCount += 2;
    $("#cont").load("loadComments.php", {
      commNewCount: commCount,
    });
  });
});
