<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
  <?php
   if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        require_once "config.php";

        $id = trim($_GET["id"]);
        $query = mysqli_query($conn, "SELECT * FROM users WHERE ID = '$id'");

        if ($users = mysqli_fetch_assoc($query)) {
            $id = $users["id"];
            $name = $users["Name"];
            $description = $users["Description"];
            $classification = $users["Classification"];
        } else {
            header("location: read.php");
            exit();
        }

        mysqli_close($conn);
    } else {
        header("location: read.php");
        exit();
    }
  ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1> User View</h1>
                    </div>
                    <div class="form-group">
                        <label>id</label>
                        <p class="form-control-static"><?php echo $id ?></p>
                    </div>
                    <div class="form-group">
                        <label>name</label>
                        <p class="form-control-static"><?php echo $name ?></p>
                    </div>
                    <div class="form-group">
                        <label>description</label>
                        <p class="form-control-static"><?php echo $description ?></p>
                    </div>
                    <div class="form-group">
                        <label>classification</label>
                        <p class="form-control-static"><?php echo $classification ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>