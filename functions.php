<?php 

  function format_email($info, $format){
    //set the root
    $root = $_SERVER['DOCUMENT_ROOT'].'/template';
echo $root;
 
    //grab the template content
    $template = file_get_contents($root.'/signup_template.'.$format);
             
    //replace all the tags
    $template = ereg_replace('{USERNAME}', $info['username'], $template);
    $template = ereg_replace('{EMAIL}', $info['email'], $template);
    $template = ereg_replace('{KEY}', $info['key'], $template);
    $template = ereg_replace('{SITEPATH}','http://52.2.223.106', $template);
         
    //return the html of the template
    return $template;
  }

  function send_email($info){
    //format each email
    $body = format_email($info,'html');
    $body_plain_txt = format_email($info,'txt');
 
    //setup the mailer
    $transport = Swift_MailTransport::newInstance();
    $mailer = Swift_Mailer::newInstance($transport);
    $message = Swift_Message::newInstance();
    $message ->setSubject('Welcome to Geo Home For you');
    $message ->setFrom(array('noreply@geomail.com' => 'Site Name'));
    $message ->setTo(array($info['email'] => $info['username']));
    $message ->setBody($body_plain_txt);
    $message ->addPart($body, 'text/html');
echo "WHAT";
    echo $message;
          

 
    $result = $mailer->send($message);
     
    return $result;
  }

  function show_errors($action){
    $error = false;
    if(!empty($action['result'])){
        $error = "<ul class=\"alert $action[result]\">"."\n";
        if(is_array($action['text'])){
            //loop out each error
            foreach($action['text'] as $text){
                $error .= "<li><p>$text</p></li>"."\n";
            }   
        }else{
            //single error
            $error .= "<li><p>$action[text]</p></li>";
        }
        $error .= "</ul>"."\n";
    }
    return $error;
}

?>
