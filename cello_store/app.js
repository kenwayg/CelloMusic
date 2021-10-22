function getContent(fragmentId, myCallback) {
  let xhr = new XMLHttpRequest();
  loader.classList.add("active");
  xhr.onload = function () {
    myCallback(xhr.responseText);
    loader.classList.add("hidden");
    loader.classList.remove("active");
  };
  //Fetch the partial html files
  xhr.open("GET", fragmentId + ".php");
  // launch();

  xhr.send();
}
// window.onload = function () {
//   loader.classList.remove("active");
// };

const loader = document.querySelector(".loading"),
  app = document.querySelector("#app");
// function launch() {
//   setTimeout(() => {
//     loader.style.opacity = "0";
//     loader.style.display = "none";
//     app.style.display = "block";
//   }, 4000);
//   setTimeout((app.style.opacity = "1"), 50);
// }

function navigate() {
  const content = document.querySelector("#app");
  fragmentId = location.hash.substr(1);
  console.log(location.hash);
  //Display current pages content
  getContent(fragmentId, (comp) => {
    console.log(fragmentId);
    content.innerHTML = comp;
    /////PROFILE JS
    if (location.hash == "#profile") {
      ///automatically scroll to top once page displays
      window.scroll(0, 0);
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
      ///automatically scroll to top once page displays
      window.scroll(0, 0);
      const prof_image = document.querySelector(".profile_image");
      // btn = document.querySelector(".btn");

      // console.log(prof_image);
      // btn.onclick = function () {
      //   console.log(prof_image.value);
      // };
      //Get the Modal
      const modal = document.querySelectorAll(".modal"),
        //Get the close button
        closeBtn = document.querySelectorAll(".closeBtn"),
        modCon = document.querySelectorAll(".modal_content"),
        ams = document.querySelectorAll(".ams"),
        play_add = document.querySelectorAll(".addPlay");

      // window.scroll({
      //   top: 0,
      //   left: 0,
      //   behavior: "smooth",

      // });
      // modal[y].style.display = "none";

      // closeBtn.addEventListener("click", modClose);
      // prof_image.onchange = function () {
      //   ///DO EPIC SHIT

      //   const file = prof_image.files[0];

      //   modPara.innerHTML = `The file you selected is ${file.name}`;
      // };

      const like = document.querySelectorAll(".basi");
      let song = document.querySelector(".nun");
      let like_play = document.querySelectorAll(".like_play");
      let img = document.querySelector(".cov");
      let c = document.querySelector(".aud");
      let play_btn = document.querySelector(".play-btn");
      let pause_btn = document.querySelector(".pa");
      const first = document.querySelectorAll(".first");
      const cov = document.querySelectorAll(".pass");
      const artist = document.querySelector(".artist");
      const covSong = document.querySelector(".music");
      const unk = document.querySelectorAll(".unk");
      const chk = document.querySelectorAll(".check_song");
      const desk = document.querySelectorAll(".desk_song");
      const trigger = document.querySelectorAll(".gun");
      const play_name = document.querySelectorAll(".pl_name");
      const genre = document.querySelectorAll(".play_genre");
      let playing = true;
      let seeking;
      let seekto;
      let songs = document.querySelectorAll("[data-file]");
      let u = c.getAttribute("data-file");
      let nu;
      const playBar = document.querySelector("#playbar");
      const more_tab = document.querySelectorAll(".ams");
      const more_songs = document.querySelectorAll(".scrooge");
      const play_desc = document.querySelectorAll(".descrip");
      const play_art = document.querySelectorAll(".play_art");
      const des_gen = document.querySelectorAll(".des_gen");
      const m_s = document.querySelectorAll(".more_songs");
      const sl = document.querySelectorAll(".sl");

      let w;
      let d;
      let g;
      let p_a;
      let p;
      let m;
       let y;
      function dragHandler(e) {
        c.currentTime = e.target.value;
        e.target.max = c.currentTime;
      }

      c.addEventListener("timeupdate", updateProgress);
      c.onended = function () {
        play_btn.style.display = "block";
        pause_btn.style.display = "none";
        // c.duration = 0;
        // for (let i = 0; i < like.length; i++) {
        //   let coverName = cov[i].getAttribute("data-name");
        //   let coverSong = cov[i].getAttribute("data-song");
        //   c.setAttribute("data-name", coverName);
        //   c.setAttribute("data-song", coverSong);
        // }

        // playBar.setAttribute("value", 0);
        next();
      };

      // function seek(e) {
      //   if (seeking) {
      //     let r = e.clientX - playBar.offsetLeft;

      //     // seekto = c.duration * (r / 100);
      //     playBar.setAttribute("value", playBar.value);
      //     playBar.setAttribute("max", c.duration);

      //     c.currentTime = playBar.value;
      //     // alert(seekto + "re");
      //   }
      // }

      // alert("Queen's Ass");

      for (let y = 0; y < play_add.length; y++) {

        // let g = genre[y].value;
        for (let y = 0; y < trigger.length; y++) {
                
          // 0041247968
          trigger[y].onclick = function (e) {
            console.log(m_s[y].dataset.file + "rubber");
            let o = m_s[y].dataset.file;
                    
            alert("Bet king kill you!!");

              action = w;
              descrip = d;
              genree = g;
              pl_art = p_a;
              console.log(action);

              alert(action);
              alert("High Tensn");
            e.preventDefault();
              $.ajax({
                method: "post",
                url: "connect.php",
                data: {
                  action: action,
                  descrip: descrip,
                  genree: genree,
                  p_a: p_a,
            o:o
                },
                success: function (data) {
                  alert("High Tension");
                  alert(descrip);
                  alert(o);
                  m_s[y].style.display="none"
                },
              });
          };
        }
        const modOpen = () => {
          // p = m_s[y].getAttribute("data-file");
          // console.log(p);
          // g = genre[y].options[genre[y].selectedIndex];
          // alert(g.value);
          // alert(genre[b].options[b].value + "neww");
          //     genre[b].options[b].onclick=function () {
          //   alert(genre[b].options[b].value + "neww")
          // }

          // alert("fuck her ass" + modal + y);
          // alert(play_add.length);
          // alert(modal.length);
                  sl[y].onclick=function (e) {
                     action = w;
              descrip = d;
              genree = g;
              pl_art = p_a;
              musicc = m;
          io = y;   
                      e.preventDefault();
                    $.ajax({
                      method:'post',
                      url:"./web_services/add.php",
                      data:{
                           action :   action ,
                           descrip:descrip,
                           genree:genree,
                           pl_art:pl_art,
                           musicc:musicc,
                           io:io


                      },
                      success: function (data) {
                        alert("we're good!!")
  alert(action);
       ////21/10/21 
        // Finish off add up FUNCTIONALITY
                      }

                      })
                 
                    
                  }

          for (let y = 0; y < m_s; y++) {
            // $(".play_genre").val();
          }
          modal[y].style.display = "block";
          console.log(songs[y].dataset.file + "jekinde");
          unk[y].value = songs[y].dataset.file;

          play_name[y].onchange = function () {
            console.log(play_name[y].value);
            chk[y].value = play_name[y].value;
            w = chk[y].value;
            m =   unk[y].value ;
            console.log(w + " SE");
            console.log(chk[y].value + "vagina");
          };
  //         play_art[y].onchange = function () {
  //           ///DO EPIC SHIT
 
  //  y  = play_art[y].value;
  //           const file = play_art[y].files[0];

  //           p_a = file.name;
  //         };
          genre[y].onchange = function () {
            // des_gen[y].value = $(".play_genre").val();
            des_gen[y].value = genre[y].value;
            console.log(des_gen[y].value);
            g = des_gen[y].value;
            // chk[y].value = play_name[y].value;
            // w = chk[y].value;
            console.log(g + " SE");
            // console.log(chk[y].value + "vagina");
          };
          play_desc[y].onchange = function () {
            console.log(play_desc[y].value);
            desk[y].value = play_desc[y].value;
            d = desk[y].value;
            // console.log(w + " SE");
            console.log(desk[y].value + "vagina");
          };

          ams[y].onclick = function (e) {};
          more_tab[y].onclick = function (e) {
            e.preventDefault();
            more_songs[y].style.display = "block";
            console.log(m_s.length + "dw");
            console.log(trigger.length + "tr");
          };
          // click outside the modal content to close the modal

          document.onclick = function (event) {
            if (event.target == modal[y]) {
              modal[y].style.display = "none";
            }
          };
        };
        play_add[y].addEventListener("click", modOpen);
      }
      const more = document.querySelectorAll(".more");
      const dropCon = document.querySelectorAll(".dropdown-content");
      for (let y = 0; y < more.length; y++) {
        const modClose = (e) => {
          modal[y].style.display = "none";
        };
        // const modOpen = () => {
        //   alert("fuck her ass" + modal[y]);
        //   modal[y].style.display = "block";
        // };
        // play_add[y].addEventListener("click", modOpen);
        closeBtn[y].addEventListener("click", modClose);
        // When the user clicks anywhere outside of the modal, close it

        more[y].onclick = function () {
          dropCon[y].classList.add("show");
        };
        window.onclick = function (event) {
          if (!event.target.matches(".more")) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];

              if (openDropdown.classList.contains("show")) {
                openDropdown.classList.remove("show");
              }
            }
          }
        };
      }
      // $(".more").click(function () {
      //   // calculate the required sizes, spaces
      //   var $ul = $(".dropdown").children(".dropdown-content");
      //   var $button = $(this).children(".more");
      //   var ulOffset = $ul.offset();
      //   // how much space would be left on the top if the dropdown opened that direction
      //   var spaceUp =
      //     ulOffset.top -
      //     $button.height() -
      //     $ul.height() -
      //     $(window).scrollTop();
      //   alert(spaceUp);
      //   // how much space is left at the bottom
      //   var spaceDown =
      //     $(window).scrollTop() +
      //     $(window).height() -
      //     (ulOffset.top + $ul.height());
      //   // switch to dropup only if there is no space at the bottom AND there is space at the top, or there isn't either but it would be still better fit
      //   if (spaceDown < 0 && (spaceUp >= 0 || spaceUp > spaceDown))
      //     $(this).addClass("dropup");
      // });
      // .on("hidden.bs.dropdown", ".dropdown", function () {
      //   // always reset after close
      //   $(this).removeClass("dropup");
      // });
      function updateProgress() {
        //progress bar
        // let progress = document.querySelectorAll(".progress");
        // var progress = $(".animate-track");
        let nt = c.currentTime * (100 / c.duration);

        playBar.value = c.currentTime;
        playBar.max = c.duration;

        // playBar.setAttribute("value", nt);
        let progress = document.querySelector(".animate-track");
        let current = c.currentTime;
        let duration = c.duration;
        const roundCurrent = Math.round(current);
        const roundDuration = Math.round(duration);
        const animationn = Math.round((roundCurrent / roundDuration) * 100);
        console.log(animationn + "animation");
        // playBar.addEventListener("mousedown", function (e) {
        //   seeking = true;
        //   seek(e);
        // });
        // playBar.addEventListener("mousemove", function (e) {
        //   seek(e);
        // });
        // playBar.addEventListener("mouseup", function (e) {
        //   seeking = false;
        // });
        // if (c.currentTime != 0) {
        // playBar.setAttribute("max", roundDuration);
        playBar.setAttribute("value", c.currentTime);
        playbar.onchange = dragHandler;
        playBar.addEventListener("mousedown", dragHandler);
        //   playBar.onprogress = true;
        // }
        c.addEventListener("timeupdate", function () {
          formatTime();
        });

        // playBar.onchange = dragHandler;
        // playbar.addEventListener("input", dragHandler);
        //song position @ zero
        let value = 0;

        if (c.duration == "Infinity") {
          //song is infinite in length
          value = 100;
        } else if (c.currentTime > 0) {
          //songs current time is past 0
          value = Math.floor((100 / c.duration) * c.currentTime);
          console.log(c.currentTime);
        }
        // animate every 5seconds
        // progress.stop().animate({ width: value + "%" }, 500);
        progress.style.transform = `translateX(${animationn}%)`;
        //display timestamp
        // document.querySelector("#time").innerHTML = formatTime(); //set the new timestamp
        // document.querySelector("#total-time").innerHTML = formatTime(); //set total timestamp
      }
      // skipTrackHandler(direction){

      // }
      function formatTime() {
        //Change time formaT
        // minutes = Math.floor(time / 60);
        // minutes = minutes >= 10 ? minutes : "" + minutes;
        // seconds = Math.floor(time % 60);
        // seonds = time >= 10 ? seconds : "0" + seconds;
        // return minutes + ":" + seconds;
        let curmins = Math.floor(c.currentTime / 60);
        let cursecs = Math.floor(c.currentTime - curmins * 60);
        let durmins = Math.floor(c.duration / 60);
        let dursecs = Math.floor(c.duration - durmins * 60);

        if (cursecs < 10) {
          cursecs = "0" + cursecs;
        }
        if (dursecs < 10) {
          dursecs = "0" + dursecs;
        }
        if (curmins < 10) {
          curmins = "0" + curmins;
        }
        if (durmins < 10) {
          durmins = "0" + durmins;
        }

        document.querySelector("#time").innerHTML = curmins + ":" + cursecs; //set the new timestamp
        if (c.duration) {
          document.querySelector("#total-time").innerHTML =
            durmins + ":" + dursecs; //set total timestamp
        } else {
          document.querySelector("#total-time").innerHTML = "0:00"; //set total timestamp
        }
      }
      for (let i = 0; i < like.length; i++) {
        like[i].onclick = function (e) {
          e.preventDefault();
          let p = e.target;
          let fn = p;
          let b = fn.getAttribute("data-file");
          u = b;
          console.log(b);
          let src = "../admin/uploads/" + b;
          console.log(src);
          let z = cov[i].getAttribute("src");
          let coverName = cov[i].getAttribute("data-name");
          let coverSong = cov[i].getAttribute("data-song");
          artist.innerHTML = coverName;
          covSong.innerHTML = coverSong;
          console.log(coverName + "dd");
          console.log(coverSong + "dd");
          // console.log(z + "z");
          console.log("b " + b);
          img.src = z;
          nu = fn.getAttribute("data-id");

          nu -= 1;
          console.log("nu " + nu);
          //PLAY
          let current = c.currentTime;
          let duration = c.duration;
          console.log(current);
          c.setAttribute("data-id", nu);
          let m = c.getAttribute("src");
          console.log(m);
          console.log("c.src" + src);
          console.log("m.src" + m);
          //BOTTOM PLAYBAR LOGIC
          play_btn.style.display = "none";
          pause_btn.style.display = "block";

          play_btn.setAttribute("data-file", src);
          c.setAttribute("data-file", src);
          let catt = c.getAttribute("data-file");
          if (p) {
            console.log(p);
            like[i].src = "./images/pause.svg";
          }

          //PLAYING FUNCTIONALITY
          // updateProgress();
          // playBar.setAttribute = ("value", c.currentTime);
          // playBar.setAttribute("max", c.duration);
          // playBar.setAttribute("value", c.currentTime);
          // src=current music playing
          if (src == m && playing) {
            like[i].src = "./images/pause.svg";
            play_btn.style.display = "none";
            pause_btn.style.display = "block";
            playing = false;
            c.play();
            console.log("current" + src);
          } else if (playing == false && src == m) {
            like[i].src = "./images/play.svg";
            play_btn.style.display = "block";
            pause_btn.style.display = "none";
            playing = true;
            c.pause();
          }
          // to play a new track and disrupt the former current track
          else if (src != m) {
            like[i].src = "./images/pause.svg";
            console.log("oldtrack: " + m);
            console.log("newtrack: " + src);
            c.setAttribute("src", src);
            c.setAttribute("data-file", u);
            playing = false;
            c.play();
            console.log(c.src + "ry");
          }
          if (catt != b) {
            // like[i].src = "./images/pause.svg";
            // alert("trf")
          }
        };
      }
      pause_btn.onclick = function (e) {
        e.preventDefault();
        let a = play_btn.getAttribute("data-file");
        let m = c.getAttribute("src");
        if (playing == false && a == m) {
          play_btn.style.display = "block";
          pause_btn.style.display = "none";
          playing = true;
          c.pause();
        } else {
          play_btn.style.display = "block";
          pause_btn.style.display = "none";
          playing = true;
          c.pause();
        }
      };
      play_btn.onclick = function (e) {
        e.preventDefault();
        let p = c.getAttribute("data-id");

        let a = play_btn.getAttribute("data-file");
        let m = c.getAttribute("src");
        console.log(m + "pl");
        console.log(a);
        // if (a == m) {
        //   c.play();
        //   playing = false;
        //   pause_btn.style.display = "block";
        //   play_btn.style.display = "none";
        if (a == m && playing) {
          // like[i].src = "./images/pause.svg";
          play_btn.style.display = "none";
          pause_btn.style.display = "block";
          playing = false;
          c.play();
          // console.log("current" + src);
          // }
        } else {
          if (p == "") {
            alert("No track yet");
            c.src = "";
            play_btn.style.display = "block";
            pause_btn.style.display = "none";
          } else {
            pause_btn.style.display = "block";
            play_btn.style.display = "none";
            playing = false;
            c.play();
            // alert("no track yet");
            // c.play();
            // $(".pa").css("display", "block");
            // $(".play-btn").css("display", "none");
          }
        }
      };

      console.log(first.length);
      //HOVER
      for (let i = 0; i < first.length; i++) {
        first[i].onmouseenter = function () {
          like_play[i].style.transition = "all 0.8s ease-in";
          let heart = like[i].getAttribute("data-file");
          let m = c.getAttribute("src");

          let g = "../admin/uploads/" + heart;

          like[i].style.display = "block";

          like_play[i].style.display = "block";
          if (m != g) {
            like[i].src = "./images/play.svg";
          } else if (c.paused && m == g) {
            like[i].src = "./images/play.svg";
          } else {
            like[i].src = "./images/pause.svg";
          }
        };
        first[i].onmouseleave = function () {
          // let heart = like[i].getAttribute("data-file");
          // let m = c.getAttribute("src");
          // let g = "../admin/uploads/" + heart;
          // if (!c.paused && m == g) {
          //   bass[i].style.display = "block";
          // }
          //  else  {
          //   bass[i].style.display = "none";
          // }
          like_play[i].style.display = "none";
          //   if (bass[i].src == `./images/pause.svg`) {
          //     console.log("jd");
          // };
        };
      }
      //////LIKE FUNCTIONALITY
      var btn;
      $(".af").on("click", function () {
        var music_id = $(this).data("id");
        // console.log("inside vagina " + music_id);

        $clicked_btn = $(this);
        console.log($clicked_btn);
        if ($clicked_btn.hasClass("heart-inactive")) {
          action = "like";
          // alert("dollar");

          alert("Track has been added to your likes");
        } else if ($clicked_btn.hasClass("heart-active")) {
          action = "unlike";
          alert("Track has been removed from your likes");
        }
        $.ajax({
          url: "./home.php",
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
      // const back = () => {
      //   alert("YO!! You must be logged in to do that ");
      //   window.location.href = "./login.php";
      // };
      //playlist
      let playlist = [];
      const retroArray = [...songs];
      console.log("ut " + songs);
      for (let i = 0; i < songs.length; i++) {
        let m = retroArray[i].getAttribute("data-file");
        playlist.push(m);
      }
      console.log(playlist);

      $(".next").click(next);
      $(".previous").click(prev);
      let n = 0;
      function next() {
        // playBar.value = c.currentTime;
        // playBar.max = c.duration;
        let p = c.getAttribute("data-id");
        //when no source on ground

        if (play_btn.style.display == "block" && p) {
          nu = c.getAttribute("data-id");
          nu++;

          console.log(nu);
          c.setAttribute("data-id", nu);

          let spect = `../admin/uploads/` + playlist[nu];
          c.setAttribute("src", spect);
          c.setAttribute("data-file", playlist[nu]);
          c.pause();
        } else if (pause_btn.style.display == "block") {
          alert("Queens pussy");

          nu = c.getAttribute("data-id");
          nu++;

          console.log(nu);
          c.setAttribute("data-id", nu);

          let spect = `../admin/uploads/` + playlist[nu];
          c.setAttribute("src", spect);
          c.setAttribute("data-file", playlist[nu]);
          c.play();
        }

        // c.play();
        if (p == "") {
          alert("no track yet");
          n = "";
        } else {
          console.log("nu" + nu);
          let r = playlist.length - 1;
          console.log(playlist.length);

          if (nu > r) {
            alert("Happy fucking birthday Queen!! ");
          }
          let z = cov[nu].getAttribute("src");
          img.src = z;
          let coverName = cov[nu].getAttribute("data-name");
          let coverSong = cov[nu].getAttribute("data-song");

          artist.innerHTML = coverName;
          covSong.innerHTML = coverSong;
        }
        // console.log(n);

        // if (n >= playlist.length) {
        //   // n = playlist[0];
        //   alert("hre");
        // }
        // pause_btn.style.display = "block";
        // play_btn.style.display = "none";
        // console.log("playl" + playlist[n]);

        // if (c.src == u) {
        //   // alert("us against whatever");
        //   n = 1;
        // }
        // nu = c.getAttribute("data-id");
        // console.log(playlist.n);
        // n = playlist[n];
        // console.log("n" + n);

        // INCREAMENT DATAID
        // n++;

        // if (playlist[n] == u) {
        //   // alert("us against whatever");
        //   n += 0;
        //   c.setAttribute("data-id", n);
        // }
        // if (n <= nu) {
        //   n = nu;

        //   console.log("n" + n);
        //   n++;
        //   // alert("us against whatever");
        // } else {
        //   alert("us against whatever");
        //   // nu = n;
        //   // n++;
        // }
        // let z = cov[n].getAttribute("src");
        // img.src = z;
        // let coverName = cov[n].getAttribute("data-name");
        // let coverSong = cov[n].getAttribute("data-song");

        // artist.innerHTML = coverName;
        // covSong.innerHTML = coverSong;

        // c.src = `../admin/uploads/` + playlist[n];
        // let p = `../admin/uploads/` + playlist[n];
        // // let y= c.getAttribute("data-file");
        // if (c.paused) {
        //   c.setAttribute("data-file", p);
        // }

        // // console.log(n++);
        // c.setAttribute("data-id", n);
        // c.play();
        // console.log("new" + nu);
      }
      // alert("red");
      function prev() {
        console.log("nu" + nu);
        let p = c.getAttribute("data-id");
        // let r = playlist.length - 1;
        console.log(playlist.length);
        if (play_btn.style.display == "block" && p) {
          nu = c.getAttribute("data-id");
          nu--;

          console.log(nu);
          c.setAttribute("data-id", nu);

          let spect = `../admin/uploads/` + playlist[nu];
          c.setAttribute("src", spect);
          c.setAttribute("data-file", playlist[nu]);
          c.pause();
        } else if (pause_btn.style.display == "block") {
          alert("Queens pussy");

          nu = c.getAttribute("data-id");
          nu--;
          console.log(nu);
          c.setAttribute("data-id", nu);

          let spect = `../admin/uploads/` + playlist[nu];
          c.setAttribute("src", spect);
          c.setAttribute("data-file", playlist[nu]);
          c.play();
        }
        if (p == "") {
          alert("no track yet");
          n = "";
        } else {
          if (nu < 0) {
            alert("Happy fucking birthday Queen!! ");
          }
          let z = cov[nu].getAttribute("src");
          img.src = z;
          let coverName = cov[nu].getAttribute("data-name");
          let coverSong = cov[nu].getAttribute("data-song");

          artist.innerHTML = coverName;
          covSong.innerHTML = coverSong;
        }
        // pause_btn.style.display = "block";
        // play_btn.style.display = "none";
        // nu = c.getAttribute("data-id");
        // if (n < 1) {
        //   n = playlist.length;
        //   // alert("ewe");

        //   n--;
        // }
        // // if (playlist[n] == c.src) {
        // // }
        // if (playlist[n] == u) {
        //   // alert("us against whatever");
        //   n--;
        // }
        // if (playlist[n] == u) {
        //   // alert("us against whatever");
        //   n += 0;
        //   c.setAttribute("data-id", n);
        // }
        // if (n <= nu) {
        //   n = nu;
        //   console.log("n" + n);
        //   console.log("nu" + nu);
        //   n--;
        //   // alert("us against whatever");
        // } else {
        //   // n = nu;
        //   // n--;
        //   nu = n;
        // }
        // let z = cov[n].getAttribute("src");
        // img.src = z;
        // let coverName = cov[n].getAttribute("data-name");
        // let coverSong = cov[n].getAttribute("data-song");

        // artist.innerHTML = coverName;
        // covSong.innerHTML = coverSong;
        // let p = `../admin/uploads/` + playlist[n];
        // c.src = `../admin/uploads/` + playlist[n];
        // // console.log(n++);
        // if (c.paused) {
        //   c.setAttribute("data-file", p);
        // }
        // c.setAttribute("data-id", n);

        // c.play();
      }
    }
    if (location.hash == "#library") {
      ///automatically scroll to top once page displays
      window.scroll(0, 0);
      const like = document.querySelectorAll(".basi");
      let song = document.querySelector(".nun");
      let like_play = document.querySelectorAll(".like_play");
      let img = document.querySelector(".cov");
      let c = document.querySelector(".aud");
      let play_btn = document.querySelector(".play-btn");
      let pause_btn = document.querySelector(".pa");
      const first = document.querySelectorAll(".container_mus");
      const cov = document.querySelectorAll(".pass");
      let playing = true;
      let songs = document.querySelectorAll("[data-file]");
      let u = c.getAttribute("data-file");
      let nu;

      // PLAYBAR FUNCTIONALITY
      c.addEventListener("timeupdate", updateProgress);
      c.onended = function () {
        play_btn.style.display = "block";
        pause_btn.style.display = "none";
        c.duration = 0;
        next();
      };
      console.log(cov.length);
      function updateProgress() {
        //progress bar
        // let progress = document.querySelectorAll(".progress");
        var progress = $(".progress");

        //song position @ zero
        let value = 0;
        if (c.duration == "Infinity") {
          //song is infinite in length
          value = 100;
        } else if (c.currentTime > 0) {
          //songs current time is past 0
          value = Math.floor((100 / c.duration) * c.currentTime);
        }
        // animate every 5seconds
        progress.stop().animate({ width: value + "%" }, 500);
        //display timestamp
        document.querySelector("#time").innerHTML = formatTime(c.currentTime); //set the new timestamp
        document.querySelector("#total-time").innerHTML = formatTime(
          c.duration
        ); //set total timestamp
      }
      function formatTime(time) {
        //Change time formaT
        minutes = Math.floor(time / 60);
        minutes = minutes >= 10 ? minutes : "" + minutes;
        seconds = Math.floor(time % 60);
        seonds = time >= 10 ? seconds : "0" + seconds;
        return minutes + ":" + seconds;
      }
      for (let i = 0; i < like.length; i++) {
        like[i].onclick = function (e) {
          e.preventDefault();
          let p = e.target;
          let fn = p;
          let b = fn.getAttribute("data-file");
          u = b;
          console.log(b);
          let src = "../admin/uploads/" + b;
          console.log(src);
          let z = cov[i].getAttribute("src");
          console.log(z + "zedd" + cov[i]);

          console.log("b " + b);
          img.src = z;
          nu = fn.getAttribute("data-id");
          nu -= 1;
          console.log("nu " + nu);
          //PLAY
          c.setAttribute("data-id", nu);
          let m = c.getAttribute("src");
          console.log(m);
          console.log("c.src" + src);
          console.log("m.src" + m);
          //BOTTOM PLAYBAR LOGIC
          play_btn.style.display = "none";
          pause_btn.style.display = "block";

          play_btn.setAttribute("data-file", src);
          c.setAttribute("data-file", src);
          let catt = c.getAttribute("data-file");
          if (p) {
            console.log(p);
            like[i].src = "./images/pause.svg";
          }

          //PLAYING FUNCTIONALITY
          // src=current music playing
          if (src == m && playing) {
            like[i].src = "./images/pause.svg";
            play_btn.style.display = "none";
            pause_btn.style.display = "block";
            playing = false;
            c.play();
            console.log("current" + src);
          } else if (playing == false && src == m) {
            like[i].src = "./images/play.svg";
            play_btn.style.display = "block";
            pause_btn.style.display = "none";
            playing = true;
            c.pause();
          }
          // to play a new track and disrupt the former current track
          else if (src != m) {
            like[i].src = "./images/pause.svg";
            console.log("oldtrack: " + m);
            console.log("newtrack: " + src);
            c.setAttribute("src", src);
            c.setAttribute("data-file", u);
            playing = false;
            c.play();
            console.log(c.src + "ry");
          }
          if (catt != b) {
            // like[i].src = "./images/pause.svg";
            // alert("trf")
          }
        };
      }
      pause_btn.onclick = function (e) {
        e.preventDefault();
        c.pause();
        play_btn.style.display = "block";
        pause_btn.style.display = "none";
        playing = true;
      };
      play_btn.onclick = function (e) {
        e.preventDefault();
        let a = play_btn.getAttribute("data-file");
        let m = c.getAttribute("src");
        console.log(m + "pl");
        console.log(a);
        if (a == m) {
          c.play();
          playing = false;
          pause_btn.style.display = "block";
          play_btn.style.display = "none";
        } else {
          alert("no track yet");
          // c.play();
          // $(".pa").css("display", "block");
          // $(".play-btn").css("display", "none");
        }
      };

      console.log(first.length);
      //HOVER
      for (let i = 0; i < first.length; i++) {
        first[i].onmouseenter = function () {
          like_play[i].style.transition = "all 0.8s ease-in";
          let heart = like[i].getAttribute("data-file");
          let m = c.getAttribute("src");
          console.log("yr");
          let g = "../admin/uploads/" + heart;

          like[i].style.display = "block";

          like_play[i].style.display = "block";
          if (m != g) {
            like[i].src = "./images/play.svg";
          } else if (c.paused && m == g) {
            like[i].src = "./images/play.svg";
          } else {
            like[i].src = "./images/pause.svg";
          }
        };
        first[i].onmouseleave = function () {
          let heart = like[i].getAttribute("data-file");
          let m = c.getAttribute("src");
          let g = "../admin/uploads/" + heart;
          // if (!c.paused && m == g) {
          //   bass[i].style.display = "block";
          // }
          //  else  {
          //   bass[i].style.display = "none";
          // }
          like_play[i].style.display = "none";
          // if (bass[i].src == `./images/pause.svg`) {
          //   console.log("jd");
        };
      }
      //////LIKE FUNCTIONALITY
      var btn;
      $(".af").on("click", function () {
        var music_id = $(this).data("id");
        // console.log("inside vagina " + music_id);

        $clicked_btn = $(this);
        console.log($clicked_btn);
        if ($clicked_btn.hasClass("heart-inactive")) {
          action = "like";
          // alert("dollar");

          alert("Track has been added to your likes");
        } else if ($clicked_btn.hasClass("heart-active")) {
          action = "unlike";
          alert("Track has been removed from your likes");
        }
        $.ajax({
          url: "./home.php",
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
      // const back = () => {
      //   alert("YO!! You must be logged in to do that ");
      //   window.location.href = "./login.php";
      // };
      //playlist
      let playlist = [];
      const retroArray = [...songs];
      console.log("ut " + songs);
      for (let i = 0; i < songs.length; i++) {
        let m = retroArray[i].getAttribute("data-file");
        playlist.push(m);
      }
      console.log(playlist);

      $(".next").click(next);
      $(".previous").click(prev);
      let n = -1;
      function next() {
        console.log("nu" + nu);
        // n++;
        // nu = n;
        // n = nu;
        // nu = n;
        console.log(n);

        if (n >= playlist.length) {
          n = 0;
        }
        pause_btn.style.display = "block";
        play_btn.style.display = "none";
        console.log(playlist[n]);

        // if (c.src == u) {
        //   // alert("us against whatever");
        //   n = 1;
        // }
        nu = c.getAttribute("data-id");
        // console.log(playlist.n);
        // n = playlist[n];
        // console.log("n" + n);

        // INCREAMENT DATAID
        // n++;

        if (playlist[n] == u) {
          // alert("us against whatever");
          n += 0;
          c.setAttribute("data-id", n);
        }
        if (n <= nu) {
          n = nu;
          console.log("n" + n);
          n++;
          // alert("us against whatever");
        } else {
          n = nu;
          n++;
        }
        let z = cov[n].getAttribute("src");

        // let z = cov[n].getAttribute("src");
        img.src = z;
        c.src = `../admin/uploads/` + playlist[n];
        let p = `../admin/uploads/` + playlist[n];
        // let y= c.getAttribute("data-file");
        if (c.paused) {
          c.setAttribute("data-file", p);
        }

        // console.log(n++);
        c.setAttribute("data-id", n);
        c.play();
        console.log("new" + nu);
      }
      // alert("red");
      function prev() {
        if (n < -1) {
          n = 0;
        }
        pause_btn.style.display = "block";
        play_btn.style.display = "none";
        nu = c.getAttribute("data-id");
        // if (playlist[n] == c.src) {
        // }
        if (playlist[n] == u) {
          // alert("us against whatever");
          n--;
        }
        if (playlist[n] == u) {
          // alert("us against whatever");
          n += 0;
          c.setAttribute("data-id", n);
        }
        if (n <= nu) {
          n = nu;
          console.log("n" + n);
          n--;
          // alert("us against whatever");
        } else {
          n = nu;
          n--;
        }
        let z = cov[n].getAttribute("src");
        img.src = z;
        let p = `../admin/uploads/` + playlist[n];
        c.src = `../admin/uploads/` + playlist[n];
        // console.log(n++);
        if (c.paused) {
          c.setAttribute("data-file", p);
        }
        c.setAttribute("data-id", n);

        c.play();
      }
    }
    if (location.hash === "#userUpload") {
      ///automatically scroll to top once page displays
      window.scroll(0, 0);
      // var x = document.querySelector(".btn-block");
      // x.onclick = function () {
      alert("et");
      // };
    }
  });
}

//Make Homepage default
if (!location.hash) {
  location.hash = "home";
}
console.log(location + " location");
alert("ed");
// let lip = document.querySelector("li");
// let r = lip.getAttribute("data-link");
let fragmentId = location.hash;
if (location.hash == fragmentId) {
  navigate();
}
window.addEventListener("hashchange", navigate);
///mae data-id=datafile on pause
