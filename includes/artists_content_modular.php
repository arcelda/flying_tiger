<div class="container mt-3">
    <h2>The Artists</h2>
    <div class="card">
        <div class="card-body">
            <button class="add-artist" data-artist-button>&#10009;</button>
            <button class="delete-artist" data-delete-artist-button>&#10009;</button>
            <div id="artist_grid" class="artist_grid"></div>
        </div>
    </div>
</div>

<script>
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
        const savedGrid = localStorage.getItem('artistGrid');
        if (savedGrid) {
            const grid = document.getElementById('artist_grid');
            const cells = JSON.parse(savedGrid);
            cells.forEach(cellContent => {
                const cell = document.createElement('div');
                cell.className = 'grid-cell';
                cell.innerHTML = cellContent;
                grid.appendChild(cell);
            });
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        loadGridState();
    });

    // Create image elements
    /*const img1 = document.createElement('img');
    img1.src = '/carousel/jason.png';
    img1.className = 'test';
    img1.alt = 'Jason';

    const img2 = document.createElement('img');
    img2.src = '/carousel/nick.png';
    img2.className = 'test';
    img2.alt = 'Johnny';

    // Add two images to the same cell
    addCell(img1, img2);*/
</script>

<script>
    function deleteCell(index) {
        const grid = document.getElementById('artist_grid');
        const cells = Array.from(grid.children);

        if (index >= 0 && index < cells.length) {
            grid.removeChild(cells[index]); // Remove the cell from the DOM
            saveGridState(); // Update localStorage to reflect the new grid
        } else {
            console.warn("Invalid index. No cell deleted.");
        }
    }

</script>


<script>
    let index = 1;
    const add_artist_button = document.querySelectorAll("[data-artist-button]");
    add_artist_button.forEach(addButton => {
        addButton.addEventListener("click", () => {
            const img3 = document.createElement('img');
            img3.src = '/carousel/martin.png';
            img3.className = 'test';
            img3.alt = 'Nick';

            const img4 = document.createElement('img');
            img4.src = '/carousel/scott.png';
            img4.className = 'test';
            img4.alt = 'Scott';            


            addCell(img3, img4);
            index++;
        });
    });
</script>
