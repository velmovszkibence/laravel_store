
const tabs = document.querySelectorAll('.tabs')
const tab = document.querySelectorAll('.tab')
const panel = document.querySelectorAll('.tab-content')
const pagination = document.getElementsByClassName('tailwind-pagination')[0]
const product_img_input_f = document.getElementById('product-image-f')
const product_img_input_s = document.getElementById('product-image-s')
const product_img_input_t = document.getElementById('product-image-t')
const product_image_src_f = document.getElementById('product-image-src-f')
const product_image_src_s = document.getElementById('product-image-src-s')
const product_image_src_t = document.getElementById('product-image-src-t')
const menu_btn = document.getElementById('menu-btn')
const order_options = document.querySelectorAll('.order-options')
const flash_msg = document.querySelectorAll('.flash-msg')
const delete_category = document.querySelectorAll('.delete-category')

var clickedBtn = null;

function onTabClick(event) {

  // Deactivate existing active tabs and panel
  if(pagination != null) {
    pagination.classList.remove("hidden")
  }

  for (let i = 0; i < tab.length; i++) {
    tab[i].classList.remove("text-blue-500", "border-b-2", "border-blue-500", "active")
  }

  for (let i = 0; i < panel.length; i++) {
    panel[i].classList.remove("active")
  }

  // Activate new tabs and panel
  event.target.classList.add("text-blue-500", "border-b-2", "border-blue-500", "active")
  let classString = event.target.getAttribute('data-target')
  if(classString == 'panel-2'){
    pagination.classList.add('hidden')
  }
  document.getElementById('panels').getElementsByClassName(classString)[0].classList.add("active")
}

for (let i = 0; i < tab.length; i++) {
  tab[i].addEventListener('click', onTabClick, false)
}

// Image preview
if(product_img_input_f != null) {
    product_img_input_f.addEventListener('change', function() {
        readURL(this)
    })
}

if(product_img_input_s != null) {
    product_img_input_s.addEventListener('change', function() {
        readURL(this)
    })
}

if(product_img_input_t != null) {
    product_img_input_t.addEventListener('change', function() {
        readURL(this)
    })
}

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader()
        if(input == product_img_input_f ) {
            reader.onload = function (e) {
                product_image_src_f.setAttribute('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0])
        }
        else if(input == product_img_input_s){
            reader.onload = function (e) {
                product_image_src_s.setAttribute('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0])
        } else if(input == product_img_input_t) {
            reader.onload = function (e) {
                product_image_src_t.setAttribute('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0])
        }

    }
}

// Menu show/hide with scroll top
menu_btn.addEventListener('click', function() {
  const sidebar = document.getElementById('sidebar')
    if(sidebar.classList.contains('hidden')) {
        menu_btn.classList.add('bg-blue-600')
        window.scrollTo({top: 0, behavior: 'smooth'})
        sidebar.classList.remove('hidden')
    } else {
        sidebar.classList.add('hidden')
        menu_btn.classList.remove('bg-blue-600')
    }
})

// Order page change status with buttons
order_options.forEach(function(button) {
    button.addEventListener('click', function(e) {
        e.preventDefault()

        if(clickedBtn != null) {
            clickedBtn.nextElementSibling.classList.add('hidden')
            clickedBtn.classList.remove('z-20')
        }
        if(clickedBtn == button) {
            clickedBtn.nextElementSibling.classList.add('hidden')
            clickedBtn = null
        } else {
            clickedBtn = button

            toggleStatusBtn(clickedBtn)
            toggleStatusBar(clickedBtn.nextElementSibling)
        }

    })
})

function toggleStatusBtn(btn) {
    if(btn.classList.contains('z-20')) {
        btn.classList.remove('z-20')
    } else {
        btn.classList.add('z-20')
    }
}

function toggleStatusBar(btn) {
    if(btn.classList.contains('hidden')) {
        btn.classList.remove('hidden')
        btn.classList.add('flex', 'flex-col')
    } else {
        btn.classList.add('hidden')
    }
}

// Hide flash messages after 4 sec
if(flash_msg.length > 0) {
    setTimeout(() => {
        flash_msg[0].style.opacity = '0'
        flash_msg[0].addEventListener('transitionend', () => flash_msg[0].remove())
    }, 4000)
}

// Submit category delete
delete_category.forEach(function(item) {
    item.addEventListener('click', function() {
        item.nextElementSibling.click()
    })
})
