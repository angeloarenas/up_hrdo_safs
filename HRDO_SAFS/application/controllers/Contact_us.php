<?php
class Contact_us extends CI_Controller
{
    public function __construct()
      {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library('My_PHPMailer');
      }
    public function contact_us_page()
    {
        $this->load->view('employee_contact_us.php');
    }
    public function index()
    {
        $full_name = $this->security->xss_clean($this->input->post("full_name"));
        $employee_num = $this->security->xss_clean($this->input->post("employee_num"));
        $contact_no = $this->security->xss_clean($this->input->post("contact_no"));
        $email_ad = $this->security->xss_clean($this->input->post("email_ad"));
        $subject = $this->security->xss_clean($this->input->post("subject"));
        $message = $this->security->xss_clean($this->input->post("message"));

        if ($this->input->post('btn_send') == "Send")
        {
            // phpmailer initializations
            date_default_timezone_set('Etc/UTC');

            $mail = new PHPMailer();
            $mail->IsSMTP();                                    // Set mailer to use SMTP
            $mail->SMTPAuth   = true;                           // Enable SMTP authentication
            $mail->SMTPSecure = "tls";                          // Enable TLS encryption, `ssl` also accepted
            $mail->Host       = "smtp.gmail.com";               // setting GMail as our SMTP server
            $mail->Port       = 587;                            // TCP port to connect to GMail
            $mail->Username   = "contact.uphrdosafs@gmail.com";   // user email address in GMail
            $mail->Password   = "qu3z0nh411";                   // password in GMail
            $mail->IsHTML(true);                                // allows message body in html format
            // $mail->SMTPDebug  = 1;                           // Enable verbose debug output

            // main email
            $mail->SetFrom($email_ad, $full_name);         //Who is sending the email
            $mail->AddReplyTo($email_ad, $full_name);      //Who receives the reply of reciever
            $mail->Subject    = $subject;
            $mail->Body       = "<p>This email was sent from UP HRDO SAFS application.</p><br>
                                <p><b>Sender's Information</b><br>
                                <b>Name: </b>${full_name}<br>
                                <b>Employee Number: </b>${employee_num}<br>
                                <b>E-mail Address: </b>${email_ad} <br>
                                <b>Contact Number: </b>${contact_no}</p>"

                                . "<p>" . nl2br($message) . "</p>";
            $mail->AltBody    = nl2br($message);
            $mail->AddAddress("contact.uphrdosafs@gmail.com");    //Who is the reciver of email

            // $mail->AddAttachment("images/phpmailer.gif");    // some attached files
            // $mail->AddAttachment("images/phpmailer_mini.gif");   // as many as you want

            // sends email, returns message
            if(!$mail->Send()) {
              $data["error"] = "1";
              $data["message"] = "Error! Please resend your e-mail.";
              $data["submessage"] =  "Contact HRDO if the problem still persists.";
              // comment in to see error info
              $data["submessage"] .= "</p><p><small>Error info: " . $mail->ErrorInfo . "</small>";
            } else {
              $data["error"] = "0";
              $data["message"] = "Message successfully sent!";
              $data["submessage"] =  "We will be in touch with you soon.";
            }
            $this->load->view('employee_contact_us.php', $data);
        }
    }

}
//PHPMailer note: your gmail account must enable "Turn less secure apps" in gmail account.
?>
