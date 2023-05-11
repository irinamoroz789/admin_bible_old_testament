<?php

function delOldResultTests()
{
    $days = 30/(30*24);
    $seconds = time() - $days * 24 * 60 * 60;
    $date = date('Y-m-d H:i:s', $seconds);

    $conn->query("DELETE FROM result_tests WHERE updated_at < '" . $date . " ' ");
}