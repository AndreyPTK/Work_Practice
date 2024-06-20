// document.getElementById("reg-form").addEventListener("submit", function(event) {
//     let email = document.getElementById("inp-email").value;
//     let password = document.getElementById("inp-pwd").value;
//     let repit_password = document.getElementById("inp-repeatpwd").value;
//     let phone = document.getElementById("inp-phone").value;
//     let name = document.getElementById("inp-username").value;
//     let came_from = document.getElementById("inp-city").value;
//     let date_birth = document.getElementById("inp-birthday").value;
//     let errors = [];

//     if (email.length <= 5 || !email.includes("@")) {
//         errors.push("Некорректный email.");
//     }

//     if (password.length <= 8 || !/\d/.test(password) || !/[a-zA-Z]/.test(password)) {
//         errors.push("Пароль должен быть длиннее восьми символов и содержать буквы и цифры.");
//     }

//     if (password !== repit_password) {
//         errors.push("Пароли не совпадают.");
//     }

//     if (phone && phone.length <= 5) {
//         errors.push("Номер телефона должен быть длиннее 5 символов.");
//     }

//     if (name && !/^[a-zA-Zа-яА-Я]+$/.test(name)) {
//         errors.push("Имя может содержать только буквы.");
//     }

//     let allowedSources = ['site', 'city', 'tv', 'others'];
//     if (came_from && !allowedSources.includes(came_from)) {
//         errors.push("Некорректное значение поля 'Откуда узнали'.");
//     }

//     let birthDate = new Date(date_birth);
//     let age = new Date().getFullYear() - birthDate.getFullYear();
//     if (age <= 15 || age >= 67) {
//         errors.push("Возраст должен быть больше 15 и меньше 67 лет.");
//     }

//     if (errors.length > 0) {
//         event.preventDefault();
//         alert(errors.join("\n"));
//     }
// });