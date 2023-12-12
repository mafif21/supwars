import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

const search = document.querySelector("#menu-search");
const cards = document.querySelectorAll(".card");

search.addEventListener("input", function () {
    const userInput = search.value;

    for (let i = 0; i < cards.length; i++) {
        const cardValue = cards[i].querySelector("#nama_barang");

        if (cardValue.innerText.toLocaleLowerCase().indexOf(userInput) > -1) {
            cards[i].classList.remove("hidden");
        } else {
            cards[i].classList.add("hidden");
        }
    }
});
