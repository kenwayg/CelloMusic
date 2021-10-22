import AbstractView from "./AbstractView.js";

export default class extends AbstractView {
  constructor() {
    super();
    this.setTitle("Profile");
  }
  async getHtml() {
    let myPromise = new Promise(function (romeo, juliet) {
      let xhr = new XMLHttpRequest();
      xhr.open("GET", "http://localhost/cello/cello_store/profile.php");
      xhr.onload = function () {
        // console.log(xhr.responseText);

        if (xhr.status == 200) {
          romeo(xhr.response);
        } else {
          juliet(xhr.status);
        }
      };
      xhr.send();
    });
    return myPromise;
  }
}
