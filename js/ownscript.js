$(document).ready(function () {
  $("#snipper").hide();
  $("#pass_filled").hide();
  $("#pass_chan").hide();

  // ........................register modal
  $("#modal_close").on("click", function () {
    $("#msg").hide();
    $("#registerf")[0].reset();
    $("#nameError").hide();
    $("#emailError").hide();
    $("#passError").hide();
    location.reload();
  });

  // ...................forgot password
  $("#verify_pass_modal").on("click", function () {
    location.reload();
  });

  $("#verify_Ajax").on("click", function () {
    // .....................Validation for username
    const name = $("#uname").val();
    const reg_name = /^[a-zA-Z]{3,30}$/;

    if (name == "") {
      $("#nameError").html("Name Required");
      $("#nameError").css("color", "red");
      return false;
    } else if (!name.match(reg_name)) {
      $("#nameError").html("Enter Valid Name");
      $("#nameError").css("color", "red");
      return false;
    } else {
      $("#nameError").html("");
    }

    // .......................Validate email
    const mail = $("#email").val();
    const reg_mail = /^[a-z0-9.-_]+@[a-z]+.[a-z]{2,3}$/;

    if (mail == "") {
      $("#emailError").html("Email Required");
      $("#emailError").css("color", "red");
      return false;
    } else if (!mail.match(reg_mail)) {
      $("#emailError").html("Enter a valid E-mail");
      $("#emailError").css("color", "red");
      return false;
    } else {
      $("#emailError").html("");
    }

    // ...............................Validate Password
    const pass = $("#pwd").val();
    // const reg_pass = /^[a-zA-Z0-9]+$/;
    if (pass == "") {
      $("#passError").html("Password Required");
      $("#passError").css("color", "red");
      return false;
    } else {
      $("#passError").html("");
      $("#verify_Ajax").hide();
      $("#snipper").show();

      //   ...................................ajax operation
      $.ajax({
        type: "POST",
        url: "web_services/register.php",
        data: $("#registerf").serialize(),
        success: function (result) {
          if (result.status == "fail") {
            $("#emailError").html("Email exist, could be your doppleganger");
            $("#emailError").css("color", "red");
            $("#verify_Ajax").show();
            $("#snipper").hide();
          } else if (result.status == "success") {
            $("#msg").html("Dear " + name + " Please Confirm Your E-mail");
            $("#msg").css("color", "orangered");
            $("#registerf")[0].reset();
            $("#verify_Ajax").show();
            $("#snipper").hide();
          } else if (result.status == "mail_failed") {
            $("#msg").html("Your mail failed");
            $("#msg").css("color", "red");
            $("#verify_Ajax").show();
            $("#snipper").hide();
          }
        },
      });
    }
  });

  // .......................................verify emailscript

  $("#email_verify").on("click", function () {
    var verify_user = $("#verify_email").val();
    const reg_mail1 = /^[a-z0-9.-_]+@[a-z]+.[a-z]{2,3}$/;

    if (verify_user == "") {
      $("#emailError1").html("Email Required");
      $("#emailError1").css("color", "red");
      return false;
    } else if (!verify_user.match(reg_mail1)) {
      $("#emailError1").html("Enter a valid E-mail");
      $("#emailError1").css("color", "red");
      return false;
    } else {
      $.ajax({
        type: "POST",
        url: "web_services/verifyemail.php",
        data: $("#forgot_pass").serialize(),
        success: function (result) {
          if (result.status === "success") {
            $("#pass_filled").show(500);
            $("#pass_chan").show();
            $("#email_verify").hide(500);
          } else if (result.status === "fail") {
            $("#msg1").html("Email not found");
            $("#msg1").css("color", "red");
            return false;
          }
          $("#msg1").html("");
        },
      });
    }
  });

  // ....................password verify button
  $("#pass_chan").on("click", function () {
    const verify_user = $("#verify_email").val();
    const reg_mail1 = /^[a-z0-9.-_]+@[a-z]+.[a-z]{2,3}$/;

    if (verify_user == "") {
      $("#emailError1").html("Email Required");
      $("#emailError1").css("color", "red");
      return false;
    } else if (!verify_user.match(reg_mail1)) {
      $("#emailError1").html("Enter a valid E-mail");
      $("#emailError1").css("color", "red");
    } else {
      $("#email_error1").html(" ");
    }
    const forgotPass = $("#forgot_pwd").val();
    // const reg_pass = /^[a-zA-Z0-9]+$/;
    if (forgotPass === "") {
      $("#passError1").html("Password Required");
      $("#passError1").css("color", "red");
      return false;
    } else {
      $("#passError1").html("");
      $.ajax({
        type: "POST",
        url: "web_services/update_password.php",
        data: $("#forgot_pass").serialize(),
        success: function (result) {
          if (result.status == "success") {
            $("#msg1").html("Password updated successfully");
            $("#msg1").css("color", "green");
          } else if (result.status == "fail") {
            $("#msg1").html("Password failed to update");
            $("#msg1").css("color", "orange");
          }
        },
      });
    }
  });

  // ......................................Login validation

  $("#login_btn").on("click", function () {
    const login_email = $("#loginEmail").val();
    const login_reg = /^[a-z0-9.-_]+@[a-z]+.[a-z]{2,3}$/;

    if (login_email == "") {
      $("#login_email_error").html("Email Required");
      $("#login_email_error").css("color", "red");
      return false;
    } else if (!login_email.match(login_reg)) {
      $("#login_email_error").html("Enter a valid E-mail");
      $("#login_email_error").css("color", "red");
      return false;
    } else {
      $("#login_email_error").html("");
    }

    // ......................login pass

    const passw = $("#loginPass").val();
    // const reg_pass = /^[a-zA-Z0-9]+$/;
    if (passw == "") {
      $("#login_pwd_error").html("Password Required");
      $("#login_pwd_error").css("color", "red");
      return false;
    } else {
      $("#login_pwd_error").html("");
    }
  });
});
