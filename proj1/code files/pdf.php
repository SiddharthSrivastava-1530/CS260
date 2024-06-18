<?php
require('fpdf186/fpdf.php');

$server = "localhost";
$username = "root";
$password = "mysql123";
$database = "mydatabase";

$conn = mysqli_connect($server, $username, $password, $database,3307);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// $query1 = "SELECT * FROM masters_deg";
// $result1 = mysqli_query($conn, $query1);

// $query2 = "SELECT * FROM bachelors_deg";
// $result2 = mysqli_query($conn, $query2);

// $query3 = "SELECT * FROM phd_thesis";
// $result3 = mysqli_query($conn, $query3);

// $query4 = "SELECT * FROM edu_phd_details";
// $result4 = mysqli_query($conn, $query4);

// $query5 = "SELECT * FROM edu_pg_details";
// $result5 = mysqli_query($conn, $query5);

// $query6 = "SELECT * FROM edu_ug_details";
// $result6 = mysqli_query($conn, $query6);

// $query7 = "SELECT * FROM edu_school_details";
// $result7 = mysqli_query($conn, $query7);

// $query8 = "SELECT * FROM edu_additional_details";
// $result8 = mysqli_query($conn, $query8);

// $query9 = "SELECT * FROM declaration_status";
// $result9 = mysqli_query($conn, $query9);

// $query10 = "SELECT * FROM personal_details";
// $result10 = mysqli_query($conn, $query10);

// $query11 = "SELECT * FROM correspondence_address";
// $result11 = mysqli_query($conn, $query11);

// $query12 = "SELECT * FROM permanent_address";
// $result12 = mysqli_query($conn, $query12);

// $query13 = "SELECT * FROM mobile_email";
// $result13 = mysqli_query($conn, $query13);

// $query14 = "SELECT * FROM professional_societies";
// $result14 = mysqli_query($conn, $query14);

// $query15 = "SELECT * FROM professional_training";
// $result15 = mysqli_query($conn, $query15);

// $query32 = "SELECT * FROM award_recognition";
// $result32 = mysqli_query($conn, $query32);


// $query16 = "SELECT * FROM sponsored_projects";
// $result16 = mysqli_query($conn, $query16);

// $query17 = "SELECT * FROM consultancy_projects";
// $result17 = mysqli_query($conn, $query17);

// $query18 = "SELECT * FROM publications";
// $result18 = mysqli_query($conn, $query18);

// $query19 = "SELECT * FROM best10";
// $result19 = mysqli_query($conn, $query19);

// $query20 = "SELECT * FROM patents";
// $result20 = mysqli_query($conn, $query20);

// $query21 = "SELECT * FROM books";
// $result21 = mysqli_query($conn, $query21);

// $query22 = "SELECT * FROM chapters";
// $result22 = mysqli_query($conn, $query22);

// $query23 = "SELECT * FROM  URL";
// $result23 = mysqli_query($conn, $query23);

// $query24 = "SELECT * FROM present_employment";
// $result24 = mysqli_query($conn, $query24);

// $query25 = "SELECT * FROM history";
// $result25 = mysqli_query($conn, $query25);

// $query26 = "SELECT * FROM research";
// $result26 = mysqli_query($conn, $query26);

// $query27 = "SELECT * FROM teaching";
// $result27 = mysqli_query($conn, $query27);

// $query28 = "SELECT * FROM industry";
// $result28 = mysqli_query($conn, $query28);

// $query29 = "SELECT * FROM area";
// $result29 = mysqli_query($conn, $query29);

// $query30 = "SELECT * FROM relinfo";
// $result30 = mysqli_query($conn, $query30);

// $query31 = "SELECT * FROM refrees";
// $result31 = mysqli_query($conn, $query31);
$query1 = "SELECT * FROM masters_deg ORDER BY applicant_id DESC LIMIT 3";
$result1 = mysqli_query($conn, $query1);

$query2 = "SELECT * FROM bachelors_deg ORDER BY applicant_id DESC LIMIT 3";
$result2 = mysqli_query($conn, $query2);

$query3 = "SELECT * FROM phd_thesis ORDER BY applicant_id DESC LIMIT 3";
$result3 = mysqli_query($conn, $query3);

$query4 = "SELECT * FROM edu_phd_details ORDER BY applicant_id DESC LIMIT 1";
$result4 = mysqli_query($conn, $query4);

$query5 = "SELECT * FROM edu_pg_details ORDER BY applicant_id DESC LIMIT 1";
$result5 = mysqli_query($conn, $query5);

$query6 = "SELECT * FROM edu_ug_details ORDER BY applicant_id DESC LIMIT 3";
$result6 = mysqli_query($conn, $query6);

$query7 = "SELECT * FROM edu_school_details ORDER BY applicant_id DESC LIMIT 2";
$result7 = mysqli_query($conn, $query7);

$query8 = "SELECT * FROM edu_additional_details ORDER BY applicant_id DESC LIMIT 3";
$result8 = mysqli_query($conn, $query8);

$query9 = "SELECT * FROM declaration_status ORDER BY applicant_id DESC LIMIT 3";
$result9 = mysqli_query($conn, $query9);

$query10 = "SELECT * FROM personal_details ORDER BY applicant_id DESC LIMIT 1";
$result10 = mysqli_query($conn, $query10);

$query11 = "SELECT * FROM correspondence_address ORDER BY applicant_id DESC LIMIT 1";
$result11 = mysqli_query($conn, $query11);

$query12 = "SELECT * FROM permanent_address ORDER BY applicant_id DESC LIMIT 1";
$result12 = mysqli_query($conn, $query12);

$query13 = "SELECT * FROM mobile_email ORDER BY applicant_id DESC LIMIT 1";
$result13 = mysqli_query($conn, $query13);

$query14 = "SELECT * FROM professional_societies ORDER BY applicant_id DESC LIMIT 3";
$result14 = mysqli_query($conn, $query14);

$query15 = "SELECT * FROM professional_training ORDER BY applicant_id DESC LIMIT 3";
$result15 = mysqli_query($conn, $query15);

$query32 = "SELECT * FROM award_recognition ORDER BY applicant_id DESC LIMIT 1";
$result32 = mysqli_query($conn, $query32);

$query16 = "SELECT * FROM sponsored_projects ORDER BY applicant_id DESC LIMIT 3";
$result16 = mysqli_query($conn, $query16);

$query17 = "SELECT * FROM consultancy_projects ORDER BY applicant_id DESC LIMIT 3";
$result17 = mysqli_query($conn, $query17);

$query18 = "SELECT * FROM publications ORDER BY applicant_id DESC LIMIT 1";
$result18 = mysqli_query($conn, $query18);

$query19 = "SELECT * FROM best10 ORDER BY applicant_id DESC LIMIT 4";
$result19 = mysqli_query($conn, $query19);

$query20 = "SELECT * FROM patents ORDER BY applicant_id DESC LIMIT 3";
$result20 = mysqli_query($conn, $query20);

$query21 = "SELECT * FROM books ORDER BY applicant_id DESC LIMIT 3";
$result21 = mysqli_query($conn, $query21);

$query22 = "SELECT * FROM chapters ORDER BY applicant_id DESC LIMIT 3";
$result22 = mysqli_query($conn, $query22);

$query23 = "SELECT * FROM URL ORDER BY applicant_id DESC LIMIT 1";
$result23 = mysqli_query($conn, $query23);

$query24 = "SELECT * FROM present_employment ORDER BY applicant_id DESC LIMIT 1";
$result24 = mysqli_query($conn, $query24);

$query25 = "SELECT * FROM history ORDER BY applicant_id DESC LIMIT 2";
$result25 = mysqli_query($conn, $query25);

$query26 = "SELECT * FROM research ORDER BY applicant_id DESC LIMIT 4";
$result26 = mysqli_query($conn, $query26);

$query27 = "SELECT * FROM teaching ORDER BY applicant_id DESC LIMIT 3";
$result27 = mysqli_query($conn, $query27);

$query28 = "SELECT * FROM industry ORDER BY applicant_id DESC LIMIT 5";
$result28 = mysqli_query($conn, $query28);

$query29 = "SELECT * FROM area ORDER BY applicant_id DESC LIMIT 3";
$result29 = mysqli_query($conn, $query29);

$query30 = "SELECT * FROM relinfo ORDER BY applicant_id DESC LIMIT 6";
$result30 = mysqli_query($conn, $query30);

$query31 = "SELECT * FROM refrees ORDER BY applicant_id DESC LIMIT 2";
$result31 = mysqli_query($conn, $query31);


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Times', 'B', 8);
$pdf->SetFillColor(196, 247, 249);
$pdf->SetDrawColor(115, 10, 145);


$cellWidth = 60; // Set the width of each cell

// Display data from masters_deg table
$pdf->Cell($cellWidth * 3, 10, 'Research supervision-Phd thesis supervision', 1, 1, 'C');

while ($row = mysqli_fetch_assoc($result3)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}
$pdf->Ln();

// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'Research supervision- mtech degree ', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result1)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}

$pdf->Ln();

// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'Research supervision-  btech degree', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result2)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}
$pdf->Ln();

// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'educational qualifications-phd details', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result4)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}
$pdf->Ln();

// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'educational qualifications- mtech details', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result5)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}

$pdf->Ln();

// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'educational qualifications- btech details', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result6)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}

$pdf->Ln();

// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'educational qualifications- school details', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result7)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}

$pdf->Ln();

// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'educational qualifications- additional details', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result8)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}
$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'payment details', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result9)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}
$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'personal details', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result10)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}
$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'personal details:correspondence address', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result11)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}
$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'personal details:permanent address', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result12)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}
$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'personal details:contact details', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result13)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}

$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'Membership of professional societies', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result14)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}

$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'Professional training', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result15)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}

$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'Awards and Recognition', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result32)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}

$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'Sponsored Projects', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result16)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}

$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'Consultancy Projects', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result17)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}

$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'Sumary of publications', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result18)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}

$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'Best 10 Publications', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result19)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}

$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'List of patents', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result20)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}

$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'List of books', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result21)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}

$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'List of book chapters', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result22)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}
$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'Google scholar link', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result23)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}
$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'Employment details:present employment', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result24)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}
$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'Employment details: employment history', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result25)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}

$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'Employment details: research experience', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result26)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}
$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'Employment details:teaching experience', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result27)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}
$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'Employment details: industrial experience', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result28)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}
$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'Employment details: area of research and specialization', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result29)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}

$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'relavant information', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result30)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}

$pdf->Ln();
// Display data from bachelors_deg table
$pdf->Cell($cellWidth * 3, 10, 'Refrees', 1, 1, 'C');
while ($row = mysqli_fetch_assoc($result31)) {
    $i = 0;
    foreach ($row as $value) {
        if ($i % 3 == 0) {
            $pdf->Ln();
        }
        $pdf->Cell($cellWidth, 10, $value, 1, 0);
        $i++;
    }
    $pdf->Ln();
}
mysqli_close($conn);

// Output PDF to browser
$pdfFilePath = 'output.pdf';
$pdf->Output($pdfFilePath, 'F'); // Save PDF to a file

echo $pdfFilePath; // Send PDF file path in response
?>
