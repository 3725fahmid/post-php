// // Hide File While Upload
// const inputFileBtn = document.getElementById('addInputFile');
// const fileInputArea = document.getElementById('fileInputArea');

// inputFileBtn.addEventListener('click', () => {
//     var input = document.createElement("INPUT");
//     var div = document.createElement("div");
//     var cancelBtn = document.createElement("i");
//     var privacy = document.createElement("button");

//     input.setAttribute("type", "file");
//     input.setAttribute("name", "files[]");
//     // div.setAttribute("class", "mb-2 d-flex gap-2");
//     div.classList.add("class", "mb-2", "d-flex", "align-items-center", "gap-2");

//     // cancelBtn.textContent = "Cancel";
//     cancelBtn.classList.add("ri-delete-bin-line", "fs-2");
//     privacy.textContent = "Hide";
//     cancelBtn.addEventListener("click", function () {
//         div.remove();
//     });

//     privacy.addEventListener("click", function () {
//         event.preventDefault();
//         if (input.getAttribute('name') == "files[]") {
//             input.setAttribute("name", "hiddenFiles[]");
//             privacy.textContent = "Show";
//         }
//         else {
//             privacy.textContent = "Hide";
//             input.setAttribute("name", "files[]");
//         }
//     });

//     fileInputArea.appendChild(div);
//     div.appendChild(input);
//     div.appendChild(cancelBtn);
//     div.appendChild(privacy);
// });


const inputFileBtn = document.getElementById('addInputFile');
const fileInputArea = document.getElementById('fileInputArea');

inputFileBtn.addEventListener('click', () => {
    var input = document.createElement("INPUT");
    var div = document.createElement("div");
    var cancelBtn = document.createElement("i");

    input.setAttribute("type", "file");
    input.setAttribute("name", "files[]");
    // div.setAttribute("class", "mb-2 d-flex gap-2");
    div.classList.add("class", "mb-2", "d-flex", "align-items-center", "gap-2");

    // cancelBtn.textContent = "Cancel";
    cancelBtn.classList.add("ri-delete-bin-line", "fs-2", "text-danger");
    cancelBtn.addEventListener("click", function () {
        div.remove();
    });

    fileInputArea.appendChild(div);
    div.appendChild(input);
    div.appendChild(cancelBtn);
});

const hiddenFileStatus = document.querySelectorAll('.hiddenFileStatus');

hiddenFileStatus.forEach((item)=>{
    item.addEventListener('click', ()=>{
        if (item.getAttribute('status') == 'false') {
            item.setAttribute('status', 'true');
            item.children[0].classList.add('ri-eye-off-line');
            item.children[0].classList.remove('ri-eye-line');
            item.children[1].setAttribute('name', 'privacy[]');
        }
        else {
            item.setAttribute('status', 'false');
            item.children[0].classList.remove('ri-eye-off-line');
            item.children[0].classList.add('ri-eye-line');
            item.children[1].setAttribute('name', 'show[]');
        }
    });
})
