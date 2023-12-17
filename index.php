<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }

        table tr td:last-child {
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>

    <div class="container-fluid">
        <div class="row align-items-center bg-dark bg-opacity-75" id="home">
            <div class="col-lg-3">
                <div class="text-start m-5 text-white d-none d-lg-block">
                    <h1>ARTICS MONKEY LAMPUNG TOUR 2023
                    </h1>
                    <style>
                        .yellow-text {
                            color: red;
                        }
                    </style>

                    <h4 class="yellow-text">
                        28.02 BANDAR LAMPUNG<br>
                        LAPANGAN SABURAI<br><br>

                        01.03 KORPRI<br>
                        LAPANGAN TVRI<br><br>

                        05.03 WAY HALIM<br>
                        STADION SUMPAH PEMUDA
                    </h4>
                </div>
            </div>
            <div class="col-lg-8">
                <img class="image-fluid w-100 h-100 opacity-50" src="./assets/poster.jpg" alt="Concert" />
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-12">
            <div class="mt-5 mb-3 clearfix">
                <h2 class="pull-left">Ticket Event</h2>
                <a href="./create/create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Participant</a>
            </div>
            <?php
            require_once "../config.php";

            // Attempt select query execution
            $sql = "SELECT * FROM ticket";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo '<table class="table table-bordered table-striped">';
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>id</th>";
                    echo "<th>ticket</th>";
                    echo "<th>Judul Tiket</th>";
                    echo "<th>Deskripsi tiket</th>";
                    echo "<th>Action</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['tittle'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>";
                        echo '<a href="./read/read.php?id=' . $row['id'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                        echo '<a href="./update/update.php?id=' . $row['id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                        echo '<a href="./delete/delete.php?id=' . $row['id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                    // Free result set
                    mysqli_free_result($result);
                } else {
                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close connection
            mysqli_close($link);
            ?>
        </div>
    </div>
    </div>

</body>

</html>