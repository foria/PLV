<?php

if(isset($_POST['email'])) {



    // EDIT THE 2 LINES BELOW AS REQUIRED

    $email_to = "work@marcomelluso.com";

    $email_subject = "Form di contatto dal sito";





    function died($error) {

        // your error code can go here

        echo "Siamo spiacienti ma c'è stato un errore nell'invio del form";

        echo "Questi gli errori.<br /><br />";

        echo $error."<br /><br />";

        echo "Per cortesia tornare indietro e correggere gli errori.<br /><br />";

        die();

    }



    // validation expected data exists

    if(!isset($_POST['nome']) ||

        !isset($_POST['email']) ||

        !isset($_POST['telefono']) ||

        !isset($_POST['messaggio'])) {

        died("Siamo spiacienti ma c'è stato un errore nell'invio del form");

    }



    $first_name = $_POST['nome']; // required

    $email_from = $_POST['email']; // required

    $phone = $_POST['telefono']; // required

    $comments = $_POST['messaggio']; // required



    $error_message = "";

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {

    $error_message .= 'Mail inserita non valida<br />';

  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$first_name)) {

    $error_message .= 'The First Name you entered does not appear to be valid.<br />';

  }

  if(strlen($comments) < 2) {

    $error_message .= 'The Comments you entered do not appear to be valid.<br />';

  }

  if(strlen($error_message) > 0) {

    died($error_message);

  }

    $email_message = "Form details below.\n\n";



    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }



    $email_message .= "Nme: ".clean_string($first_name)."\n";

    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Telefono: ".clean_string($phone)."\n";

    $email_message .= "Comments: ".clean_string($comments)."\n";





// create email headers

$headers = 'From: '.$email_from."\r\n".

'Reply-To: '.$email_from."\r\n" .

'X-Mailer: PHP/' . phpversion();

@mail($email_to, $email_subject, $email_message, $headers);

?>



<!-- include your own success html here -->



Grazie per averci contattato. Cercheremo di risponderti nel più breve tempo possibile.



<?php

}

?>
