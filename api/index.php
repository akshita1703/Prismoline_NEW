<?php
date_default_timezone_set('Asia/Kolkata');

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../env/connection.php';
require_once './modules.php';

extract($_REQUEST);
$data = [];

if ($action == 'login') {

    $username = isset($username) ? trim($username) : '';
    $password = isset($password) ? trim($password) : '';
    $type = isset($type) ? trim($type) : '';

    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);

    $sql = "SELECT * FROM `user` WHERE `username` = '$username'";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $dbpassword = $row['password'];
        $status = $row['status'];

        $user_type = $row['type'];
        $name = $row['name'];
        $id = $row['id'];

        if ($type == $user_type) {
            if ($password == $dbpassword) {
                if ($status == 1) {

                    $current_date_time = date('Y-m-d H:i:s');
                    $sql2 = "UPDATE `user` SET `last_login` = '$current_date_time' WHERE `id` = $id";
                    $res2 = mysqli_query($con, $sql2);

                    $data = [
                        "status" => 1,
                        "type" => $type,
                        "name" => $name,
                        "user_id" => $row["id"],
                    ];
                } else {
                    $data = [
                        "status" => 0,
                        "msg" => "Your account is blocked",
                    ];
                }
            } else {
                $data = [
                    "status" => 0,
                    "msg" => "Invalid password",
                ];
            }
        } else {
            $data = [
                "status" => 0,
                "msg" => "Unauthorized user",
            ];
        }
    } else {
        $data = [
            "status" => 0,
            "msg" => "Invalid username",
        ];
    }
} else if ($action == 'update_password') {

    $user_id = isset($user_id) ? trim($user_id) : 0;
    $old_pswd = isset($old_pswd) ? trim($old_pswd) : '';
    $new_pswd = isset($new_pswd) ? trim($new_pswd) : '';
    $confirm_pswd = isset($confirm_pswd) ? trim($confirm_pswd) : '';

    $sql_check = "SELECT * FROM `user` WHERE `id`='$user_id' AND `password` = '$old_pswd' LIMIT 1";
    $res_check = mysqli_query($con, $sql_check);

    $db_password = '';

    if ($res_check && mysqli_num_rows($res_check)) {
        $row_check = mysqli_fetch_assoc($res_check);
        $db_password = $row_check['password'];
    }

    if ($old_pswd == $db_password) {
        $sql = "UPDATE `user` SET
        `password` = '$new_pswd'
        WHERE `id` = '$user_id'";
        $res = mysqli_query($con, $sql);

        if ($res) {
            $data = [
                "status" => 1,
                "msg" => "Password updated successfully.",
            ];
        } else {
            $data = [
                "status" => 0,
                "msg" => "Failed to update password type",
            ];
        }
    } else {
        $data = [
            "status" => 0,
            "msg" => "Current Password is incorrect.",
        ];
    }
} else if ($action == 'website_contact_us') {
    $name              = isset($name) ? sanitizeInput($con, $name) : '';
    $subject           = isset($subject) ? sanitizeInput($con, $subject) : '';
    $email             = isset($email) ? sanitizeInput($con, $email) : '';
    $phone             = isset($phone) ? sanitizeInput($con, $phone) : '';
    $company           = isset($company) ? sanitizeInput($con, $company) : '';
    $product_interest  = isset($product_interest) ? sanitizeInput($con, $product_interest) : '';
    $message           = isset($message) ? sanitizeInput($con, $message) : '';

    $date = date("Y-m-d H:i:s");

    if(empty($subject)) $subject = "Product Interest : ". $product_interest;

    $sql = "INSERT INTO `contact_us`(`name`,`company`,`email`,`phone`,`subject`,`message`,`trash`,`date`)
            VALUES('$name','$company','$email','$phone','$subject','$message','0','$date')";
    $res = mysqli_query($con, $sql);

    if ($res) {
        $isMailSent = sendEmail([
            'name'    => $name,
            'email'   => $email,
            'phone'   => $phone,
            'subject' => $subject,
            'message' => $message,
            'fields' => [
                'Company'          => $company,
                'Product Interest' => $product_interest
            ]
        ]);
        $data = [
            "status" => 1,
            "msg" => $isMailSent
                ? "We have received your request successfully."
                : "We have received your request."
        ];
    } else {

        $data = [
            "status" => 0,
            "msg" => "Failed to receive contact details."
        ];
    }
} else if ($action == 'website_newsletter') {
    $email = isset($email) ? sanitizeInput($con, $email) : '';

    $isMailSent = sendEmail([
        'email'   => $email,
        'subject' => 'Newsletter Subscription',
        'message' => 'A new user subscribed to the newsletter.',
        'fields' => [
            'Subscription Email' => $email
        ]
    ]);

    if ($isMailSent) {
        $data = [
            "status" => 1,
            "msg" => "Subscribed successfully."
        ];
    } else {

        $data = [
            "status" => 0,
            "msg" => "Failed to subscribe. Please try again later."
        ];
    }
} else if ($action == 'get_contact_us') {

    $columns = ['sno', 'name', 'company', 'email', 'phone', 'subject', 'message', 'date'];

    $draw   = isset($_POST['draw']) ? intval($_POST['draw']) : 0;
    $start  = isset($_POST['start']) ? intval($_POST['start']) : 0;
    $length = isset($_POST['length']) ? intval($_POST['length']) : 10;

    $orderCol = isset($_POST['order'][0]['column']) ? intval($_POST['order'][0]['column']) : 0;
    $orderDir = isset($_POST['order'][0]['dir']) ? $_POST['order'][0]['dir'] : 'asc';
    $search   = isset($_POST['search']['value']) ? $_POST['search']['value'] : '';

    $sqlTotal = "SELECT COUNT(*) AS total FROM contact_us WHERE trash = '0'";
    $resultTotal = mysqli_query($con, $sqlTotal);
    $rowTotal = mysqli_fetch_assoc($resultTotal);
    $totalData = $rowTotal['total'];
    $totalFiltered = $totalData;

    $where = "WHERE trash = '0'";
    if (!empty($search)) {
        $search = mysqli_real_escape_string($con, $search);
        $where .= " AND (
        name LIKE '%$search%' 
        OR email LIKE '%$search%' 
        OR phone LIKE '%$search%' 
        OR subject LIKE '%$search%' 
        OR date LIKE '%$search%'
    )";
    }

    $sqlFiltered = "SELECT COUNT(*) AS total FROM contact_us $where";
    $resultFiltered = mysqli_query($con, $sqlFiltered);
    $rowFiltered = mysqli_fetch_assoc($resultFiltered);
    $totalFiltered = $rowFiltered['total'];

    if (!isset($_POST['order'])) {
        $orderBy = 'id';
        $orderDir = 'DESC';
    } else {
        $orderBy = $columns[$orderCol];

        if ($orderBy == 'sno') {
            $orderBy = 'id';
        }
    }

    $sqlData = "SELECT * FROM contact_us $where ORDER BY $orderBy $orderDir LIMIT $start, $length";
    $resultData = mysqli_query($con, $sqlData);

    $data = [];
    $sno = $start + 1;
    while ($row = mysqli_fetch_assoc($resultData)) {
        $row['sno'] = $sno;
        $sno++;
        $data[] = $row;
    }

    $data = [
        "draw" => intval($draw),
        "recordsTotal" => intval($totalData),
        "recordsFiltered" => intval($totalFiltered),
        "data" => $data
    ];
} else if ($action == 'delete_contact_us') {
    $id = isset($id) ? sanitizeInput($con, $id) : 0;

    $sql = "UPDATE `contact_us` SET `trash` = '1' WHERE `id` = '$id'";
    $res = mysqli_query($con, $sql);

    if ($res) {
        $data = [
            "status" => 1,
            "msg" => "Message deleted successfully.",
        ];
    } else {
        $data = [
            "status" => 0,
            "msg" => "Failed to delete message.",
        ];
    }
} else if ($action == 'career_form_submission') {

    $name      = isset($_POST['name']) ? sanitizeInput($con, $_POST['name']) : '';
    $email     = isset($_POST['email']) ? sanitizeInput($con, $_POST['email']) : '';
    $phone     = isset($_POST['phone']) ? sanitizeInput($con, $_POST['phone']) : '';
    $position  = isset($_POST['position']) ? sanitizeInput($con, $_POST['position']) : '';
    $reason    = isset($_POST['reason']) ? sanitizeInput($con, $_POST['reason']) : '';

    if (
        empty($name) ||
        empty($email) ||
        empty($phone) ||
        empty($position) ||
        empty($reason)
    ) {

        $data = [
            "status" => 0,
            "msg"    => "Please fill all required details.",
        ];

        echo json_encode($data);
        exit;
    }

    if (!isset($_FILES['resume']) || $_FILES['resume']['error'] != 0) {

        $data = [
            "status" => 0,
            "msg"    => "Please upload your resume.",
        ];

        echo json_encode($data);
        exit;
    }

    $allowedExtensions = ['pdf', 'doc', 'docx'];

    $file_tmp   = $_FILES['resume']['tmp_name'];
    $file_name  = $_FILES['resume']['name'];
    $file_size  = $_FILES['resume']['size'];
    $file_type  = $_FILES['resume']['type'];
    $file_ext   = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if (!in_array($file_ext, $allowedExtensions)) {

        $data = [
            "status" => 0,
            "msg"    => "Only PDF, DOC and DOCX files are allowed.",
        ];

        echo json_encode($data);
        exit;
    }

    // Max size 5MB
    if ($file_size > (5 * 1024 * 1024)) {

        $data = [
            "status" => 0,
            "msg"    => "Resume size should be less than 5MB.",
        ];

        echo json_encode($data);
        exit;
    }

    $to      = "info@prismoline.com";
    $subject = "Prismoline Portal | New Job Application";

    $content = chunk_split(base64_encode(file_get_contents($file_tmp)));

    $separator = md5(time());
    $eol = "\r\n";

    $headers  = "From: noreply@prismoline.com" . $eol;
    $headers .= "Reply-To: $email" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"$separator\"" . $eol;

    $body  = "--$separator" . $eol;
    $body .= "Content-Type: text/html; charset=UTF-8" . $eol;
    $body .= "Content-Transfer-Encoding: 7bit" . $eol . $eol;

    $body .= "
        <h2>New Job Application Received</h2>

        <table cellpadding='8' border='1' cellspacing='0'>
            <tr>
                <td><b>Name</b></td>
                <td>$name</td>
            </tr>

            <tr>
                <td><b>Email</b></td>
                <td>$email</td>
            </tr>

            <tr>
                <td><b>Phone</b></td>
                <td>$phone</td>
            </tr>

            <tr>
                <td><b>Position</b></td>
                <td>$position</td>
            </tr>

            <tr>
                <td><b>Reason</b></td>
                <td>$reason</td>
            </tr>
        </table>
    ";

    $body .= $eol;
    $body .= "--$separator" . $eol;
    $body .= "Content-Type: $file_type; name=\"$file_name\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment; filename=\"$file_name\"" . $eol . $eol;
    $body .= $content . $eol;
    $body .= "--$separator--";

    $isMailSent = mail($to, $subject, $body, $headers);

    if ($isMailSent) {
        $data = [
            "status" => 1,
            "msg"    => "We have received your resume successfully. We will contact you if you match our requirements.",
        ];

    } else {
        $data = [
            "status" => 0,
            "msg"    => "Resume could not be sent.",
        ];
    }

} else if ($action == 'download_brochure') {

    $name      = isset($_POST['name']) ? sanitizeInput($con, $_POST['name']) : '';
    $phone     = isset($_POST['phone']) ? sanitizeInput($con, $_POST['phone']) : '';
    $company   = isset($_POST['company']) ? sanitizeInput($con, $_POST['company']) : '';

    if (
        empty($name) ||
        empty($phone) ||
        empty($company)
    ) {

        echo json_encode([
            "status" => 0,
            "msg"    => "All fields are required."
        ]);
        exit;
    }

    $to      = "info@prismoline.com";
    $subject = "Prismoline Portal | New Brochure Download Request";

    $message = "
        <h3>Brochure Download Request</h3>

        <table cellpadding='8' border='1' cellspacing='0'>
            <tr>
                <td><b>Name</b></td>
                <td>$name</td>
            </tr>

            <tr>
                <td><b>Company</b></td>
                <td>$company</td>
            </tr>

            <tr>
                <td><b>Phone</b></td>
                <td>$phone</td>
            </tr>
        </table>
    ";

    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Website <noreply@yourdomain.com>" . "\r\n";

    if (mail($to, $subject, $message, $headers)) {
        $data = [
            "status" => 1,
            "msg"    => "Brochure request submitted successfully.",
            "file"   => "assets/brochure/company-brochure.pdf"
        ];
    } else {
        $data =[
            "status" => 0,
            "msg"    => "Unable to send request mail."
        ];
    }

} else {
    $data['error'] = "Invalid Type";
}

echo json_encode($data);
mysqli_close($con);
exit;
