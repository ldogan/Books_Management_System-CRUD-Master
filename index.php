<?php

require_once ("php/component.php");
require_once ("php/operation.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
   
</head>
<body>
    
<main>
    <div class="container text-center">
    <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i>Book Store</h1>
    <div class="d-flex justify-content-center">
        <form action="" method="post" class="w-50">
            <div class="pt-2">
                <?php inputElement($icon="<i class='fas fa-id-badge'></i>" ,$placeholder="ID", $name="book_id","");?>
            </div>

            <div class="pt-2">
                <?php inputElement($icon="<i class='fas fa-book'></i>",$placeholder="Book Name", $name="book_name","");?>
            </div>

            <div class="row pt-2">
                <div class="col">
                    <?php inputElement($icon="<i class='fas fa-people-carry'></i>", $placeholder="Publisher", $name="book_publisher", "" );?>
                </div>

                <div class="col">
                <?php inputElement($icon="<i class='fas fa-dollar-sign'></i>", $placeholder="Price", $name="book_price", "" );?>
                </div>
            </div>
            <div class="d-flex">
                <?php buttonElement($btnid="btn-create", $styleclass="btn btn-success", $text="<i class='fas fa-plus'></i>", $name="create", $attr="data-toggle='tooltip' data-placement='bottom' title='create'");?>
                <?php buttonElement($btnid="btn-read", $styleclass="btn btn-primary", $text="<i class='fas fa-sync'></i>", $name="read", $attr="data-toggle='tooltip' data-placement='bottom' title='read'");?>
                <?php buttonElement($btnid="btn-update", $styleclass="btn light-border", $text="<i class='fas fa-pen-alt'></i>", $name="update", $attr="data-toggle='tooltip' data-placement='bottom' title='update'");?>
                <?php buttonElement($btnid="btn-delete", $styleclass="btn btn-danger", $text="<i class='fas fa-trash'></i>", $name="delete", $attr="data-toggle='tooltip' data-placement='bottom' title='delete'");?>
                <?php deleteBtn();?>
            </div>
        </form> 
    </div>
    <!--Bootstrap table-->
    <div class="d-flex table-data">
        <table class="table table-striped table-dark">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Publisher</th>
                    <th>Book Price</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody id="tbody">
            <?php
                    if(isset($_POST['read'])){
                        $result = getData();

                        if($result){
                            while($row = mysqli_fetch_assoc($result)){?>

                                <tr>
                                    <td data-id="<?php echo $row['id'];?>"><?php echo $row['id'];?></td>
                                    <td data-id="<?php echo $row['id'];?>"><?php echo $row['book_name'];?></td>
                                    <td data-id="<?php echo $row['id'];?>"><?php echo $row['book_publisher'];?></td>
                                    <td data-id="<?php echo $row['id'];?>"><?php echo "$".$row['book_price'];?></td>
                                    <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>"></i></td>
                                </tr>

                            <?php
                            }
                        }
                    }
                    

                ?>
            </tbody>
        </table>
    </div>
</div>
</main>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" 
integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>

<script src="../Crud/php/main.js"></script>
</body>
</html>
