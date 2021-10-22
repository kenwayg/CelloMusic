$(document).ready(function () {
  // ............................................root elements
  $("#update_lang").hide();
  setInterval(function () {
    get_data();
  }, 500);
  $("#lang_btn").on("click", function () {
    const new_lang = $("#language").val();
    if (new_lang == "") {
      alert("Enter Language");
    } else {
      $.ajax({
        type: "POST",
        url: "web_services/addLanguage.php",
        data: $("#lang_form").serialize(),
        success: function (result) {
          if (result.status == "success") {
            alert("New language added ");
            $("#lang_form")[0].reset();
          } else if (result.status == "fail") {
            alert("Something went wrong ");
          }
        },
      });
    }
  });

  // --------------------------------------------get data thru ajax
  function get_data() {
    $.ajax({
      type: "POST",
      url: "web_services/getLanguage.php",
      success: function (result) {
        $("#lang_data").html(result);
      },
    });
  }
});
