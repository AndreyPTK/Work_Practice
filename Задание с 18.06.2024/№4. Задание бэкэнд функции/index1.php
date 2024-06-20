<?php
$data = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'repit_password' => $_POST['repit_password'],
    'phone_number' => $_POST['phone_number'] ?? null, //приобретает значение "null", если поле ввода формы не было заполнено
    'username' => $_POST['username'],
    'came_from' => $_POST['came_from'] ?? null, //приобретает значение "null", если поле ввода формы не было заполнено
    'date_birth' => $_POST['date_birth'],
];

function checkFormWithData($data)
{
    $listOfErrors = [];
    $list_for_input_with_came_from = ['site', 'city', 'tv', 'others'];

    if (!isset($data['username']) || !preg_match('/^[a-zA-Zа-яА-Я]+$/u', $data['username'])) {
        $listOfErrors[] = "Поле \"имя\" может состоять только из букв";
    }
    if (!isset($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL) || strlen($data['email']) <= 5) {
        $listOfErrors[] = "Вы некорректно ввели почту";
    }
    if (!isset($data['password']) || strlen($data['password']) <= 8 || !preg_match('/[A-Za-z]/', $data['password']) || !preg_match('/\d/', $data['password'])) {
        $listOfErrors[] = "Введенный Вами пароль должен состоять из 8 символов и содержать буквы с цифрами";
    }
    if (!isset($data['repit_password']) || $data['password'] !== $data['repit_password']) {
        $listOfErrors[] = "Совпадение паролей не обнаружено, повторите попытку";
    }
    if (isset($data['phone_number']) && strlen($data['phone_number']) <= 5) {
        $listOfErrors[] = "Номер телефона должен иметь строго больше 5 цифр";
    }
    if (isset($data['came_from']) && !in_array($data['came_from'], $list_for_input_with_came_from)) {
        $listOfErrors[] = "Вы не выбрали один из вариантов списка, где указано, что откуда вы узнали о нас";
    }
    if (isset($data['date_birth'])) {
        $birthday = new DateTime($data['date_birth']);
        $today = new DateTime();
        $age = $today->diff($birthday)->y;
        if ($age <= 16 || $age >= 68) {
            $listOfErrors[] = "Не совпадение по возрасту: Вы слишком младше, или старше для наших требований";
        }
    }
    if (!empty($errors)) {
        return [
            'status' => false,
            'message' => 'Сообщение валидации: ' . implode('; ', $listOfErrors)
        ];
    } else {
        return [
            'status' => true,
            'message' => 'Поздравляем! Вы правильно заполнили форму и успешно зарегистрированы!'
        ];
    }
}
header('Content-Type: application/json; charset=utf-8');
echo json_encode(checkFormWithData($data), JSON_UNESCAPED_UNICODE);

// print_r(checkFormWithData($data)); // Убеждаемся, что мы в итоге имеем массив, а не объект, как кажется на первый взгляд (т.к. мы используем преобразование массива в JSON объект, чтобы в дальнейшем упростить работу с ним)