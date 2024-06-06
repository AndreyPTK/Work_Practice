let elementsProductGallery = {
    'img_print_1': {
        'category_name': 'PRINT',
        'img_path': 'assets/images&svgs/image_ofCategory_print_1.jpg'
    },
    'img_print_2': {
        'category_name': 'PRINT',
        'img_path': 'assets/images&svgs/image_ofCategory_print_2.jpg'
    },
    'img_print_3': {
        'category_name': 'PRINT',
        'img_path': 'assets/images&svgs/image_ofCategory_print_3.jpg'
    },
    'img_print_4': {
        'category_name': 'PRINT',
        'img_path': 'assets/images&svgs/image_ofCategory_print_4.jpg'
    },
    'img_webDesign_1': {
        'category_name': 'WEB DESIGN',
        'img_path': 'assets/images&svgs/image_ofCategory_webDesign_1.jpg'
    },
    'img_webDesign_2': {
        'category_name': 'WEB DESIGN',
        'img_path': 'assets/images&svgs/image_ofCategory_webDesign_2.jpg'
    },
    'img_webDesign_3': {
        'category_name': 'WEB DESIGN',
        'img_path': 'assets/images&svgs/image_ofCategory_webDesign_3.jpg'
    },
    'img_webDesign_4': {
        'category_name': 'WEB DESIGN',
        'img_path': 'assets/images&svgs/image_ofCategory_webDesign_4.jpg'
    },
    'img_logo_1': {
        'category_name': 'LOGO',
        'img_path': 'assets/images&svgs/image_ofCategory_logo_1.png'
    },
    'img_logo_2': {
        'category_name': 'LOGO',
        'img_path': 'assets/images&svgs/image_ofCategory_logo_2.png'
    },
    'img_motion_1': {
        'category_name': 'MOTION',
        'img_path': 'assets/images&svgs/image_ofCategory_motion_1.png'
    },
    'img_motion_3': {
        'category_name': 'MOTION',
        'img_path': 'assets/images&svgs/image_ofCategory_motion_3.png'
    },
    'img_motion_4': {
        'category_name': 'MOTION',
        'img_path': 'assets/images&svgs/image_ofCategory_motion_4.png'
    },
    'img_motion_2': {
        'category_name': 'MOTION',
        'img_path': '' //Экспериментальный пустой путь
    },
    // 'img_ofNewCategory': {
    //     'category_name': 'favorite', //пример создания иной категории
    //     'img_path': 'assets/images&svgs/example_image_forTestHowToWork.jpeg'
    // }
};

let categoryList = document.getElementById("list-categories")
let blockWithImages = document.getElementById("images-someone-category")
let categories = {};
for (let key in elementsProductGallery) {
    categories[elementsProductGallery[key].category_name] = true
}

let btn_ALL = document.createElement('li')
btn_ALL.innerHTML = `<button id="category_ALL">ALL</button>`
categoryList.appendChild(btn_ALL)

function createBtnsOtherCategories(categories, categoryList) {
    Object.keys(categories).forEach((category) => {
        let btn_category = document.createElement('li')
        btn_category.innerHTML = `<button id="category_${category}">${category}</button>`
        categoryList.appendChild(btn_category)
    });
}

function displayImages(category) {
    blockWithImages.innerHTML = ''
    for (let key in elementsProductGallery) {
        if (category === "ALL" || elementsProductGallery[key].category_name === category) {
            let articleWithImage = document.createElement("article")
            articleWithImage.classList.add('image_card')
            articleWithImage.innerHTML = `<img src="${elementsProductGallery[key].img_path}" alt="Упс, картинка либо не прогрузилась, либо с ней что-то не так">`
            
            blockWithImages.appendChild(articleWithImage)
        }
    }
}

categoryList.addEventListener("click", function (event) {
    if (event.target.tagName === "BUTTON") {
        let category = event.target.id.replace("category_", "")
        displayImages(category)
    }
});

createBtnsOtherCategories(categories, categoryList)
displayImages("ALL")