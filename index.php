<?php
    include('dbcon.php');
?>

<html>  
    <head>
        <title>Delete multiple records with php and ajax</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="author" content="Adhirsaurio" />
        <meta name="description" content="Delete multiple records with php and ajax" />
        <link href="assets/css/styles.css" rel="stylesheet" />
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/fontawesome.js"></script>  
    </head>  

    <body class="d-flex flex-column min-vh-100">
        
        <span id="forkongithub"><a href="https://github.com/adhirsaurio/cawfy-template">Fork me on GitHub</a></span>

        <div class="container mb-5">  
            <div class="mb-5"></div>
            <div id="action_alert" class="text-center"></div>
            <div class="mb-5"></div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th><button type="button" name="delete_all" id="delete_all" class="btn btn-danger btn-xs btn-md">Delete <i class="fa fa-trash"></i></button></th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Age</th>
                    </tr>
                    </thead>
                    <?php
                        foreach($result as $row){
                            echo '
                            <tr>
                                <td>
                                    <input type="checkbox" class="delete_checkbox" value="'.$row["id"].'" />
                                </td>
                                <td>'.$row["name"].'</td>
                                <td>'.$row["address"].'</td>
                                <td>'.$row["gender"].'</td>
                                <td>'.$row["age"].'</td>
                            </tr>
                            ';
                        }
                    ?>
                </table>
            </div>    
        </div>
        
        <footer class="footer text-center mt-auto">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="lead mb-0">Delete multiple records with php and ajax <a href="https://github.com/adhirsaurio/delete-multiple-records-php-ajax"><i class="fab fa-github-alt"></i></a></p>
                    </div>
                </div>
            </div>
        </footer>

        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Delete multiple records with php and ajax © 2023</small></div>
        </div>

    </body>  
</html> 

<script>
    $(document).ready(function(){ 

        $('.delete_checkbox').click(function(){
            if($(this).is(':checked')){
                $(this).closest('tr').addClass('removeRow');
            }else{
                $(this).closest('tr').removeClass('removeRow');
            }
        });

        $('#delete_all').click(function(){
            var checkbox = $('.delete_checkbox:checked');
            if(checkbox.length > 0){
                var checkbox_value = [];
                $(checkbox).each(function(){
                    checkbox_value.push($(this).val());
                });

                $.ajax({
                    url:"delete.php",
                    method:"POST",
                    data:{checkbox_value:checkbox_value},
                    success:function()
                    {
                        $('.removeRow').fadeOut(1000);
                        $('#action_alert').html("<label class='text-success'><div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><b>X</b></button><label>Record/s deleted.</label></div></label>");
                    }
                });
            }else{
                $('#action_alert').html("<label class='text-danger'><div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><b>X</b></button><label>Select one or more records to delete.</label></div></label>");
            }
        });

    });  
</script>