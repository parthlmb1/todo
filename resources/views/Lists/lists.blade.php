<?php
/**
 * Created by PhpStorm.
 * User: srhvpc
 * Date: 2/9/2019
 * Time: 3:20 PM
 */
?>
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div class="container">

    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $.ajax({
            url: '{{url("lists/all")}}',
            method: "GET",
            success: function (data) {
                console.log(data);
            },
            error: function () {
                console.log("Error");
            }
        });
    });
</script>
</html>

