$(document).ready(function () {
  var player = document.querySelector(".aud").id; //Get audio player
  let play = document.querySelectorAll(".play-btn");
  let pause = document.querySelector(".pause");

  // $(document).on("click", ".play-btn", function () {
  //   //Play on click
  //   player.play();
  //   $(".play-btn").hide();
  //   $(".pause").show();
  // });
  for (let i = 0; i < play.length; i++) {
    play[i].onclick = function () {
      player.play();
      console.log(player);
      play[7].style.display = "none";
      pause.style.display = "block";
    };
  }

  // $(document).on("click", ".pause", function () {
  //   //Pause on click
  //   player.pause();
  //   $(".pause").hide();
  //   $(".play-btn").show();
  // });

  function updateProgress() {
    var progress = $(".progress"); //The progress bar
    var value = 0; //Song position starts at 0

    if (player.duration == "Infinity") {
      //Song is infinate in length
      value = 100;
    } else if (player.currentTime > 0) {
      //Songs current time is past 0
      value = Math.floor((100 / player.duration) * player.currentTime);
    }
    progress.stop().animate({ width: value + "%" }, 500); //set the width of the progress bar
    $("#music-player #time").html(formatTime(player.currentTime)); //set the new timestamp
    $("#music-player #total-time").html(formatTime(player.duration));
  }

  function formatTime(time) {
    //Change time format
    minutes = Math.floor(time / 60);
    minutes = minutes >= 10 ? minutes : "" + minutes;
    seconds = Math.floor(time % 60);
    seconds = time >= 10 ? seconds : "0" + seconds;
    return minutes + ":" + seconds;
  }
  // for (let i = 0; i < player.length; i++) {
  player.addEventListener("timeupdate", updateProgress);
  // }
});
$("audio").on("play", function (me) {
  jQuery("audio").each(function (i, e) {
    if (e != me.currentTarget) {
      this.pause();
    }
  });
});
