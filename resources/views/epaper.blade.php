<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('assets/css/epaper.css')}}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <title>Fixed Navbar Example</title>
    </head>
      <style>
        /* Custom Styles */

    </style>

    <body class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ep-header">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="{{ asset('assets/images/logo-light.png')}}" height="50" alt="" /> </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item ep-header-nav-item">
                            <a class="nav-link ep-header-nav-link mt-1" href="#">
                                <input type="date" value="" class="date-input">{{ date('d-m-Y') }}
                            </a>
                        </li>
                        <li class="nav-item ep-header-nav-item dropdown">
                            <a class="nav-link ep-header-nav-link dropdown-toggle mt-1" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="fa fa-newspaper-o" aria-hidden="true"></i>  Indore
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item sub-heading" href="">Indore</a></li>
                                <li><a class="dropdown-item sub-heading" href="">Bhopal</a></li>
                                <li><a class="dropdown-item sub-heading" href="">Dewas</a></li>
                                <li><a class="dropdown-item sub-heading" href="">Ujjain</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ep-header-nav-item dropdown">
                            <a class="nav-link ep-header-nav-link dropdown-toggle  mt-1" href="#" id="navbarDropdownMenuLinkPage" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="fa fa-file-text" aria-hidden="true"></i>  Page
                            </a>
                            <ul class="dropdown-menu ep-nav-page-dropdown" aria-labelledby="navbarDropdownMenuLinkPage">
                                <li><a class="dropdown-item sub-heading" href="">1</a></li>
                                <li><a class="dropdown-item sub-heading" href="">2</a></li>
                                <li><a class="dropdown-item sub-heading" href="">3</a></li>
                                <li><a class="dropdown-item sub-heading" href="">4</a></li>
                                <li><a class="dropdown-item sub-heading" href="">5</a></li>
                                <li><a class="dropdown-item sub-heading" href="">6</a></li>
                                <li><a class="dropdown-item sub-heading" href="">7</a></li>
                                <li><a class="dropdown-item sub-heading" href="">8</a></li>
                                <li><a class="dropdown-item sub-heading" href="">9</a></li>
                                <li><a class="dropdown-item sub-heading" href="">10</a></li>
                                <li><a class="dropdown-item sub-heading" href="">11</a></li>
                                <li><a class="dropdown-item sub-heading" href="">12</a></li>
                                <li><a class="dropdown-item sub-heading" href="">13</a></li>
                                <li><a class="dropdown-item sub-heading" href="">14</a></li>
                                <li><a class="dropdown-item sub-heading" href="">15</a></li>
                                <li><a class="dropdown-item sub-heading" href="">16</a></li>
                            </ul>
                        </li>

                        <li class="nav-item ep-header-nav-item">

                            <a class="nav-link ep-header-nav-link" href="#">
                                <div class="ep-zoom-button">
                                    <i class="fa fa-plus zoom" id="plus" aria-hidden="true"></i>
                                    <span>Zoom</span>
                                    <i class="fa fa-minus zoom-out" id="minus" aria-hidden="true"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item ep-header-nav-item ">
                            <a class="nav-link ep-header-nav-link  mt-1" href="#"><i class="fa fa-download" aria-hidden="true"></i></a>
                        </li>
                        <li class="nav-item ep-header-nav-item">
                            <a class="nav-link ep-header-nav-link  mt-1" href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Your page content goes here -->
        <div class="ep-main-section" style="overflow-x: hidden !important;">
            <!-- Page Content -->
            <div class="m-0" style="overflow-x: hidden !important;" >
                <div class="row" style="overflow-x: hidden !important;">

                    <!-- Fixed Column 1 -->
                    <div class="col-md-1 fixed-column d-flex flex-column justify-content-center align-items-center">
                        <i class="fa fa-chevron-left ep-content-button" aria-hidden="true"></i>
                        <!-- Add your fixed content here -->
                    </div>

                    <!-- Scrollable Column 2 -->
                    <div class="col-md-10 scrollable-column target " style="overflow-x: hidden !important;" >
                        <img class="" src="{{ asset('assets/images/youtube.jpg') }}" draggable="true" alt="">
                    </div>

                    <!-- Fixed Column 3 -->
                    <div class="col-md-1 fixed-column d-flex flex-column justify-content-center align-items-center">
                        <i class="fa fa-chevron-right ep-content-button" aria-hidden="true"></i>
                        <!-- Add your fixed content here -->
                    </div>

                </div>
            </div>


        </div>

         <!-- Fixed Footer -->
    <footer class="fixed-bottom bg-white p-3">
        <div class="container text-center">
            <!-- Add your footer content here -->
           <div class="d-flex pagination justify-content-center align-items-center">
              <span><</span>
              <span>J1</span>
              <span>J2</span>
              <span>1</span>
              <span>2</span>
              <span class="pagination-active">3</span>
              <span>4</span>
              <span>5</span>
              <span>6</span>
              <span>7</span>
              <span>8</span>
              <span>9</span>
              <span>10</span>
              <span>11</span>
              <span>12</span>
              <span>13</span>
              <span>14</span>
              <span>15</span>
              <span>16</span>
              <span>></span>
           </div>
        </div>
    </footer>
    </body>

    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>



        $('.scrollable-column').draggable();
        		var zoom = 1;

        // Flag to track if the condition is satisfied
        var conditionSatisfied = false;
        var conditionSatisfied1 = false;

        $('.zoom-out').on('click', function () {
            if (!conditionSatisfied) {
                zoom -= 0.1;

                if (areEqualWithTolerance(zoom, 0.10000000000000014, 0.0000000001)) {
                    $('#minus').removeClass('zoom-out');
                     $('#minus').css('color', '#ccc');
                    conditionSatisfied = true; // Set the flag to true
                } else {
                    $('.target').css('transform', 'scale(' + zoom + ')');
                }
            }
        });

        $('.zoom').on('click', function () {
            if (!conditionSatisfied1) {
                zoom += 0.1;

                if (areEqualWithTolerance(zoom, 2, 0.0000000001)) {
                    $('#plus').removeClass('zoom');
                     $('#plus').css('color', '#ccc');
                    conditionSatisfied1 = true; // Set the flag to true
                } else {
                    $('.target').css('transform', 'scale(' + zoom + ')');
                }
            }
        });

         // Function to compare floating-point numbers with tolerance
        function areEqualWithTolerance(a, b, tolerance) {
            return Math.abs(a - b) < tolerance;
        }




    </script>
</html>
