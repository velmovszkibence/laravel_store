
const products = document.querySelectorAll('.product')
const nav_items = document.querySelectorAll('.nav-item')
const menu_btn = document.getElementById('menu-btn')
const flash_msg = document.querySelectorAll('.flash-msg')

products.forEach(function(item) {
    item.addEventListener('mouseenter', function() {
        item.lastElementChild.style.display = 'block'
    })
    item.addEventListener('mouseleave', function() {
        item.lastElementChild.style.display = 'none'
    })
})

// document.addEventListener('DOMContentLoaded', function() {
//     const success = document.getElementById('success-message')
//     if(success != null) {
//         setTimeout(function() {
//             success.classList.add('hidden')
//         }, 5000)
//     }
// })

nav_items.forEach(function(item) {
    item.addEventListener('mouseenter', function() {
        item.classList.add('border-b-2', 'border-white')
    })
    item.addEventListener('mouseleave', function() {
        item.classList.remove('border-b-2', 'border-white')
    })
})

// Menu show/hide with scroll top
menu_btn.addEventListener('click', function() {
    const navbar = document.getElementById('navbar')
    if(navbar.classList.contains('hidden')) {
        menu_btn.classList.add('bg-blue-600')
        window.scrollTo({top: 0, behavior: 'smooth'})
        navbar.classList.remove('hidden')
    } else {
        navbar.classList.add('hidden')
        menu_btn.classList.remove('bg-blue-600')
    }
})


if(flash_msg.length > 0) {
    setTimeout(() => {
        flash_msg[0].style.opacity = '0'
        flash_msg[0].addEventListener('transitionend', () => flash_msg[0].remove())
    }, 4000)
}
