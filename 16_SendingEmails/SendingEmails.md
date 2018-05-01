## Отправка Email с помощью PHP

PHP должен быть правильно настроен в файле php.ini с информацией о том, как ваша система отправляет электронную почту. 
Откройте файл php.ini, доступный в каталоге / etc /, и найдите раздел, в котором находится [функция почты].

Пользователи Windows должны обеспечить поставку двух директив. 
Первый называется SMTP, который определяет адрес вашего почтового сервера. 
Вторая называется sendmail_from, которая определяет ваш собственный адрес электронной почты.

Конфигурация для Windows должна выглядеть примерно так:
```
[mail function]
; For Win32 only.
SMTP = smtp.secureserver.net

; For win32 only
sendmail_from = webmaster@tutorialspoint.com
Linux users simply need to let PHP know the location of their sendmail application. The path and any desired switches should be specified to the sendmail_path directive.

The configuration for Linux should look something like this −

[mail function]
; For Win32 only.
SMTP = 

; For win32 only
sendmail_from = 

; For Unix only
sendmail_path = /usr/sbin/sendmail -t -i
```
### Отправка обычного текстового сообщения

PHP использует функцию mail () для отправки электронной почты. Эта функция требует трех обязательных аргументов, 
которые указывают адрес электронной почты получателя, тему сообщения и фактическое сообщение, кроме того, 
имеются два других необязательных параметра.

```mail( to, subject, message, headers, parameters );```

* to-Необходимые. Указывает приемник / приемник электронной почты

* subject-Необходимые. Указывает тему электронной почты. Этот параметр не может содержать символы новой строки
* message-Необходимые. Определяет отправляемое сообщение. Каждая строка должна быть отделена LF (\ n). Строки не должны превышать 70 символов
* headers-Необязательный. Определяет дополнительные заголовки, такие как From, Cc и Bcc. Дополнительные заголовки должны быть разделены CRLF (\ r \ n)
* parameters-Необязательный. Указывает дополнительный параметр для программы отправки почты

Как только функция почты будет вызвана PHP, она попытается отправить электронное письмо, после чего она вернет значение true, если оно выполнено успешно или false, если оно не выполнено.

Несколько получателей могут быть указаны в качестве первого аргумента функции mail () в списке, разделенном запятыми.

 ### Отправка HTML-письма
 
 Когда вы отправляете текстовое сообщение с использованием PHP, то весь контент будет рассматриваться как простой текст. 
 Даже если вы будете включать HTML-теги в текстовое сообщение, оно будет отображаться как простой текст, а HTML-теги не будут отформатированы в соответствии с синтаксисом HTML. 
 Но PHP предоставляет возможность отправлять HTML-сообщение как фактическое сообщение HTML.
 
 При отправке сообщения электронной почты вы можете указать версию Mime, тип контента и набор символов для отправки электронной почты HTML.
 
 Следующий пример отправит сообщение электронной почты HTML на xyz@somedomain.com, скопировав его на afgh@somedomain.com. 
 Вы можете закодировать эту программу таким образом, чтобы она получала все содержимое от пользователя, 
 а затем отправляла электронное письмо.
 ```
 <html>
    
    <head>
       <title>Sending HTML email using PHP</title>
    </head>
    
    <body>
       
       <?php
          $to = "xyz@somedomain.com";
          $subject = "This is subject";
          
          $message = "<b>This is HTML message.</b>";
          $message .= "<h1>This is headline.</h1>";
          
          $header = "From:abc@somedomain.com \r\n";
          $header .= "Cc:afgh@somedomain.com \r\n";
          $header .= "MIME-Version: 1.0\r\n";
          $header .= "Content-type: text/html\r\n";
          
          $retval = mail ($to,$subject,$message,$header);
          
          if( $retval == true ) {
             echo "Message sent successfully...";
          }else {
             echo "Message could not be sent...";
          }
       ?>
       
    </body>
 </html>
 ```
### Отправка вложений по электронной почте
Чтобы отправить электронное письмо со смешанным контентом, необходимо установить заголовок Content-type для multipart / mixed. 
Затем разделы текста и вложения могут быть указаны в пределах границ.

Граница начинается с двух дефисов, за которыми следует уникальный номер, который не может отображаться в части сообщения электронной почты. 
Функция PHP md5 () используется для создания 32-значного шестнадцатеричного числа для создания уникального номера. 
Конечная граница, обозначающая окончательный раздел электронной почты, также должна заканчиваться двумя дефисами.
```
<?php
   // request variables // important
   $from = $_REQUEST["from"];
   $emaila = $_REQUEST["emaila"];
   $filea = $_REQUEST["filea"];
   
   if ($filea) {
      function mail_attachment ($from , $to, $subject, $message, $attachment){
         $fileatt = $attachment; // Path to the file
         $fileatt_type = "application/octet-stream"; // File Type 
         
         $start = strrpos($attachment, '/') == -1 ? 
            strrpos($attachment, '//') : strrpos($attachment, '/')+1;
				
         $fileatt_name = substr($attachment, $start, 
            strlen($attachment)); // Filename that will be used for the 
            file as the attachment 
         
         $email_from = $from; // Who the email is from
         $subject = "New Attachment Message";
         
         $email_subject =  $subject; // The Subject of the email 
         $email_txt = $message; // Message that the email has in it 
         $email_to = $to; // Who the email is to
         
         $headers = "From: ".$email_from;
         $file = fopen($fileatt,'rb'); 
         $data = fread($file,filesize($fileatt)); 
         fclose($file); 
         
         $msg_txt="\n\n You have recieved a new attachment message from $from";
         $semi_rand = md5(time()); 
         $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
         $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . "
            boundary=\"{$mime_boundary}\"";
         
         $email_txt .= $msg_txt;
			
         $email_message .= "This is a multi-part message in MIME format.\n\n" . 
            "--{$mime_boundary}\n" . "Content-Type:text/html; 
            charset = \"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . 
            $email_txt . "\n\n";
				
         $data = chunk_split(base64_encode($data));
         
         $email_message .= "--{$mime_boundary}\n" . "Content-Type: {$fileatt_type};\n" .
            " name = \"{$fileatt_name}\"\n" . //"Content-Disposition: attachment;\n" . 
            //" filename = \"{$fileatt_name}\"\n" . "Content-Transfer-Encoding: 
            base64\n\n" . $data . "\n\n" . "--{$mime_boundary}--\n";
				
         $ok = mail($email_to, $email_subject, $email_message, $headers);
         
         if($ok) {
            echo "File Sent Successfully.";
            unlink($attachment); // delete a file after attachment sent.
         }else {
            die("Sorry but the email could not be sent. Please go back and try again!");
         }
      }
      move_uploaded_file($_FILES["filea"]["tmp_name"],
         'temp/'.basename($_FILES['filea']['name']));
			
      mail_attachment("$from", "youremailaddress@gmail.com", 
         "subject", "message", ("temp/".$_FILES["filea"]["name"]));
   }
?>

<html>
   <head>
      
      <script language = "javascript" type = "text/javascript">
         function CheckData45() {
            with(document.filepost) {
               if(filea.value ! = "") {
                  document.getElementById('one').innerText = 
                     "Attaching File ... Please Wait";
               }
            }
         }
      </script>
      
   </head>
   <body>
      
      <table width = "100%" height = "100%" border = "0" 
         cellpadding = "0" cellspacing = "0">
         <tr>
            <td align = "center">
               <form name = "filepost" method = "post" 
                  action = "file.php" enctype = "multipart/form-data" id = "file">
                  
                  <table width = "300" border = "0" cellspacing = "0" 
                     cellpadding = "0">
							
                     <tr valign = "bottom">
                        <td height = "20">Your Name:</td>
                     </tr>
                     
                     <tr>
                        <td><input name = "from" type = "text" 
                           id = "from" size = "30"></td>
                     </tr>
                     
                     <tr valign = "bottom">
                        <td height = "20">Your Email Address:</td>
                     </tr>
                     
                     <tr>
                        <td class = "frmtxt2"><input name = "emaila"
                           type = "text" id = "emaila" size = "30"></td>
                     </tr>
                     
                     <tr>
                        <td height = "20" valign = "bottom">Attach File:</td>
                     </tr>
                     
                     <tr valign = "bottom">
                        <td valign = "bottom"><input name = "filea" 
                           type = "file" id = "filea" size = "16"></td>
                     </tr>
                     
                     <tr>
                        <td height = "40" valign = "middle"><input 
                           name = "Reset2" type = "reset" id = "Reset2" value = "Reset">
                        <input name = "Submit2" type = "submit" 
                           value = "Submit" onClick = "return CheckData45()"></td>
                     </tr>
                  </table>
                  
               </form>
               
               <center>
                  <table width = "400">
                     
                     <tr>
                        <td id = "one">
                        </td>
                     </tr>
                     
                  </table>
               </center>
               
            </td>
         </tr>
      </table>
      
   </body>
</html>
```