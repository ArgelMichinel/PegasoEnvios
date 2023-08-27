<?php

include __DIR__ . '/../include/phpqrcode/qrlib.php';

if (isset($_GET['id'])) {

    $codeText = $_GET['id'] . ',"hash_code":"UA+Y5LGKngmFu6E3C0oeuHJ7gTQhKyhrNt38qC01EFA=","security_digit":"0"}'; // remember to sanitize that - it is user input!

    // we need to be sure ours script does not output anything!!!
    // otherwise it will break up PNG binary!

    ob_start("callback");

    // end of processing here
    $debugLog = ob_get_contents();
    ob_end_clean();

    // outputs image directly into browser, as PNG stream
    QRcode::png($codeText);
}
