<?php

require('src/functions.php');

// Задание #3-1

//Программно создайте массив из 50 пользователей, у каждого пользователя есть поля id, name и age:
// id - уникальный идентификатор, равен номеру эл-та в массиве
// name - случайное имя из 5-ти возможных (сами придумайте каких)
// age - случайное число от 18 до 45

//Преобразуйте массив в json и сохраните в файл users.json
//Откройте файл users.json и преобразуйте данные из него обратно ассоциативный массив РНР.
//Посчитайте количество пользователей с каждым именем в массиве
//Посчитайте средний возраст пользователей

// Создаем 50 юзеров

$users = [];

for ($i = 0; $i < 50; $i++)
{
    $users[] = addRandUser();
}

// Создаем json с массива юзеров
$json = json_encode($users);

// Сохраняем json файл с юзерами
file_put_contents('users.json', $json);

// Открываем файл json с юзерами
$f = file_get_contents('users.json');

$usersArr = json_decode($f, true);

$usersNames = [];
$ageSum = 0;

foreach ($usersArr as $user) {
    if (isset($usersNames[$user['name']])) {
        $usersNames[$user['name']]++;
    } else {
        $usersNames[$user['name']] = 1;
    }
    $ageSum += $user['age'];
}

foreach ($usersNames as $usersName => $count ) {
    echo 'Пользователей с именем ' . $usersName . ' - ' . $count . '<br>';
}

echo '<br>';

echo 'Средний возраст юзеров - ' . (int)($ageSum / count($usersArr));


