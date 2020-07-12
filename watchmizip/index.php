<?php 



// Storing YTS.lt movie data in database



ini_set('max_execution_time', 0); 

$connection = mysqli_connect("localhost",'root','','watchmi');

$c = 0;
for ($j=1; $j <= 30; $j++) { 

    $data = json_decode(file_get_contents("https://yts.lt/api/v2/list_movies.json?page=".$j));

    for ($i=0; $i <$data->data->limit; $i++) {

        $movie_id =  mysqli_real_escape_string($connection, (int)$data->data->movies[$i]->id);  
        $imdb_code = mysqli_real_escape_string($connection, $data->data->movies[$i]->imdb_code);
        $title_long =mysqli_real_escape_string($connection, $data->data->movies[$i]->title_long);
        $slug = mysqli_real_escape_string($connection,$data->data->movies[$i]->slug);
        $year = mysqli_real_escape_string($connection, (int)$data->data->movies[$i]->year);
        $runtime = mysqli_real_escape_string($connection,(int)$data->data->movies[$i]->runtime);
        $description_full = mysqli_real_escape_string($connection,$data->data->movies[$i]->description_full);
        $language = mysqli_real_escape_string($connection,$data->data->movies[$i]->language);
        $date_uploaded = mysqli_real_escape_string($connection,$data->data->movies[$i]->date_uploaded);
        $medium_cover_image =mysqli_real_escape_string($connection, $data->data->movies[$i]->medium_cover_image);
        $large_cover_image =mysqli_real_escape_string($connection, $data->data->movies[$i]->large_cover_image);
        echo "<br>";
        echo $movie_id;
        echo "<br>";
        echo $imdb_code;
        echo "<br>";
        echo $title_long;
        echo "<br>";
        echo $slug;
        echo "<br>";
        echo $year;
        echo "<br>";
        echo $runtime;
        echo "<br>";
        echo $description_full;
        echo "<br>";
        echo $language;
        echo "<br>";
        $db = $date_uploaded;
        $timestamp = strtotime($db);
        echo date("m-d-Y H:i:s", $timestamp);
        echo "<br>";
        echo $medium_cover_image;
        echo "<br>";
        echo $large_cover_image;
        echo "<br>";
        echo "<hr>";
        echo "$c";
        $c++;


        /*

        INSERT IN IMDBINFO TABLE

        */

        // $query = "INSERT INTO imdbinfo(id,movie_id,imdb_code,title_long,slug,year,movie_runtime,description_full,language,date_uploaded) VALUES(NULL,$movie_id,'$imdb_code','$title_long','$slug',$year,$runtime,'$description_full','$language','$date_uploaded');";
        // $status = mysqli_query($connection,$query);
        // if($status){
        //     echo "<br>status: $status <hr>";
        //     }else{
        //         echo "<br>unsuccessfull<hr>";
        //     }


        /*

        INSERT IN MOVIEBACKGROUNDS TABLE

        */

        // $q = "INSERT INTO `moviebackgrounds`(`id`, `imdb_code`, `title_long`, `medium_cover_image`, `large_cover_image`) VALUES (null,'$imdb_code','$title_long','$medium_cover_image','$large_cover_image');";
        // $sp = mysqli_query($connection,$q);
        // if($sp){
        //     echo "<br>status: $sp <hr>";
        //     }else{
        //         echo "<br>unsuccessfull<hr>";
        //     }
        
        
        /*

        INSERT IN moviecategories TABLE

        // */
        //     for ($k=0; $k < count($data->data->movies[$i]->genres) ; $k++) { 

        //         $category = mysqli_real_escape_string($connection, $data->data->movies[$i]->genres[$k]);
        //         echo $category;

        //         $qu = "INSERT INTO `moviecategories`(`id`, `imdb_id`, `category`) VALUES (NULL,'$imdb_code','$category')";
        //         $sp = mysqli_query($connection,$qu);
        //         if($sp){
        //             echo "<br>status: $sp <hr>";
        //             }else{
        //                 echo "<br>unsuccessfull<hr>";
        //             }
               
        //     }
        

         /*

        INSERT IN MOVIELINKS_720P TABLE AND MOVIELINKS_1080P

        */
                // $download_url = mysqli_real_escape_string($connection, $data->data->movies[$i]->torrents[1]->url);
                // $hash = mysqli_real_escape_string($connection, $data->data->movies[$i]->torrents[1]->hash);
                // $quality = mysqli_real_escape_string($connection, $data->data->movies[$i]->torrents[1]->quality);
                // $type = mysqli_real_escape_string($connection, $data->data->movies[$i]->torrents[1]->type);
                // $seeds = mysqli_real_escape_string($connection, (int)$data->data->movies[$i]->torrents[1]->seeds);
                // $peers = mysqli_real_escape_string($connection, (int)$data->data->movies[$i]->torrents[1]->peers);
                // $size = mysqli_real_escape_string($connection, $data->data->movies[$i]->torrents[1]->size);
                // $date_uploaded = mysqli_real_escape_string($connection, $data->data->movies[$i]->torrents[1]->date_uploaded);
                // echo $download_url;
                // echo "<br>";
                // echo $hash;
                // echo "<br>";
                // echo $quality;
                // echo "<br>";
                // echo $type;
                // echo "<br>";
                // echo $seeds;
                // echo "<br>";
                // echo $peers;
                // echo "<br>";
                // echo $size;
                // echo "<br>";
                // echo $date_uploaded;
                // echo "<br>";

                // $qu = "INSERT INTO `movielinks_1080p`(`id`, `imdb_code`, `title_long`, `download_url`, `hash`, `quality`, `type`, `seeds`, `peers`, `size`, `date_uploaded`) VALUES (null,'$imdb_code','$title_long','$download_url','$hash','$quality','$type',$seeds,$peers,'$size','$date_uploaded');";        
                // $sp = mysqli_query($connection,$qu);
                //     if($sp){
                //     echo "<br>status: $sp <hr>";
                //     }else{
                //         echo "<br>unsuccessfull<hr>";
                //     }
                    

                 /*

                INSERT IN MOVIERATINGS TABLE

                */

                // $mpa_ratings = mysqli_real_escape_string($connection, $data->data->movies[$i]->mpa_rating);
                // $imdb_ratings = mysqli_real_escape_string($connection, $data->data->movies[$i]->rating);
                // echo $mpa_ratings;
                // echo "<br>";
                // echo $imdb_ratings;
                // echo "<br>";
                // $qu = "INSERT INTO `movieratings`(`id`, `imdb_code`, `title_long`, `mpa_ratings`, `imdb_ratings`) VALUES (null,'$imdb_code','$title_long','$mpa_ratings','$imdb_ratings');";        
                // $sp = mysqli_query($connection,$qu);
                //     if($sp){
                //     echo "<br>status: $sp <hr>";
                //     }else{
                //         echo "<br>unsuccessfull<hr>";
                //     }

                /*

                INSERT IN MOVIETRAILERS TABLE

                */

                // $trailer_code = mysqli_real_escape_string($connection, $data->data->movies[$i]->yt_trailer_code);
                // if($trailer_code == ""){
                //     $trailer_code = "na";
                //     echo $trailer_code;
                // }else{
                // echo $trailer_code;
                // }
                // echo "<br>";
                // $qu = "INSERT INTO `movietrailers`(`id`, `imdb_code`, `title_long`, `trailer_link`) VALUES (null,'$imdb_code','$title_long','www.youtube.com/watch?v=$trailer_code');";        
                // $sp = mysqli_query($connection,$qu);
                //     if($sp){
                //     echo "<br>status: $sp <hr>";
                //     }else{
                //         echo "<br>unsuccessfull<hr>";
                //     }




    }

?>

<br>
<br>

<?php
}

?>
