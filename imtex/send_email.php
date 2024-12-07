<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $company_name = $_POST['company_name'];
    $personal_name = $_POST['personal_name'];
    $company_address = $_POST['company_address'];
    $contact_number = $_POST['contact_number'];
    $contact_email = $_POST['contact_email'];

    // Include PHPMailer class
    require 'PHPMailerAutoload.php';

    // Create a new PHPMailer instance
    $mail = new PHPMailer;

    // Set mailer to use SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // SMTP server address (replace with your mail provider)
    $mail->SMTPAuth = true;
    $mail->Username = 'balaji.imtex2025@gmail.com'; // Your email address
    $mail->Password = '#Bapl@123$'; // Your email password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Sender details (the company will send the email)
    $mail->setFrom('your-email@domain.com', 'Your Company');
    $mail->addAddress($contact_email); // Send email to customer

    // Email content
    $mail->isHTML(true);
    $mail->Subject = "Thank you for contacting us, $personal_name";
    $mail->Body    = "
    <h2>Thank you for contacting us, $personal_name!</h2>
    <p>We have received your contact details:</p>
    <p><strong>Company Name:</strong> $company_name</p>
    <p><strong>Personal Name:</strong> $personal_name</p>
    <p><strong>Company Address:</strong> $company_address</p>
    <p><strong>Contact Number:</strong> $contact_number</p>
    <p><strong>Contact Email:</strong> $contact_email</p>
    <p>We have attached a PDF document with more details about our company for your reference.</p>";

    // Path to the company's PDF file (the PDF file provided by the company)
    $pdf_path = 'c:\Users\enn07\Desktop\dc.pdf'; // Replace with your actual path to the PDF file
    $mail->addAttachment($pdf_path, 'Company_Information.pdf'); // Attach the company's PDF

    // Send the email
    if ($mail->send()) {
        echo "Thank you for your submission. The information and PDF have been sent to your email address.";
    } else {
        echo "There was an error sending your message. Please try again later.";
    }
}
?>
