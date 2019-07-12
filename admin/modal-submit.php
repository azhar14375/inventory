  <?php
  include('config/database.php'); 
  if(isset($_POST['submit']))
        {
            if (isset($_GET['id']))
            {
                $id = $_GET['id'];
                $checkbox = $_POST['checkbox'];
                $q = "INSERT INTO sales(p_returned) VALUES('$checkbox') WHERE id = '$id' ";
                if (mysqli_query($conn , $q)) {
                    echo "<script>alert('Success');</script>";
                }
                else
                {
                    echo "failed";
                }
            }
        }

         ?>