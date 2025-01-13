<header>
    <div class="navbar" id="nav">
        <div>
            <img class="logo" src="images\flyingTigerLogo-removebg.png" alt="logo">
        </div>
        <div class="banner">
            <a href="home.php">The Flying Tiger</a>
        </div>
        <div id="toggle_btn" class="toggle_btn">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>

    <div id="dropdown_menu" class="dropdown_menu">
        <a href="home.php">
            <li>Home</li>
        </a>
        <a href="https://jinxprooftattoos.com/" target="_blank">
            <li>Jinx Proof Tattoos</li>
        </a>
        <a href="artists.php">
            <li>The Artists</li>
        </a>
        <a href="https://www.instagram.com/flyingtigernewbritain/" target="_blank">
            <li>Instagram</li>
        </a>
        <a href="contact.php">
            <li>Contact Us</li>
        </a>
        <li class="signin">Log In</li>
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

    document.addEventListener('click', (event) => {
        if(!dropDownMenu.contains(event.target) && !toggleBtn.contains(event.target)){
            if(dropDownMenu.classList.contains('open')){
                dropDownMenu.classList.toggle('open');
                toggleBtnIcon.classList = 'fa-solid fa-bars';
            }
        }
    })
</script>