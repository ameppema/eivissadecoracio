const slides = document.querySelectorAll(".slide");
const next = document.querySelector("#next");
const prev = document.querySelector("#prev");
const auto = false;
const intervalTime = 5000;
let slideInterval;

const images = document.querySelectorAll(".slider");

console.log(images[0].firstChild.innerHTML);
