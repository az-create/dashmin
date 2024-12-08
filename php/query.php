<?php
include("conection.php");
$catimageaddress = "img/categories/";

//add category

if (isset($_POST['addCategory'])){
   $name = $_POST['catName'];
   $imagename = $_FILES ['catImage']['name'];
   $imageobject = $_FILES ['catImage']['tmp_name'];
   $extension = pathinfo($imagename,PATHINFO_EXTENSION);
   $pathdirectory = "img/categories/".$imagename;
   if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "webp" ){
    if(move_uploaded_file($imageobject,$pathdirectory)){
        //query prepration
        $query = $pdo ->prepare("insert into categories(name,image) values (:pn,:pimg)");
        $query->bindparam("pn",$name);
        $query->bindparam("pimg",$imagename);
        $query->execute();
        echo "<script>alert('Data submited successfully')</script>";
    }
   }else{
    echo "<script>alert('Invalid file type use only jpeg, png, jpg or webp')</script>";
   }
};

?>