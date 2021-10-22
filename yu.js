console.log(location);
let c = document.querySelector(".aud");
let img = document.querySelector(".cov");
let click = document.querySelectorAll(".click");
let play = document.querySelectorAll(".ew .play");
let pau = document.querySelectorAll(".ew .pauser");
let cov = document.querySelectorAll(".play");
let bass = document.querySelectorAll(".basi");
let like = document.querySelectorAll(".like_play");
let play_btn = document.querySelector(".play-btn");
let like_btn = document.querySelectorAll(".af");

let playing = true;
let tag = false;
console.log("like_btn " + like_btn.length);
// PLAY / PLAYBAR FUNCTIONALITY
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

for (let i = 0; i < bass.length; i++) {
  bass[i].addEventListener(
    "click",
    function player(e) {
      console.log(e.target);
      let p = e.target;
      // pau[i].style.display = "block";
      // bass[i].style.display = "none";
      // console.log(pau[i]);
      e.preventDefault();
      let fn = p.getAttribute("data-file");
      let src = "./admin/uploads/" + fn;
      c.setAttribute("data-file", src);
      img.setAttribute("src", play[i].src);
      console.log(img);
      let m = c.getAttribute("src");
      alert("we");

      // pau[i].setAttribute("data-file", src);
      console.log(m + " m");
      console.log(src);
      $(".play-btn").css("display", "none");
      $(".pa").css("display", "block");
      play_btn.setAttribute("data-file", src);
      if (p) {
        console.log(p);
        bass[i].src = "./images/pause.svg";
      }

      // if (playing) {
      //   bass[i].src = "./images/pause.svg";
      //   c.play();
      //   playing = false;
      // }

      // if (c.paused) {
      //   tag = true;
      //   console.log("all off");
      //   bass.src = "./images/play.svg";
      // }

      if (src == m && playing) {
        console.log(c + "c");
        console.log("sw");
        // bass[i].src = "./images/pause.svg";
        $(".play-btn").css("display", "none");
        $(".pa").css("display", "block");
        playing = false;
        // tag = true;

        c.play();
      } else if (src != m) {
        c.setAttribute("src", src);
        console.log(m);
        console.log(c + "c");

        // tag = true;
        console.log("sa");
        // bass[i].src = "./images/pause.svg";
        playing = false;
        c.play();
      } else if (playing == false) {
        bass[i].src = "./images/play.svg";
        $(".play-btn").css("display", "block");
        $(".pa").css("display", "none");
        playing = true;

        c.pause();
      }

      if (c.currentSrc != c.src) {
        // play[i].classList.remove("moon");
        console.log("io");
      }
      // if (tag == true) {
      //   console.log("wow");
      //   bass[i].src = "./images/play.svg";
      // }
    },
    false
  );
}
$(".pa").on("click", function (e) {
  e.preventDefault();
  c.pause();
  $(".play-btn").css("display", "block");
  $(".pa").css("display", "none");
  playing = true;
  console.log("pause");
});
play_btn.onclick = function (e) {
  e.preventDefault();
  let a = play_btn.getAttribute("data-file");
  let m = c.getAttribute("src");
  console.log(m);
  console.log(a);
  if (a == m) {
    c.play();
    playing = false;
    $(".pa").css("display", "block");
    $(".play-btn").css("display", "none");
    // console.log("play");
  }
};

// for (let i = 0; i < pau.length; i++) {

//   pau[i].addEventListener(
//     "click",
//     function pauser(e) {
//       let g = c.getAttribute("data-file");
//       let s = pau[i].getAttribute("data-file");
//       let r = c.getAttribute("data-file");
//       console.log(g);
//       console.log(s);
//       if (g == r) {
//         c.pause();
//       }
//       // pau[i] = e.currentTarget;
//       // console.log(pau[i]);
//       pau[i].style.display = "none";
//       bass[i].style.display = "block";
//       $(".pa").css("display", "none");
//       $(".play-btn").css("display", "block");
//       // console.log(x);

//       // c.currentSrc = c.src;
//       // c.setAttribute("class", "pop");
//     },
//     // console.log(src);
//     false
//   );
// }

c.addEventListener("timeupdate", a);
// }
// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

//Hovering Tecnology
for (let i = 0; i < click.length; i++) {
  click[i].onmouseenter = function () {
    like[i].style.transition = "all 0.8s ease-in";
    let heart = bass[i].getAttribute("data-file");
    let m = c.getAttribute("src");

    let g = "./admin/uploads/" + heart;
    console.log("m " + m);
    console.log("g " + g);

    bass[i].style.display = "block";
    console.log(like[i]);
    like[i].style.display = "block";
    if (m != g) {
      bass[i].src = "./images/play.svg";
    } else if (c.paused && m == g) {
      bass[i].src = "./images/play.svg";
    } else {
      bass[i].src = "./images/pause.svg";
    }
  };
  click[i].onmouseleave = function () {
    let heart = play[i].getAttribute("data-file");
    let m = c.getAttribute("src");
    let g = "./admin/uploads/" + heart;
    // if (!c.paused && m == g) {
    //   bass[i].style.display = "block";
    // }
    //  else  {
    //   bass[i].style.display = "none";
    // }
    like[i].style.display = "none";
    // if (bass[i].src == `./images/pause.svg`) {
    //   console.log("jd");

    // }
  };
}

songIndex = 0;
let da = document.querySelectorAll(".play[data-file");
let next = document.querySelector(".next");
console.log(c.src);
// function nextSong(e) {
//   e.preventDefault();

//   songIndex++;

//   da.src = da[songIndex];
// }
// next.onclick = function () {
//   nextSong();
// };
var btn;
$(".af").on("click", function () {
  var music_id = $(this).data("id");
  console.log("inside vagina " + music_id);

  $clicked_btn = $(this);
  console.log($clicked_btn);
  if ($clicked_btn.hasClass("heart-inactive")) {
    action = "like";
    console.log("dollar");

    console.log(action);
  } else if ($clicked_btn.hasClass("heart-active")) {
    action = "unlike";
    console.log(action);
  }
  $.ajax({
    url: "./index.php",
    // riochet-oomie
    type: "post",
    data: {
      action: action,
      music_id: music_id,
    },
    success: function (data) {
      // res = JSON.parse(data);
      if (action == "like") {
        $clicked_btn.removeClass("heart-inactive");
        $clicked_btn.addClass("heart-active");
      } else if (action == "unlike") {
        $clicked_btn.removeClass("heart-active");
        $clicked_btn.addClass("heart-inactive");
      }
      // alert(res.likes);
    },
  });
});
const back = () => {
  alert("YO!! You must be logged in to do that ");
  window.location.href = "./login.php";
};
