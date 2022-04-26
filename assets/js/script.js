
const animElems = document.querySelectorAll(".animation");
if (animElems.length > 0) {
    for (let i = 0; i < animElems.length; i++) {
        const animItem = animElems[i];
        animItem.classList.toggle("active");
    }
}

function openForm() {
    document.getElementById("form").classList.toggle("active");
}
function closeForm() {
    document.getElementById("form").classList.remove("active");
}