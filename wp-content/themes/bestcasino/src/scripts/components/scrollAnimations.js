import animateOnScroll from "../utils/animateOnScroll";

const scrollAnimations = () => {
    function handleAnimation() {
        animateOnScroll('.js-section');
    }

    $(window).on('scroll', () => {
        handleAnimation();
    })
    // $(window).trigger('scroll')
    handleAnimation();
}

export default scrollAnimations;