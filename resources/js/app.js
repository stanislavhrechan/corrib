import './bootstrap';

let lastScroll = 0;
const header = document.getElementById('main-header');

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;

    if (currentScroll <= 0) {
        header.classList.remove('header-hidden', 'header-scrolled');
        return;
    }

    if (currentScroll > lastScroll) {
        header.classList.add('header-hidden');
    } 
    else {
        header.classList.remove('header-hidden');
        header.classList.add('header-scrolled');
    }

    lastScroll = currentScroll;
});


 // HARMONOGRAM CODE WITH ITEMS AND LINES
      gsap.from(".timeline-item", {
        scrollTrigger: {
          trigger: ".timeline-item",
          start: "top 90%",
        },
        opacity: 0,
        y: 10,
        duration: 0.8,
        stagger: 0.2,
        ease: "power3.out"
      });

      gsap.to(".md\\:hidden .timeline-progress", {
        scrollTrigger: {
          trigger: ".md\\:hidden",
          start: "top 90%",
        },
        height: "100%",
        duration: 1.2,
        ease: "power2.out"
      });
      

      gsap.from(".finance-item", {
        scrollTrigger: {
          trigger: ".finance-item",
          start: "top 85%",
        },
        opacity: 0,
        y: 40,
        duration: 0.8,
        stagger: 0.2,
        ease: "power2.out"
      });