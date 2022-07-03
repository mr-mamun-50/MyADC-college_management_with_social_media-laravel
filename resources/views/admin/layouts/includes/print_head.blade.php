<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Admin | MyADC</title>
    <link rel="shortcut icon" type="image" href="{{ asset('images/logos/icon_dark.png') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('dist/css/print.css') }}" media="print">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}" media="screen">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"
        integrity="sha512-01CJ9/g7e8cUmY0DFTMcUw/ikS799FHiOA0eyHsUWfOetgbx/t6oV4otQ5zXKQyIrQGTHSmRVPIgrgLcZi/WMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function shot() {

            domtoimage.toJpeg(document.querySelector('.htmlContent'), {
                    quality: 1.00
                })
                .then(function(dataUrl) {
                    var link = document.createElement('a');
                    link.download = "<?php
                    if (isset($data)) {
                        if (isset($data->name)) {
                            echo $data->name . '_' . $type . '.jpeg';
                        }
                    } ?>";
                    link.href = dataUrl;
                    link.click();
                });
        }
    </script>
</head>
