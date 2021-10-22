const express = require("express");
const path = require("path");

const app = express();

app.use(
  "/static",
  express.static(path.resolve(__dirname, "cello_store", "static"))
);

app.get("/*", (req, res) => {
  res.sendFile(path.resolve(__dirname, "cello_store", "index.html"));
});
app.listen(process.env.PORT || 5500, () => console.log("Server running....."));
