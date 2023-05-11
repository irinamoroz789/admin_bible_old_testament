<?php
function saveTestImage($input_name, $test_id)
{
    // Если в $_FILES существует "image" и она не NULL
    if (isset($_FILES[$input_name]) and $_FILES[$input_name]['tmp_name']!=null) {

        // Получаем нужные элементы массива "image"
        $fileTmpName = $_FILES[$input_name]['tmp_name'];
        $errorCode = $_FILES[$input_name]['error'];
        // Проверим на ошибки
//        if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($fileTmpName)) {
//            // Массив с названиями ошибок
//            $errorMessages = [
//                UPLOAD_ERR_INI_SIZE => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
//                UPLOAD_ERR_FORM_SIZE => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
//                UPLOAD_ERR_PARTIAL => 'Загружаемый файл был получен только частично.',
//                UPLOAD_ERR_NO_FILE => 'Файл не был загружен.',
//                UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
//                UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
//                UPLOAD_ERR_EXTENSION => 'PHP-расширение остановило загрузку файла.',
//            ];
//            // Зададим неизвестную ошибку
//            $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';
//            // Если в массиве нет кода ошибки, скажем, что ошибка неизвестна
//            $outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;
//            // Выведем название ошибки
//            die($outputMessage);
//            return " ";
//        } else {
            // Создадим ресурс FileInfo
            $fi = finfo_open(FILEINFO_MIME_TYPE);
            // Получим MIME-тип
            $mime = (string)finfo_file($fi, $fileTmpName);
            // Проверим ключевое слово image (image/jpeg, image/png и т. д.)
            if (strpos($mime, 'image') === false) die('Можно загружать только изображения.');

            // Результат функции запишем в переменную
            $image = getimagesize($fileTmpName);

//            // Зададим ограничения для картинок
//            $limitBytes = 1024 * 1024 * 5;
//            $limitWidth = 1280;
//            $limitHeight = 768;
//
//            // Проверим нужные параметры
//            if (filesize($fileTmpName) > $limitBytes) die('Размер изображения не должен превышать 5 Мбайт.');
//            if ($image[1] > $limitHeight) die('Высота изображения не должна превышать 768 точек.');
//            if ($image[0] > $limitWidth) die('Ширина изображения не должна превышать 1280 точек.');

            // Сгенерируем новое имя файла через функцию getRandomFileName()
            $name = getRandomFileName($fileTmpName);

            // Сгенерируем расширение файла на основе типа картинки
            $extension = image_type_to_extension($image[2]);

            // Сократим .jpeg до .jpg
            $format = str_replace('jpeg', 'jpg', $extension);
            $dir = '../../resources/images/tests/' .$test_id. "/";

            if (!file_exists($dir)) {
                mkdir($dir, 0777);
            }

            $image_path = $dir . $name . $format;

            // Переместим картинку с новым именем и расширением в папку /upload
            if (!move_uploaded_file($fileTmpName,   $image_path)) {
                die('При записи изображения на диск произошла ошибка.');
            }

            return $image_path;
        }
//    }
    return "";

}
function saveThemesImage($input_name, $id_theme)
{
    if (isset($_FILES[$input_name]) and $_FILES[$input_name]['tmp_name']!=null) {
        $fileTmpName = $_FILES[$input_name]['tmp_name'];
        $errorCode = $_FILES[$input_name]['error'];

//        if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($fileTmpName)) {
//            // Массив с названиями ошибок
//            $errorMessages = [
//                UPLOAD_ERR_INI_SIZE => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
//                UPLOAD_ERR_FORM_SIZE => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
//                UPLOAD_ERR_PARTIAL => 'Загружаемый файл был получен только частично.',
//                UPLOAD_ERR_NO_FILE => 'Файл не был загружен.',
//                UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
//                UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
//                UPLOAD_ERR_EXTENSION => 'PHP-расширение остановило загрузку файла.',
//            ];
//            // Зададим неизвестную ошибку
//            $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';
//            // Если в массиве нет кода ошибки, скажем, что ошибка неизвестна
//            $outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;
//            // Выведем название ошибки
//            die($outputMessage);
//            return "";
//        } else {
            // Создадим ресурс FileInfo
            $fi = finfo_open(FILEINFO_MIME_TYPE);
            // Получим MIME-тип
            $mime = (string)finfo_file($fi, $fileTmpName);
            // Проверим ключевое слово image (image/jpeg, image/png и т. д.)
            if (strpos($mime, 'image') === false) die('Можно загружать только изображения.');

            // Результат функции запишем в переменную
            $image = getimagesize($fileTmpName);

//            // Зададим ограничения для картинок
//            $limitBytes = 1024 * 1024 * 5;
//            $limitWidth = 1280;
//            $limitHeight = 768;
//
//            // Проверим нужные параметры
//            if (filesize($fileTmpName) > $limitBytes) die('Размер изображения не должен превышать 5 Мбайт.');
//            if ($image[1] > $limitHeight) die('Высота изображения не должна превышать 768 точек.');
//            if ($image[0] > $limitWidth) die('Ширина изображения не должна превышать 1280 точек.');


            // Сгенерируем расширение файла на основе типа картинки
            $extension = image_type_to_extension($image[2]);

            // Сократим .jpeg до .jpg
            $format = str_replace('jpeg', 'jpg', $extension);
            $dir = '../../resources/images/themes/';
            if (!file_exists($dir)) {
                mkdir($dir, 0777);
            }
            $image_path = $dir . $id_theme . $format;

            // Переместим картинку с новым именем и расширением в папку /upload
            if (!move_uploaded_file($fileTmpName,   $image_path)) {
                die('При записи изображения на диск произошла ошибка.');
            }
            return $image_path;
        }
//    }
    return "";

}

function getRandomFileName($path)
{
    $path = $path ? $path . '/' : '';
    do {
        $name = md5(microtime() . rand(0, 9999));
        $file = $path . $name;
    } while (file_exists($file));

    return $name;
}
