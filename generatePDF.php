<?php

require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

$firstname = $_POST["firstname"];
$surname = $_POST["surname"];
$othername = $_POST["othername"];
$matriculationNumber = $_POST["matriculationNumber"];
$applicationNumber = $_POST["applicationNumber"];
$dateOfBirth = $_POST["dateOfBirth"];
// $quantity = $_POST["quantity"];

//$html = '<h1 style="color: green">Example</h1>';
//$html .= "Hello <em>$name</em>";
//$html .= '<img src="example.png">';
//$html .= "Quantity: $quantity";

/**
 * Set the Dompdf options
 */
$options = new Options;
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);

$dompdf = new Dompdf($options);

/**
 * Set the paper size and orientation
 */
$dompdf->setPaper("A4", "portrait");

/**
 * Load the HTML and replace placeholders with values from the form
 */
$html = file_get_contents("template.html");

$html = str_replace(["{{firstname}}","{{surname}}","{{ othername }}","{{matriculationNumber}}","{{ applicationNumber }}","{{ dateOfBirth }}",], [$firstname,$surname,$othername,$matriculationNumber,$applicationNumber,$dateOfBirth], $html);

$dompdf->loadHtml($html);
//$dompdf->loadHtmlFile("template.html");

/**
 * Create the PDF and set attributes
 */
$dompdf->render();

$dompdf->addInfo("Title", "An Example PDF"); // "add_info" in earlier versions of Dompdf

/**
 * Send the PDF to the browser
 */
$dompdf->stream("invoice.pdf", ["Attachment" => 0]);

/**
 * Save the PDF file locally
 */
$output = $dompdf->output();
file_put_contents("file.pdf", $output);
