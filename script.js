/**
 * This is for the carousel on the home page
 */

const buttons = document.querySelectorAll("[data-carousel-button]");
const carousels = document.querySelectorAll("[data-carousel]");

carousels.forEach(carousel => {
    const slides = carousel.querySelector("[data-slides]");
    let autoSlideInterval = null;

    const moveToSlide = (offset) => {
        const activeSlide = slides.querySelector("[data-active]");
        let newIndex = [...slides.children].indexOf(activeSlide) + offset;

        if (newIndex < 0) newIndex = slides.children.length - 1;
        if (newIndex >= slides.children.length) newIndex = 0;

        slides.children[newIndex].dataset.active = true;
        delete activeSlide.dataset.active;
    };

    buttons.forEach(button => {
        button.addEventListener("click", () => {
            const offset = button.dataset.carouselButton === "next" ? 1 : -1;
            moveToSlide(offset);
        });
    });

    const startAutoSlide = () => {
        autoSlideInterval = setInterval(() => moveToSlide(1), 3000); // Change every 3 seconds
    };

    const stopAutoSlide = () => {
        clearInterval(autoSlideInterval);
    };

    // Start auto-slide when page loads
    startAutoSlide();

    // Pause auto-slide on button hover
    buttons.forEach(button => {
        button.addEventListener("mouseenter", stopAutoSlide);
        button.addEventListener("mouseleave", startAutoSlide);
    });

    // Pause auto-slide on carousel hover
    carousel.addEventListener("mouseenter", stopAutoSlide);
    carousel.addEventListener("mouseleave", startAutoSlide);
});


/*
        This is for the artist entry form on the artist_modular page that makes
    the form pop in and out
*/

/**
 * This is for all of the script for the add artist button on the artist_modular page
 */


function addCell(content1, content2) {
    const grid = document.getElementById('artist_grid');
    const cell = document.createElement('div');
    cell.className = 'grid-cell';

    const appendContent = (content) => {
        if (content instanceof HTMLElement) {
            cell.appendChild(content);
        } else {
            const textNode = document.createTextNode(content);
            cell.appendChild(textNode);
        }
    };

    appendContent(content1);
    if (content2) appendContent(content2);

    // Add a delete button to the cell
    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.style.marginTop = '10px';
    deleteButton.addEventListener('click', () => {
        cell.remove(); // Remove the cell from the DOM
        saveGridState(); // Update localStorage
    });
    cell.appendChild(deleteButton);

    grid.appendChild(cell); // Append the cell to the grid
    saveGridState();
}

/**
 * This is to save/load the grid so it doesn't disappear when refreshing the page
 */
function saveGridState() {
    const grid = document.getElementById('artist_grid');
    const cells = Array.from(grid.children).map(cell => {
        const clonedCell = cell.cloneNode(true); // Clone the cell
        const deleteButton = clonedCell.querySelector('button');
        if (deleteButton) clonedCell.removeChild(deleteButton); // Remove the delete button
        return clonedCell.innerHTML; // Save the remaining content
    });
    localStorage.setItem('artistGrid', JSON.stringify(cells));
}

function loadGridState() {
    const gridState = JSON.parse(localStorage.getItem('artistGrid') || '[]');
    gridState.forEach(content => {
        const cell = document.createElement('div');
        cell.className = 'grid-cell';
        cell.innerHTML = content;

        // Add a delete button back
        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Delete';
        deleteButton.style.marginTop = '10px';
        deleteButton.addEventListener('click', () => {
            cell.remove(); // Remove the cell from the DOM
            saveGridState(); // Update localStorage
        });
        cell.appendChild(deleteButton);

        document.getElementById('artist_grid').appendChild(cell);
    });
}

document.addEventListener('DOMContentLoaded', () => {
    loadGridState();
});


const add_artist_button = document.querySelectorAll("[data-artist-button]");
const imageUploader = document.getElementById('imageUploader');
const artist_dialog = document.querySelector('dialog');

document.querySelector("#show-artist").addEventListener("click", function(){
    artist_dialog.showModal();
});

document.querySelector(".artist .close-button").addEventListener("click", function(){
    artist_dialog.close();
});

artist_dialog.addEventListener('click', (event) => {
    if(event.target == artist_dialog){
        artist_dialog.close();
    }
});

/*
add_artist_button.forEach(addButton => {
    addButton.addEventListener("click", () => {
        const files = imageUploader.files;

        if (files.length === 0) {
            alert("Please select one or more images to upload.");
            return;
        }

        Array.from(files).forEach(file => {
            const reader = new FileReader();

            reader.onload = function(event) {
                const img = document.createElement('img');
                img.src = event.target.result; // Set the image source to the file's data
                img.className = 'test';
                img.alt = file.name;

                addCell(img); // Add the uploaded image to the grid
            };

            reader.readAsDataURL(file); // Read the file as a data URL
        });

        imageUploader.value = ""; // Reset the file input after uploading
    });
});*/

