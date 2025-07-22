<?php
require('TCPDF/tcpdf.php');

// Function to get uploaded file content as base64
function getBase64Image($fieldName) {
    $base64Images = array();
    if (!empty($_FILES[$fieldName]['tmp_name'])) {
        foreach ($_FILES[$fieldName]['tmp_name'] as $key => $tmp_name) {
            if ($_FILES[$fieldName]['size'][$key] > 0) {
                $file_type = $_FILES[$fieldName]['type'][$key];
                $file_data = file_get_contents($tmp_name);
                $base64Images[] = 'data:' . $file_type . ';base64,' . base64_encode($file_data);
            }
        }
    }
    return $base64Images;
}

// Get form data
$Department = $_POST['Department'] ?? '';
$activity_name = $_POST['activity_name'] ?? '';
$venue = $_POST['venue'] ?? '';
$start_date = $_POST['start_date'] ?? '';
$end_date = $_POST['end_date'] ?? '';
$resource_person = $_POST['resource_person'] ?? '';
$activity_incharge = $_POST['activity_incharge'] ?? '';
$outcome = $_POST['outcome'] ?? '';
$participants = $_POST['participants'] ?? '';

// Get file uploads as base64
$photo_paths = getBase64Image('photo');
$cv_paths = getBase64Image('resource_person_cv');
$list_committees_paths = getBase64Image('list_committees');
$list_of_participants_paths = getBase64Image('list_of_participants');
$pamphlet_paths = getBase64Image('pamphlet');
$detailed_report = $_POST['detailed_report'] ?? '';
$invitation_letter_paths = getBase64Image('invitation_letter');
$thanks_letter_paths = getBase64Image('thanks_letter');

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Activity Report');

// Add a page
$pdf->AddPage();

// Start HTML content with embedded CSS for styling
$html = '
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-family: Arial, sans-serif;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
            font-size: 14px;
            font-weight: bold;
        }

        .report {
            text-align: left;
            font-size: 14px;
            font-weight: none;
        }

         .report-height1{
            height: 750px;
        }
        .report-height2 {
            height: 500px;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            font-size: 12px;
        }

        .header {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        .image {
            width: auto; 
            height: auto; 
            
        }

        .box-height {
            height: 86px;
        }
    </style>
      
    <div class="header">
        <h2>Vidya Bharati Mahavidyalaya Camp Amravati Report Submitted to MIS</h2>
        <h2>'.$Department.'</h2>
    </div>

    <table>
        <tr>
            <th width="5%">Sr No</th>
            <th width="20%">Content Name</th>
            <th width="75%">Content</th>
        </tr>
        <tr>
            <td class="box-height">1.</td>
            <td>Name of the Activity</td>
            <td>'.$activity_name.'</td>
        </tr>
        <tr>
            <td class="box-height">2.</td>
            <td>Venue</td>
            <td>'.$venue.'</td>
        </tr>
        <tr>
            <td class="box-height">3.</td>
            <td>Start Date</td>
            <td>'.$start_date.'</td>
        </tr>
        <tr>
            <td class="box-height">4.</td>
            <td>End Date</td>
            <td>'.$end_date.'</td>
        </tr>
        <tr>
            <td class="box-height">5.</td>
            <td>Resource Person</td>
            <td>'.$resource_person.'</td>
        </tr>
        <tr>
            <td class="box-height">6.</td>
            <td>Activity Incharge</td>
            <td>'.$activity_incharge.'</td>
        </tr>
        <tr>
            <td class="box-height">7.</td>
            <td>Number of Participants</td>
            <td>'.$participants.'</td>
        </tr>
';

// Add detailed report
$html .= '<tr>
            <td class="report-height1">8.</td>
            <td>Detailed Report</td>
            <td><p class="report">'.nl2br($detailed_report).'</p></td>
        </tr>';


// Add uploaded list of committees
if (!empty($list_committees_paths)) {
    $html .= '<tr>
                <td>9.</td>
                <td>List of Committees</td>
                <td>';
    foreach ($list_committees_paths as $list_committees_path) {
        $html .= '<br><br><br><img src="' . $list_committees_path . '" class="image" /><br><br><br>';
    }
    $html .= '</td></tr>';
}

// Add uploaded list of participants
if (!empty($list_of_participants_paths)) {
    $html .= '<tr>
                <td>10.</td>
                <td>List of Participants</td>
                <td>';
    foreach ($list_of_participants_paths as $list_of_participants_path) {
        $html .= '<img src="' . $list_of_participants_path . '" class="image" />';
    }
    $html .= '</td></tr>';
}

// Add pamphlet
if (!empty($pamphlet_paths)) {
    $html .= '<tr>
                <td>11.</td>
                <td>Pamphlet</td>
                <td>';
    foreach ($pamphlet_paths as $pamphlet_path) {
        $html .= '<img src="' . $pamphlet_path . '" class="image" />';
    }
    $html .= '</td></tr>';
}




// Add photos if any
if (!empty($photo_paths)) {
    $html .= '<tr>
                <td>12.</td>
                <td>Photos</td>
                <td>';
    foreach ($photo_paths as $photo_path) {
        $html .= '<img src="' . $photo_path . '" class="image" />';
    }
    $html .= '</td></tr>';
}

// Add CV of resource person
if (!empty($cv_paths)) {
    $html .= '<tr>
                <td>13.</td>
                <td>CV of Resource Person</td>
                <td>';
    foreach ($cv_paths as $cv_path) {
        $html .= '<img src="' . $cv_path . '" class="image" />';
    }
    $html .= '</td></tr>';
}

// Add invitation letter
if (!empty($invitation_letter_paths)) {
    $html .= '<tr>
                <td>14.</td>
                <td>Invitation Letter</td>
                <td>';
    foreach ($invitation_letter_paths as $invitation_letter_path) {
        $html .= '<img src="' . $invitation_letter_path . '" class="image" />';
    }
    $html .= '</td></tr>';
}

// Add thanks letter
if (!empty($thanks_letter_paths)) {
    $html .= '<tr>
                <td>15.</td>
                <td>Thanks Letter</td>
                <td>';
    foreach ($thanks_letter_paths as $thanks_letter_path) {
        $html .= '<img src="' . $thanks_letter_path . '" class="image" />';
    }
    $html .= '</td></tr>';
}

// Add outcome of the activity
$html .= '<tr class="report-height2">
            <td>16.</td>
            <td>Outcome of the Activity</td>
            <td class="report"><p>'.nl2br($outcome).'</p></td>
        </tr>';

// Closing the table
$html .= '</table><br>';

// Write the HTML content to the PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Move to the bottom of the page for signatures
$pdf->Ln(80);
$pdf->SetY(-1); // Adjust the Y position from the bottom of the page. You can change this value to adjust the vertical position.

// Row 1: Signature of In-charge and HOD side by side
$pdf->Cell(90, 10, 'Signature of In-charge with stamp', 0, 0, 'C');
$pdf->Cell(90, 10, 'Signature of the HOD with Stamp', 0, 1, 'C');

// Add a line break for spacing
$pdf->Ln(80); // Add 10 units of space (adjust as needed)


// Row 2: Signature of IQAC Coordinator and Principal side by side
$pdf->Cell(90, 10, 'Signature IQAC Coordinator, VBMV Amravati', 0, 0, 'C');
$pdf->Cell(90, 10, 'Signature of Principal, VBMV Amravati', 0, 1, 'C');

// Output the PDF
$pdf->Output('activity_report.pdf', 'I');
?>
