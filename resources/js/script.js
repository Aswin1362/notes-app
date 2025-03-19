document.addEventListener("DOMContentLoaded", function () {
    let notes = JSON.parse(document.querySelector("#notes-script").innerHTML);
    let notesPerPage = 10;
    let currentPage = 1;

    function renderNotes() {
        let start = (currentPage - 1) * notesPerPage;
        let end = start + notesPerPage;
        let paginatedNotes = notes.slice(start, end);

        let notesContainer = document.querySelector(".notes");
        notesContainer.innerHTML = "";

        paginatedNotes.forEach(note => {
            let noteDiv = document.createElement("div");
            noteDiv.classList.add('note');
            noteDiv.innerHTML = `<div class="note-body">${note.note.substring(0, 450)}...</div>`;
            notesContainer.appendChild(noteDiv);
        });
    }

    function pagination() {
        let totalPages = Math.ceil(notes.length / notesPerPage);
        let paginationDiv = document.querySelector(".pagination-container");

        if (!paginationDiv) {
            paginationDiv = document.createElement("div");
            paginationDiv.classList.add("pagination-container");
            document.querySelector(".app-container").appendChild(paginationDiv);
        }

        paginationDiv.innerHTML = "";

        let startPage = Math.max(1, currentPage - 2);
        let endPage = Math.min(totalPages, startPage + 4);

        if (currentPage > 1) {
            const previousBtn = document.createElement("button");
            previousBtn.innerText = "previous";
            previousBtn.addEventListener("click", function () {
                currentPage--;
                renderNotes();
                pagination();
            });
            paginationDiv.appendChild(previousBtn);
        }

        for (let i = startPage; i <= endPage; i++) {
            const pageBtn = document.createElement("button");
            if (i == currentPage) {
                pageBtn.style.fontWeight = "bold";
            }
            pageBtn.innerText = i;
            paginationDiv.appendChild(pageBtn);
        }

        if (currentPage < totalPages) {
            const nextButton = document.createElement("button");
            nextButton.innerText = "next";
            nextButton.addEventListener("click", function () {
                currentPage++;
                renderNotes();
                pagination();
            });
            paginationDiv.appendChild(nextButton);
        }
    }
    pagination();
    renderNotes();
});
