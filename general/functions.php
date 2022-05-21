<?php

function testmessage($condation, $massage)
{
    if ($condation) {
        echo "<div class='alert alert-success mx-auto w-25 text-center'>
        <h3> this $massage is true </h3>
        </div>";
    } else {
        echo "<div class='alert alert-danger mx-auto w-25 text-center'>
        <h3> this $massage is false </h3>
        </div>";
    }
}
