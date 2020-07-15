<link rel="stylesheet" type="text/css" href="styles.css">
<?php
//start session
session_start();

//load and initialize user class
include('user.php');
$user = new User();
if(isset($_POST['signupSubmit'])){
    //check whether user details are empty
    if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])){
        //password and confirm password comparison
        if($_POST['password'] !== $_POST['confirm_password']){
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Les deux mot de passe ne correspondent pas.';
        }else{
            //check whether user exists in the database
            $prevCon['where'] = array('email'=>$_POST['email']);
            $prevCon['return_type'] = 'count';
            $prevUser = $user->getRows($prevCon);
            if($prevUser > 0){
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Cette adresse mail existe déjà.';
            }else{
                //insert user data in the database
                $userData = array(
                    'nom' => $_POST['nom'] ,
                    'prenom' =>  $_POST['prenom'],
                    'email' =>  $_POST['email'],
                    'password' => sha1($_POST['password'])
                );
                $insert = $user->insert($userData);
                //set status based on data insert
                if($insert){
                    $sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'Vous vous êtes créé(e) un compte avec succès, connectez-vous avec vos identifiants.';
                }else{
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Un problème est survenu, veuillez réessayer.';
                }
            }
        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Tous les champs sont obligatoires, veuillez remplir tous les champs.';
    }
    //store signup status into the session

    $_SESSION['sessData'] = $sessData;
    $redirectURL = ($sessData['status']['type'] == 'success')?'connexion.php':'registration.php';
    //redirect to the home/registration page
    header("Location:".$redirectURL);
}elseif(isset($_POST['loginSubmit'])){
    //check whether login details are empty
    if(!empty($_POST['email']) && !empty($_POST['password'])){
    	 //get user data from user class
        $conditions['where'] = array(
            'email' => $_POST['email'],
            'password' => sha1($_POST['password']),
            'status' => '1'
        );
        $conditions['return_type'] = 'single';
        $userData = $user->getRows($conditions);
        //set user data and status based on login credentials
        if($userData){
            $sessData['userLoggedIn'] = TRUE;
            $sessData['userID'] = $userData['id'];
            $sessData['status']['type'] = 'success';
        }else{
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Mauvais email ou mot de passe, veuillez réessayer.';
        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Entrez email et mot de passe.';
    }
    //store login status into the session
    $_SESSION['sessData'] = $sessData;
    //redirect to the home page
    header("Location:admin.php");
    session_register(prenom);
}elseif(!empty($_REQUEST['logoutSubmit'])){
    //remove session data
    unset($_SESSION['sessData']);
    session_destroy();
    //store logout status into the ession
    $sessData['status']['type'] = 'Succès';
    $sessData['status']['msg'] = 'Vous vous êtes connecté(e) avec succès';
    $_SESSION['sessData'] = $sessData;
    //redirect to the home page
    header("Location:admin.php");
}else{
    //redirect to the home page
   //header("Location:index.php");
}
