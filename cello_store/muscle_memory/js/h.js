var curPlaying;
let pPause = document.querySelector(".bass");
let play = document.querySelectorAll(".play");
let bass = document.querySelectorAll(".bass");
let click = document.querySelectorAll(".click");
let audio = document.querySelectorAll(".aud");
// console.log(pPause.src);

function a() {
  var a = $(".progress"),
    d = 0;
  "Infinity" == c.duration
    ? (d = 100)
    : c.currentTime > 0 && (d = Math.floor((100 / c.duration) * c.currentTime)),
    a.stop().animate({ width: d + "%" }, 500),
    $("#music-player #time").html(b(c.currentTime)),
    $("#music-player #total-time").html(b(c.duration));
}
function b(a) {
  return (
    (minutes = Math.floor(a / 60)),
    (minutes = minutes >= 10 ? minutes : "" + minutes),
    (seconds = Math.floor(a % 60)),
    (seconds = a >= 10 ? seconds : "0" + seconds),
    minutes + ":" + seconds
  );
}
//HOVERING OVER IMAGE FUNCTION
//DISPLAY ICON EITHER PLAY
for (let i = 0; i < click.length; i++) {
  click[i].onmouseenter = function () {
    bass[i].style.display = "block";
  };
  click[i].onmouseleave = function () {
    bass[i].style.display = "none";
  };
}

var c = audio.currentSrc;
console.log("ff");
//PLAYING FUNCTIONALITY
$(function () {
  $(".bass").click(function (e) {
    e.preventDefault();
    console.log(this.src);
    var song = $(this).next("audio")[0];
    if (song.paused) {
      song.play();
      console.log(this);
      // audio.src = song;

      for (let i = 0; i < bass.length; i++) {
        bass[i].src = "./images/play.svg";
        if (!song.paused) {
          this.src = "./images/pause.svg";
        }
        play[i].style.transform = "scale(1)";
        bass[i].onclick = function () {
          play[i].style.transform = "scale(.7)";
          bass[i].src = "./images/pause.svg";
        };
      }
    } else {
      song.pause();
      this.src = "./images/play.svg";
      for (let i = 0; i < bass.length; i++) {
        bass[i].onclick = function () {
          if (song.paused) {
            play[i].style.transform = "scale(.7)";
          }
          play[i].style.transform = "scale(1)";
        };
      }
    }
    curPlaying = $(this).parent()[0].id;
    // c.addEventListener("timeupdate", a);
  });
  // console.log(.currentSrc);
  //TO STOP OTHER TRACK CURRENTLY PLAYING
  $("audio").on("play", function (me) {
    jQuery("audio").each(function (i, e) {
      if (e != me.currentTarget) {
        this.pause();
      }
    });
  });
});
