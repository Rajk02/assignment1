<?php 
    include('database.php');

    $sql = 'SELECT id,comment,Name FROM comments ORDER BY id';

    
    $result = mysqli_query($conn, $sql);

   
    $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

    
    mysqli_free_result($result);

    
    mysqli_close($conn);

 


 ?>


 <!DOCTYPE html>
 <html>

 	<?php include('header.php'); ?>

    

    <div class="container">
        

            <?php foreach($comments as $comment){ ?>

                <div class="col s6 md1">
                    <div class="card z-depth-2">
                        <div class="card-content center">
                            
                            <div><?php echo ($comment['comment'])  ;?></div>
                            <div><?php echo "-written by ".$comment['Name']; ?></div>
                        </div>
                        
                    </div>
                </div>

            <?php } ?>

        
    </div>



 	<?php include('footer.php'); ?>


 </html>