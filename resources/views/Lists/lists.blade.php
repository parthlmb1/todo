<?php
/**
 * Created by PhpStorm.
 * User: Parth
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
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <style>
        html, body {
            font-family: 'PT Sans', sans-serif;
            background-color: #fafafa;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="col-md-12 to_do_lists" style="width:100%;">

    </div>
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $.ajax({
            url: '{{url("lists/all")}}',
            method: "GET",
            success: function (data) {
                let listsCount = data.length;
                for (let count = 0; count < listsCount; count += 1) {
                    let htmlString =
                        "<div class='col-sm-4' style='margin:20px; padding:20px; display:inline-block; height:250px; border-radius: 10px; box-shadow: 1px 1px 5px'>" +
                        "<div class='col-sm-12' style='font-size:24px;color:#616161'>" +
                        "<h4>" + data[count]["name"] + "</h4>" +
                        "<p style='text-align:right;margin-top:-65px;padding-top:5px;'> <i class='material-icons'>add_circle_outline</i> </p>" +
                        "</div>" +
                        "<div>" +
                        "<p style='font-size:18px;color:#757575'>" + data[count]["description"] + "</p>" +
                        "</div>" +
                        "</div>";
                    $(".to_do_lists").append(htmlString);
                }
            },
            error: function () {
                console.log("Error");
            }
        });
    });
</script>
</html>

