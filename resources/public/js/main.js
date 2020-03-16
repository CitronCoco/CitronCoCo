var turns = 0;
var player = 1;
var cards = document.getElementsByClassName('card');
var pioche = document.getElementById('pioche');

window.addEventListener('load',function () {
    // console.log(cards);
    Array.from(cards).forEach(function (element) {
        element.addEventListener('click',function () {
            if (element.dataset.flipable === "true") {
                console.log(element.dataset.flipable);
                element.classList.add("flipped");
                element.dataset.flipable = false
            }else {
                element.classList.remove("flipped");
                element.dataset.flipable = true;
            }
        })
    });

    pioche.addEventListener('click',function () {
        Array.from(cards).forEach(function (element) {
            console.log(element.parentElement);
            // console.log(cards);
        });
    })

});


