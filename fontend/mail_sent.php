<?php 

$to   = "luosanyo@gmail.com";

  		$header  = 'Content-type: text/html; charset=iso-8859-1'."\r\n";
  		$header .= "From: service@gmail.com";

  		$subject = "問題回饋 客戶意見";
  		$body    = "您有一封來自 ".$_POST['name']." 的客戶意見,<br><br>";
  		$body   .= "內容如下<br>";
        $body   .= "<table>
                    <tr><td>聯絡人:</td><td>".$_POST['name']."</td></tr>
                    <tr><td>聯絡電話:</td><td>".$_POST['mobile']."</td></tr>
                    <tr><td>E-mail:</td><td>".$_POST['email']."</td></tr>             
                    <tr><td>標題:</td><td>".$_POST['subject']."</td></tr>
                    <tr><td>詢問內容:</td><td>".$_POST['message']."</td></tr>
                    </table><br>";

  		mail($to, $subject, $body, $header);
 
    header('Location:contact.php?sent=ture');

?>