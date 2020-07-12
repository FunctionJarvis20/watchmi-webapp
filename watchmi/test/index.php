<?php
// database connection
include_once("../database/connection.php");
if($connection){
    // no of categories to insert
    $genre = array("Action","Adventure","Animation","Biography","Comedy","Crime","Documentary","Drama","Family","Fantasy","Western","War","Thriller","Superhero","Sport","Sci-Fi","Romance","Mystery","Horror","History");

    // first get movie category from moviecategories table to check with above category if found then insert that particular category in allcategories table
    // for ($i=0; $i < count($genre); $i++) { 
        
    //     $get_moviecategories = "SELECT category FROM `moviecategories` WHERE category = '".$genre[$i]."';";
    //     $result = mysqli_query($connection,$get_moviecategories);
    //     if(mysqli_num_rows($result)>0){
    //         $insert_into_allcategories_query = "INSERT INTO `allmoviecategories`(`id`, `category`) VALUES (null,'$genre[$i]');";
    //         $res = mysqli_query($connection,$insert_into_allcategories_query);
    //         if($res){
    //             echo "done ".$genre[$i];
    //         }else{
    //             echo "not".$genre[$i];
    //         }
    //     }else{
    //         echo "not".$genre[$i];
    //     }
    // }


    // insert category id in moviecategories coloumn
    // $get_movie_category_id_allmoviecategories_query = "SELECT * FROM `allmoviecategories`;";
    // $result = mysqli_query($connection,$get_movie_category_id_allmoviecategories_query);
    // while($row=mysqli_fetch_assoc($result)){
        
    //     $get_category_name_moviecategories = "SELECT category FROM `moviecategories` WHERE category = '".$row['category']."';";
    //     $res = mysqli_query($connection,$get_category_name_moviecategories);

    //     if(mysqli_num_rows($res)>0){
    //         $update_category_id_in_moviecategories = "UPDATE `moviecategories` SET `category id` = ".$row['id']." WHERE `category` = '".$row['category']."';";
    //         $resu = mysqli_query($connection,$update_category_id_in_moviecategories);
    //         if($resu){
    //             echo "<br> done ".$row['id']."<br>";
    //         }
    //     }else{
    //         echo "<br>not done ".$row['id']."<br>";
    //     }
        

    // }
}else{
    echo "not Connected";
}
?>