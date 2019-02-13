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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <style>
        html, body {
            font-family: 'Ubuntu', sans-serif;
            background-color: #fafafa;
        }

        .to_do_lists {
            margin: 20px 20px;
            border: 1px solid black;
            padding: 10px;
            border-radius: 5px;
            /*width: 100%;*/
        }

        table thead tr{
            -webkit-box-shadow: 0px 6px 18px -3px rgba(0,0,0,0.61);
            -moz-box-shadow: 0px 6px 18px -3px rgba(0,0,0,0.61);
            box-shadow: 0px 6px 18px -3px rgba(0,0,0,0.61);
        }

        table th {
            margin-top: 20px;
            padding: 10px 10px;
            letter-spacing: 1px;
            background-color: #37474f;
            color: #fff;
        }

        table th:first-child{
            border-radius: 10px 0 0 0;
        }

        table th:last-child{
            border-radius:0 10px 0 0;
        }

        .dataTables_wrapper .dataTables_filter input[type=search] {
            font-family: Georgia, "Times New Roman", Times, serif;
            background: rgba(255,255,255,.1);
            border: none;
            border-radius: 4px;
            font-size: 15px;
            margin: 0;
            outline: 0;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            background-color: #e8eeef;
            color:#8a97a0;
            -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
            box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>

<div class="header">

    <div class="title">
        <h2>

            Dashboard

        </h2>
    </div>

</div>

<div class="container">
    <div class="col-md-12 to_do_lists">
        <table id="list_table" class="stripe row-border hover cell-border">
            <thead style="margin-top: 20px">
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Date Time</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script>

    $(document).ready(function () {
        $('#list_table').dataTable({
            ajax: '{{url("lists/all")}}',
            dataSrc: 'data',
            language: {
                search: "",
                searchPlaceholder: "Search :"
            },
            columns: [
                {data : 'id'},
                {data : 'name'},
                {data : 'description'},
                {data : 'status'},
                {data : 'created_at'},
            ]
        });

        // Margin between table and table list length dropdown
        $("#list_table_length").css("margin-bottom", "20px")
    });
</script>
</html>

