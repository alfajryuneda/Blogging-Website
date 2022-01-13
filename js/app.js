const signUpButton = document.getElementById("signUp");
const signInButton = document.getElementById("signIn");
const container = document.getElementById("container");

signUpButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

signInButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});

let jumlahError = 1;

function tempAlert(msg, duration) {
  var el = document.createElement("div");
  el.setAttribute("style", "position:absolute;margin: auto;z-index: 100;");
  var p = document.createElement("p");
  p.innerHTML = msg;
  p.classList.add("abc");
  var DIV = document.createElement("div");
  DIV.appendChild(p);
  DIV.classList.add("warn");
  el.appendChild(DIV);
  setTimeout(function () {
    el.parentNode.removeChild(el);
  }, duration);
  document.body.appendChild(el);
}

// JavaScript Document
function logout() {
  var yakin = confirm("Apakah Kamu Yakin Ingin Keluar?");
  if (yakin) {
    document.write("Anda Berhasil Keluar");
    window.location = "index.html";
  } else {
    document.write("Baiklah, Stay Here Please :)");
    window.location = "home.html";
  }
}
