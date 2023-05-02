<?php
function saveTestImage($input_name, $test_id, $test_title)
{
//    foreach ( $_FILES as $file){
//        foreach ($file as $value) {
//            echo $value;
//            echo ", ";
//        }
//        echo '<br>';
//    }

// Если в $_FILES существует "image" и она не NULL
    if (isset($_FILES[$input_name]) and $_FILES[$input_name]['tmp_name']!=null) {
        echo "Image";
        foreach ($_FILES[$input_name] as $file) {
            echo $file;
            echo ", ";
        }
       echo "end";
// Получаем нужные элементы массива "image"
        $fileTmpName = $_FILES[$input_name]['tmp_name'];
        echo $fileTmpName;
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

            $test_title = translitFile($test_title);
            // Сократим .jpeg до .jpg
            $format = str_replace('jpeg', 'jpg', $extension);
            $dir = '../../resources/images/tests/' .$test_id. "-". $test_title. "/";

            if (!file_exists($dir)) {
                mkdir($dir, 0777);
            }

//            $image_path = '../resources/images/tests/' .$test_id. "-". $test_title. "/". $name . $format;
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
function saveThemesImage($input_name, $themes_title)
{
    echo "Hello";
        foreach ( $_FILES as $file){
            foreach ($file as $value) {
                echo $value;
                echo ", ";
            }
            echo '<br>';
    }

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

            // Сгенерируем новое имя файла через функцию getRandomFileName()
            $name = $themes_title;

            // Сгенерируем расширение файла на основе типа картинки
            $extension = image_type_to_extension($image[2]);

            // Сократим .jpeg до .jpg
            $format = str_replace('jpeg', 'jpg', $extension);
            $dir = '../../resources/images/themes/';
            if (!file_exists($dir)) {
                mkdir($dir, 0777);
            }

//            $image_path = '../resources/images/tests/' .$test_id. "-". $test_title. "/". $name . $format;
            $image_path = $dir . $name . $format;
            $image_path = translitFile($image_path);


            // Переместим картинку с новым именем и расширением в папку /upload
            if (!move_uploaded_file($fileTmpName,   $image_path)) {
                die('При записи изображения на диск произошла ошибка.');
            }

            return $image_path;
        }
//    }
    return "";

}

// File functions.php
function getRandomFileName($path)
{
    $path = $path ? $path . '/' : '';
    do {
        $name = md5(microtime() . rand(0, 9999));
        $file = $path . $name;
    } while (file_exists($file));

    return $name;
}
function translitFile($filename)
{
    $converter = array(
        'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
        'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
        'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
        'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
        'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
        'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
        'э' => 'e',    'ю' => 'yu',   'я' => 'ya',

        'А' => 'A',    'Б' => 'B',    'В' => 'V',    'Г' => 'G',    'Д' => 'D',
        'Е' => 'E',    'Ё' => 'E',    'Ж' => 'Zh',   'З' => 'Z',    'И' => 'I',
        'Й' => 'Y',    'К' => 'K',    'Л' => 'L',    'М' => 'M',    'Н' => 'N',
        'О' => 'O',    'П' => 'P',    'Р' => 'R',    'С' => 'S',    'Т' => 'T',
        'У' => 'U',    'Ф' => 'F',    'Х' => 'H',    'Ц' => 'C',    'Ч' => 'Ch',
        'Ш' => 'Sh',   'Щ' => 'Sch',  'Ь' => '',     'Ы' => 'Y',    'Ъ' => '',
        'Э' => 'E',    'Ю' => 'Yu',   'Я' => 'Ya',   '?' => '',
    );

    $new = '';

    $file = pathinfo(trim($filename));
    if (!empty($file['dirname']) && @$file['dirname'] != '.') {
        $new .= rtrim($file['dirname'], '/') . '/';
    }

    if (!empty($file['filename'])) {
        $file['filename'] = str_replace(array(' ', ','), '-', $file['filename']);
        $file['filename'] = strtr($file['filename'], $converter);
        $file['filename'] = mb_ereg_replace('[-]+', '-', $file['filename']);
        $file['filename'] = trim($file['filename'], '-');
        $new .= $file['filename'];
    }

    if (!empty($file['extension'])) {
        $new .= '.' . $file['extension'];
    }

    return $new;
}