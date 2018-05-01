## Загрузка файлов

Сценарий PHP можно использовать с формой HTML, чтобы пользователи могли загружать файлы на сервер. 
Первоначально файлы загружаются во временный каталог, а затем перемещаются в целевую точку назначения с помощью скрипта PHP.

Информация на странице phpinfo.php описывает временный каталог, который используется для загрузки файлов как upload_tmp_dir, 
и максимально разрешенный размер файлов, которые могут быть загружены, указывается как upload_max_filesize. 
Эти параметры задаются в файле конфигурации PHP php.ini

Процесс загрузки файла выполняется следующим образом:

* Пользователь открывает страницу, содержащую HTML-форму с текстовыми файлами, кнопкой обзора и кнопкой отправки.

* Пользователь нажимает кнопку обзора и выбирает файл для загрузки с локального ПК.
* Полный путь к выбранному файлу отображается в текстовом файле, затем пользователь нажимает кнопку отправки.
* Выбранный файл отправляется во временный каталог на сервере.
* PHP-скрипт, который был указан как обработчик формы в атрибуте действия формы, проверяет, прибыл ли файл, а затем копирует файл в предназначенную директорию.
* Сценарий PHP подтверждает успех для пользователя.

Как обычно при записи файлов необходимо, чтобы временные и конечные местоположения располагали разрешениями, позволяющими записывать файлы. 
Если установлено значение «только для чтения», процесс завершится неудачно.

Загруженным файлом может быть текстовый файл или файл изображения или любой документ.

### Создание формы загрузки
Следующий ниже код HTM создает форму для загрузки. Эта форма имеет атрибут метода, установленный для атрибута ```post``` и ```enctype```, для которого установлено значение ```multipart / form-data```
```
<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
      </form>
      
   </body>
</html>
```
Вот что у нас получилось: - [!alt text](https://www.tutorialspoint.com/php/images/upload_form.jpg)

### Создание скрипта загрузки

Существует одна глобальная переменная PHP, называемая $ _FILES. 
Эта переменная является ассоциированным массивом двойных измерений и сохраняет всю информацию, 
связанную с загруженным файлом. Поэтому, если значение, присвоенное атрибуту имени входа в форме загрузки, было файлом, 
тогда PHP создаст следующие пять переменных -

* $ _FILES ['file'] ['tmp_name'] - загруженный файл во временном каталоге на веб-сервере.

* $ _FILES ['file'] ['name'] - фактическое имя загруженного файла.
* $ _FILES ['file'] ['size'] - размер в байтах загруженного файла.
* $ _FILES ['file'] ['type'] - тип MIME загруженного файла.
* $ _FILES ['file'] ['error'] - код ошибки, связанный с этой загрузкой файл

```
<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
      
      <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" />
         <input type = "submit"/>
			
         <ul>
            <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
            <li>File size: <?php echo $_FILES['image']['size'];  ?>
            <li>File type: <?php echo $_FILES['image']['type'] ?>
         </ul>
			
      </form>
      
   </body>
</html>
```
И у нас получилось вот это :[!alt text](https://www.tutorialspoint.com/php/images/upload_script.jpg)