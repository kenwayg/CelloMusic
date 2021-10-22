import Home from "./views/Home.js";
import Profile from "./views/Profile.js";

const navigateTo = (url) => {
  history.pushState(null, null, url);
  router();
};

const router = async () => {
  const routes = [
    {
      path: "/cello/cello_store/",
      view: Home,
    },
    {
      path: "/cello/cello_store/profile.php",
      view: Profile,
    },
  ];
  const potentialMatches = routes.map((route) => {
    return {
      route: route,
      isMatch: location.pathname === route.path,
    };
  });

  let match = potentialMatches.find((potentialMatch) => potentialMatch.isMatch);

  if (!match) {
    match = {
      route: routes[0],
      isMatch: true,
    };
  }
  const view = new match.route.view();
  document.querySelector("#app").innerHTML = await view.getHtml();
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
  x.onclick = function () {
    alert("ede");
  };
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
};
window.addEventListener("popstate", router);

document.addEventListener("DOMContentLoaded", () => {
  document.body.addEventListener("click", (e) => {
    // e.preventDefault();

    // navigateTo(e.target.href);
    if (e.target.matches("[data-link]")) {
      e.preventDefault();

      navigateTo(e.target.href);
    }
  });

  router();
});
