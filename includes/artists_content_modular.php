<div class="container mt-3">
    <h2>The Artists</h2>
    <div class="card">
        <div class="card-body">
            <button class="add-artist" data-artist-button>&#10009;</button>
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

        grid.appendChild(cell); // Append the cell to the grid
    }

    // Create image elements
    const img1 = document.createElement('img');
    img1.src = 'carousel/jason.png';
    img1.className = 'test';
    img1.alt = 'Jason';

    const img2 = document.createElement('img');
    img2.src = 'carousel/nick.png';
    img2.className = 'test';
    img2.alt = 'Johnny';

    // Add two images to the same cell
    addCell(img1, img2);
</script>


<script>
    let index = 1;
    const add_artist_button = document.querySelectorAll("[data-artist-button]");
    add_artist_button.forEach(addButton => {
        addButton.addEventListener("click", () => {
            addCell('Cell' . index);
            index++;
        });
    });
</script>
