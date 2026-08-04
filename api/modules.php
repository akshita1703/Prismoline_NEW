<?php

// input sanitization
function sanitizeInput($conn, $input)
{
    $input = trim($input);
    $input = strip_tags($input);
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    $input = mysqli_real_escape_string($conn, $input);

    return $input;
}

// sending Email (Multipurpose for Prismoline company)
function sendEmail(array $data = [])
{
    $to          = $data['to'] ?? 'info@prismoline.com';

    $name        = trim($data['name'] ?? '');
    $email       = trim($data['email'] ?? '');
    $phone       = trim($data['phone'] ?? '');
    $subject     = trim($data['subject'] ?? 'Website Notification');
    $message     = trim($data['message'] ?? '');

    $fromName    = $data['from_name'] ?? 'Website Notification';
    $fromEmail   = $data['from_email'] ?? 'no-reply@xyz.com';

    $fields      = $data['fields'] ?? [];
    $fieldsHtml = '';

    foreach ($fields as $label => $value) {

        if ($value === '') {
            continue;
        }

        $fieldsHtml .= '
        <tr>
            <td style="padding:10px;border:1px solid #ddd;background:#f8f8f8;font-weight:bold;width:180px;">
                ' . htmlspecialchars($label) . '
            </td>

            <td style="padding:10px;border:1px solid #ddd;">
                ' . nl2br(htmlspecialchars($value)) . '
            </td>
        </tr>';
    }

    $emailBody = '
    <html>
        <head>
            <meta charset="UTF-8">
            <title>' . htmlspecialchars($subject) . '</title>
        </head>

        <body style="margin:0;padding:20px;background:#f4f4f4;font-family:Arial,sans-serif;">

            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center">
                        <table width="650" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:8px;overflow:hidden;">
                            <tr>
                                <td style="background:#3368b8;padding:20px;text-align:center;color:#ffffff;">
                                    <h2 style="margin:0;">New Website Enquiry</h2>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:30px;">
                                    <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                                        <tr>
                                            <td style="padding:10px;border:1px solid #ddd;background:#f8f8f8;font-weight:bold;width:180px;">
                                                Name
                                            </td>

                                            <td style="padding:10px;border:1px solid #ddd;">
                                                ' . htmlspecialchars($name) . '
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="padding:10px;border:1px solid #ddd;background:#f8f8f8;font-weight:bold;">
                                                Email
                                            </td>

                                            <td style="padding:10px;border:1px solid #ddd;">
                                                ' . htmlspecialchars($email) . '
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="padding:10px;border:1px solid #ddd;background:#f8f8f8;font-weight:bold;">
                                                Phone
                                            </td>

                                            <td style="padding:10px;border:1px solid #ddd;">
                                                ' . htmlspecialchars($phone ?: '-') . '
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="padding:10px;border:1px solid #ddd;background:#f8f8f8;font-weight:bold;">
                                                Subject
                                            </td>

                                            <td style="padding:10px;border:1px solid #ddd;">
                                                ' . htmlspecialchars($subject) . '
                                            </td>
                                        </tr>
                                        ' . $fieldsHtml . '
                                        <tr>
                                            <td style="padding:10px;border:1px solid #ddd;background:#f8f8f8;font-weight:bold;">
                                                Message
                                            </td>

                                            <td style="padding:10px;border:1px solid #ddd;">
                                                ' . nl2br(htmlspecialchars($message)) . '
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="background:#f8f8f8;padding:15px;text-align:center;font-size:12px;color:#777;">
                                    This email was generated automatically from your website.
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

        </body>
    </html>';

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: {$fromName} <{$fromEmail}>\r\n";

    if (!empty($email)) {
        $headers .= "Reply-To: {$email}\r\n";
    }

    return mail($to, $subject, $emailBody, $headers);
}
