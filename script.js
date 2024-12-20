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
