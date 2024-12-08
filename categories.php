<?php
include("components/header.php");
?>
 <!-- Blank Start -->
 <div class="container-fluid pt-4 px-4">
               <div class="row bg-light rounded mx-0">
               <div class=" col-lg-12">
 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Category</button>
 </div>
     
                    <div class="col-md-12">
                        <h3 class="px-3 py-3">CATEGORIES</h3>
                        
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $query = $pdo->query("select * from categories");
                                    $rows = $query->fetchALL(PDO::FETCH_ASSOC);
                                    foreach($rows as $keys){
                                        ?>

           <tr>
         <th scope="row"><img src="<?php echo $catimageaddress.$keys['image'] ?>" alt="" width="80" srcset=""></th>
        <td><?php echo $keys['name'] ?></td>
        <td>
          <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalupdate<?php echo $keys['id'] ?>">Edit</a></td>
        <td><a href="" class="btn btn-danger">Delete</a>
      </td>
          </tr>

                     <!-- update category Modal -->
<div class="modal fade" id="modalupdate<?php echo $keys['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">UPDATE CATEGORY</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method = "POST" enctype="multipart/form-data" >
                                <div class="mb-3">
                                    <label for="exampleInputEmail1"  class="form-label">Category Name</label>
   <input type="text" class="form-control" value="<?php echo $keys['name'] ?>"       name="catName" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1"  class="form-label">Category Image</label>
                                    <input type="file" name="catImage" class="form-control" id="exampleInputPassword1">
      <img class="mt-3" src="<?php echo $catimageaddress.$keys['image'] ?>" width="90" alt="">
                                </div>
                                
    <button type="submit" name = "addCategory" class="btn btn-primary">Add Category</button>
                            </form>

      </div>
      
    </div>
  </div>
</div>
                                        <?php
                                    }
                                    ?>
                                    
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <!-- Blank End -->


            <!-- add category Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">ADD CATEGORY</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method = "post" enctype="multipart/form-data" >
                                <div class="mb-3">
                                    <label for="exampleInputEmail1"  class="form-label">Category Name</label>
                                    <input type="text" class="form-control" name="catName" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1"  class="form-label">Category Image</label>
                                    <input type="file" name="catImage" class="form-control" id="exampleInputPassword1">
                                </div>
                                
                                <button type="submit" name = "addCategory" class="btn btn-primary">Add Category</button>
                            </form>

      </div>
      
    </div>
  </div>
</div>
<?php
include("components/footer.php");
?>