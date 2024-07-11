<?php 

//je n'arrive pas a raccoucir encore plus 

$urlSite = "http://localhost/blog/";
//verifie si le contenue n'est pas vide
if(isset($_POST['contenue']) && $_POST['contenue'] !== "\r\n        "){
    //verifie si le secret n'est pas vide
    if(isset($_POST['secret']) && $_POST['secret'] !== ""){
        //on recupere le secret de utilisateur.json et on decode les tableaux json qu'on n'a recuperer 
        $decode = json_decode(file_get_contents('../DATA/utilisateur.json'), true);
        //on recupere le secret hasher du tableaux json et on verifie que les deux hash sont identique
        if(hash_equals($decode['secret'], crypt($_POST['secret'], sha1("bob")))){
            //on créer un tableaux avec notre contenue ,la date et url  
            $data = array(
                'contenue' => $_POST['contenue'],
                'date' => date('D, d M Y H:i:s'),
                'url' => $urlSite .'DATA/'.time().'.json'
            );
            //on créer le fichier .json avec la date et on l'encode en .json + on retire les backslahs 
            file_put_contents('../DATA/'.time().'.json', json_encode($data, JSON_UNESCAPED_SLASHES));
            //on recupere le fichier posts.json et on decode le fichier posts.json en tableaux
            $post = json_decode(file_get_contents('../DATA/posts.json'), true);
            //on push chaque valeur associé avec la clé "post"
            array_push($post['post'], $data['url']);
            //on rempli le fichier posts.json et on l'encode en .json + on retire les backslahs
            file_put_contents('../DATA/posts.json', json_encode($post, JSON_UNESCAPED_SLASHES));
            echo "<p class='mess'>votre post a bien envoyé</p>";
        }else{
            echo header("HTTP/1.1 403 Le secret n'est pas bon ");
            echo "<p class='error'>le secret n'est pas bon</p>";
        }
    }else{
        echo "<p class='error'>il vous faut le secret pour poster votre contenue</p>";
    }
}else{
    echo "<p class='error'>veuillez remplir votre posts</p>";
}     
include ('../vue.html');    

?>
