require('./bootstrap');
require('alpinejs');


const closeAlertButton = document.getElementById("closeAlertButton");

function closeAlert(e) {
    let element = e.target;
    while(element.nodeName !== "BUTTON"){
        element = element.parentNode;
    }
    element.parentNode.parentNode.removeChild(element.parentNode);
}

if (closeAlertButton) {
    closeAlertButton.addEventListener("click", closeAlert);
}
