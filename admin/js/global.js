(function () {
  "use strict";
  var dropZone = document.querySelector("#drop-zone");
  var barfill = document.querySelector("#bar-fill");
  var barfilltext = document.querySelector("#bar-fill-text");
  var uploadsFinished = document.querySelector("#uploads-finished");

  var startUpload = function (files) {
    app.uploader({
      files: files,
      progressBar: barfill,
      progressText: barfilltext,
      processor: "up.php",

      finished: function (data) {
        var x;
        var uploadedElement;
        var uploadedAnchor;
        var uploadedStatus;
        var currFile;

        for (x = 0; x < data.length; x = x + 1) {
          currFile = data[x];

          uploadedElement = document.createElement("div");
          uploadedElement.className = "upload-console-upload";

          uploadedAnchor = document.createElement("a");
          uploadedAnchor.textContent = currFile.name;

          if (currFile.uploaded) {
            uploadedAnchor.href = "uploads/" + currFile.file;
          }

          uploadedStatus = document.createElement("span");
          uploadedStatus.textContent = currFile.uploaded
            ? "uploaded"
            : "failed";

          uploadedElement.appendChild(uploadedAnchor);
          uploadedElement.appendChild(uploadedStatus);

          uploadsFinished.appendChild(uploadedElement);
        }

        uploadsFinished.className = "";
      },

      error: function () {
        console.log("There was an error");
      },
    });
  };

  // Standard form upload
  document
    .querySelector("#standard-upload")
    .addEventListener("click", function (ev) {
      var standardUploadFiles = document.getElementById("standard-upload-file")
        .files;
      ev.preventDefault();
      startUpload(standardUploadFiles);
    });
  //Drop functionality
  dropZone.ondrop = function (e) {
    e.preventDefault();
    this.className = "upload-console-drop ";
    startUpload(e.dataTransfer.files);
  };
  dropZone.ondragover = function () {
    this.className = "upload-console-drop drop";
    return false;
  };
  dropZone.ondragleave = function () {
    this.className = "upload-console-drop ";
    return false;
  };
})();
