jQuery(document).ready(function($) {
    // Click event for FAQ questions
    $('.faq-question').on('click', function() {
        $(this).next('.faq-answer').slideToggle();
        const toggleBtn = $(this).nextAll('.faq-toggle-btn');
        toggleBtn.text(toggleBtn.text() === 'Open Answer' ? 'Close Answer' : 'Open Answer');
    });

    // Click event for the toggle button
    $('.faq-toggle-btn').on('click', function() {
        const answer = $(this).prev('.faq-answer');
        answer.slideToggle();
        $(this).text($(this).text() === 'Open Answer' ? 'Close Answer' : 'Open Answer');
    });
    console.log('FAQ widget loaded');
});


// const button = document.querySelectorAll('.faq-question');
// const answer = document.querySelectorAll('.faq-answer');

// button.addEventListener('click', () => {
//     answer.style.display = 'block';
//     console.log('clicked');
// });