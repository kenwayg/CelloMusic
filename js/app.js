let player = document.querySelector("#songs");

document.addEventListener("DOMContentLoaded", init);
const svg = document.querySelectorAll(".play-btn");
// const pau = document.querySelectorAll(".ass");
const ui = document.querySelectorAll(".play");
const pause = document.querySelectorAll(".content i");
console.log(pause.length);

function init() {
  for (let i = 0; i < ui.length; i++) {
    let play = document.querySelectorAll(".butt[data-file]");
    ui[i].onmouseenter = function (ev) {
      svg[i].onclick = playe;
      // song.onplaying = hide;
    };
    ui[i].onclick = pauser;

    function show() {
      svg[i].style.display = "block";
      pau[i].style.display = "none";
    }
    function hide() {
      svg.style.display = "none";
      pau.style.display = "block";
    }
  }
}

function playe(ev) {
  let p = ev.target;
  ev.preventDefault();
  let fn = p.getAttribute("data-file");
  let src = "./admin/uploads/" + fn;
  console.log(src);
  let current = player.currentSrc;
  player.src = src;
  // console.log(player.currentSrc);

  // current = false;

  if (src.paused) {
    player.play();
    console.log("dj");
  } else if (player.paused) {
    player.play();
  }
  // if (player.playing) {
  //   console.log("dnnd");
  //   player.play();
  // } else {
  //   player.play();
  // }
}
function pauser(ev) {
  let p = ev.target;
  ev.preventDefault();
  let fn = p.getAttribute("data-file");
  let src = "./admin/uploads/" + fn;
  console.log(player.src);
  if (player.src === player.currentSrc) {
    player.pause();
  } else {
    player.play();
  }

  // current = false;
}

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

player.addEventListener("timeupdate", updateProgress);

//   console.log(song);
// }
// let playing = true;

// function pauser(ev) {
//   song.pause();

// }
