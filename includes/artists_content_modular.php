<div class="container mt-3">
    <h2>The Artists</h2>
    <div class="card">
        <div class="card-body">
            <input type="file" id="imageUploader" multiple accept="image/*">
            <button class="add-artist" data-artist-button>&#10009;</button>

            <div class="artist">
                <div class="close-button">&times;</div>
                <div class="artist__information">
                    <h2>Enter artist information</h2>
                    <div class="artist__name info-element">
                        <div class="firstName top">
                            <label for="firstName">First Name: </label><br>
                            <input type="text" id="firstName" placeholder="First Name">                            
                        </div>
                        <div class="lastName bottom">
                            <label for="lastName">Last Name: </label><br>
                            <input type="text" id="firstName" placeholder="Last Name">    
                        </div>
                    </div>

                    <div class="artist__phone info-element">
                        <label for="phone">Phone Number: </label><br>
                        <input type="tel" name="phone" id="phone">
                    </div>

                    <div class="artist__address info-element">
                        <label for="address">Address: </label><br>
                        <input type="text" id="address" name="address" autocomplete="street-address"><br>
                        <label for="city">City:</label><br>
                        <input type="text" id="city" name="city" autocomplete="address-level2"><br>
                        <label for="state">State:</label><br>
                        <input type="text" id="state" name="state" autocomplete="address-level1"><br>
                        <label for="zip">ZIP Code:</label><br>
                        <input type="text" id="zip" name="zip" autocomplete="postal-code"><br>
                    </div>

                    <div class="Submit info-element">
                        <button>Submit</button>
                    </div>

                    <div></div>
                </div>
            </div>

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
</script>

<script>
    const add_artist_button = document.querySelectorAll("[data-artist-button]");
    const imageUploader = document.getElementById('imageUploader');

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
    });
</script>
