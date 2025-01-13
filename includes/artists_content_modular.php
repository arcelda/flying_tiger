<div class="container mt-3">
    <h2>The Artists</h2>
    <div class="card">
        <div class="card-body">

            <div class="add__artist">
                <button id="show-artist" data-artist-button>&#10009;</button>
            </div>
            <dialog>
                <div class="artist">
                    <div class="close-button">&times;</div>
                    <div class="artist__information">
                        <h2>Enter artist information</h2>
                        <div class="info-element artist__information-row1">
                            <div class="firstName first">
                                <label for="firstName">First Name: </label>
                                <input type="text" id="firstName" placeholder="First Name">                            
                            </div>

                            <div class="middleName middle">
                                <label for="middleName">Middle Name: </label>
                                <input type="text" id="middleName" placeholder="Middle Name">    
                            </div>

                            <div class="lastName last">
                                <label for="lastName">Last Name: </label>
                                <input type="text" id="lastName" placeholder="Last Name">    
                            </div>

                            <div class="artistEntryDate info-element">
                                <label for="artistEntryDate">Today's Date: </label>
                                <input type="date" name="artistEntryDate" id="artistEntryDate" birthday="artist__birthday">
                            </div>

                            <div class="artist__birthday info-element">
                                <label for="birthday">Date of Birth: </label>
                                <input type="date" name="birthday" id="birthday" birthday="artist__birthday">
                            </div>

                            <div class="artist__phone info-element">
                                <label for="phone">Phone Number: </label>
                                <input type="tel" name="phone" id="phone" class="artist__phone">
                            </div>
                        </div>

                        <div class="artist__information-row2">
                            <div class="artist__email info-element">
                                <label for="email" class="email">Email: </label>
                                <input type="email" name="email" id="email" class="artist__email">
                            </div>

                            <div class="artist__password info-element">
                                <label for="password" class="password">Password: </label>
                                <input type="password" name="password" id="artist__password">
                            </div>
                        </div>

                        <div class="artist__address info-element artist__information-row3">
                            <div>
                                <label for="address">Address: </label>
                                <input type="text" id="address" name="address" autocomplete="street-address"><br> 
                            </div>
                            <div>
                                <label for="city">City:</label>
                                <input type="text" id="city" name="city" autocomplete="address-level2"><br>
                            </div>
                            <div>
                                <label for="state">State:</label>
                                <input type="text" id="state" name="state" autocomplete="address-level1"><br>
                            </div>
                            <div>
                                <label for="zip">ZIP Code:</label>
                                <input type="text" id="zip" name="zip" autocomplete="postal-code"><br>
                            </div>
                        </div>

                        <div class="artist__work info-element artist__information-row4">
                            <div class="art top">
                                <label for="art1" class="art-label"><i class="fas fa-file-upload"></i> Upload File</label>
                                <input type="file" class="art-control" id="art1" name="art1" accept=".jpg,.jpeg,.png,.pdf">
                                <div>
                                    Enter first submission here.
                                </div>
                            </div>

                            <div class="art bottom">
                                <label for="art2" class="art-label"><i class="fas fa-file-upload"></i> Upload File</label>
                                <input type="file" class="art-control" id="art2" name="art2" accept=".jpg,.jpeg,.png,.pdf">
                                <div>
                                    Enter second submission here.
                                </div>
                            </div>
                        </div>

                        <div class="Submit info-element">
                            <button>Submit</button>
                        </div>

                        <div></div>
                    </div>
                </div>
            </dialog>
            

            <div id="artist_grid" class="artist_grid"></div>
        </div>
    </div>
</div>

