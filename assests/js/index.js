function toggleDropdown() {
    var dropdown = document.getElementById('dropdownContent');
    dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
}

// Close the dropdown if the user clicks outside of it
window.addEventListener('click', function(event) {
    var dropdown = document.getElementById('dropdownContent');
    var profileImage = document.getElementById('profileImage');
    if (event.target !== dropdown && event.target !== profileImage) {
        dropdown.style.display = 'none';
    }
});
// second function-membership hover div

let div1 = document.getElementById('div1');
let div2 = document.getElementById('div2');
let div3 = document.getElementById('div3');

div2.addEventListener('mouseover', (event) => {
    if (event.target.tagName === 'LI' && event.target === event.target.parentNode.firstElementChild) {
        let li = div1.getElementsByTagName('li');
        for (let i = 0; i < li.length; i++) {
            li[i].classList.add('highlight');
        }
    }
});

div2.addEventListener('mouseout', () => {
    let li = div1.getElementsByTagName('li');
    for (let i = 0; i < li.length; i++) {
        li[i].classList.remove('highlight');
    }
});

div3.addEventListener('mouseover', (event) => {
    if (event.target.tagName === 'LI' && event.target === event.target.parentNode.firstElementChild) {
        let li = div2.getElementsByTagName('li');
        for (let i = 0; i < li.length; i++) {
            li[i].classList.add('highlight');
        }
    }
});

div3.addEventListener('mouseout', () => {
    let li = div2.getElementsByTagName('li');
    for (let i = 0; i < li.length; i++) {
        li[i].classList.remove('highlight');
    }
});

// schedule filter 
$('.schedule-filter li').on('click', function() {
    var tsfilter = $(this).data('tsfilter');
    $('.schedule-filter li').removeClass('active');
    $(this).addClass('active');
    if (tsfilter == 'all') {
        $('.schedule-table').removeClass('filtering');
        $('.ts-item').removeClass('show');
    } else {
        $('.schedule-table').addClass('filtering');
    }
    $('.ts-item').each(function() {
        $(this).removeClass('show');
        if ($(this).data('tsmeta') == tsfilter) {
            $(this).addClass('show');
        }
    });
});


