<?php
if (isset($_GET['cv'])) {
    $cvFile = '../cv/' . basename($_GET['cv']);
    $xslFile = '../cv/style.xsl';
    if (file_exists($cvFile) && file_exists($xslFile)) {
        // Load the XML source
        $xml = new DOMDocument;
        $xml->load($cvFile);

        // Load the XSL source
        $xsl = new DOMDocument;
        $xsl->load($xslFile);

        // Configure the transformer
        $proc = new XSLTProcessor;
        $proc->importStyleSheet($xsl); // Attach the XSL rules

        // Transform the XML into HTML and output
        echo $proc->transformToXML($xml);
    } else {
        echo 'Le fichier CV ou le fichier de style n\'existe pas.';
    }
} else {
    echo 'Aucun CV spécifié.';
}
?>
