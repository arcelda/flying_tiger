<header>
    <div class="navbar" id="nav">
        <div>
            <img class="logo" src="images\flyingTigerLogo-removebg.png" alt="logo">
        </div>
        <div class="banner">
            <a href="home.php">The Flying Tiger</a>
        </div>
        <div class="toggle_btn">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>

    <div class="dropdown_menu">
        <li><a href="home.php">Home</a></li>
        <li><a href="https://jinxprooftattoos.com/" target="_blank">Jinx Proof Tattoos</a></li>
        <li><a href="artists.php">The Artists</a></li>
        <li><a href="https://www.instagram.com/flyingtigernewbritain/" target="_blank">Instagram</a></li>
        <li><a href="contact.php">Contact Us</a></li>
    </div>
</header>

<script>
    const toggleBtn = document.querySelector('.toggle_btn')
    const toggleBtnIcon = document.querySelector('.toggle_btn i')
    const dropDownMenu = document.querySelector('.dropdown_menu')

    toggleBtn.onclick = function(){
        dropDownMenu.classList.toggle('open')
        const isOpen = dropDownMenu.classList.contains('open')

        toggleBtnIcon.classList = isOpen
            ? 'fa-solid fa-xmark'
            : 'fa-solid fa-bars'
    }
</script>