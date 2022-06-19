const delButtons = document.querySelectorAll(".fa-trash");

function delProject() {
    const del = this;
    const container = del.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");

    fetch(`/deleteProject/${id}`);
    alert("Advertisement has been deleted");
    window.location.reload(true);

}

delButtons.forEach(button  => button.addEventListener("click",delProject));