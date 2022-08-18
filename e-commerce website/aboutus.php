<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width = device-width , intial-scale =1.0">
    <link rel="stylesheet" href="style/header&footer.css">
    <link rel="stylesheet" href="style/about us.css">
    <script src="home-btn-effect.js"></script>
    <style>
    @media (max-width: 800px) {

        .active11 {
            top: 5%;
        }

    }
    </style>
</head>

<body>
    <?php 
    
        session_start();
        if(isset($_SESSION['email'])){
            require 'header - logged-in.php';
        } else {
            require 'header - not-logged-in.php';
        }
 
 ?>

    <main id="info">

        <h2 class='title'>About us</h2>

        <p>Our PC store main goal is to interact the customers with the store through an e-commerce website that is
            selling accessories and parts for PCs. The website is for people between 18-25 years old who are PC
            enthusiast. The website will have log in or register. Also, the user can view the products and add them to
            the cart. In the checkout, you will be entering the delivery method (same-day and after two days) and the
            payment method (for now it is cash on delivery). If he log in or register an account he will be able to see
            orders he made and the current ones and review the products.</p>
        <p>The expected aims for the website and the business is to enter the Arab world marketplace and provide the
            smoothest shopping experience and to compete with Newegg, which is an international website that specializes
            in selling PC parts, within the Arab world region.</p>
        <p>The website will cover different areas in the PC industry. And it will sell any PC component or accessories
            to Arab world customers only. The areas it will not cover will be that is will not be selling any products
            to companies. Also, it will not provide any subsections or sell any games.</p>
        <p>The users will be focusing on the use of the products we provide and buy them through our website. It will
            accessible first within our country Jordan then it will expand to the Middle East region finally it will be
            accessed by the whole Arab world region. The website does not need any fast internet connection because the
            website does not have any videos in it. The targeted community will be PC enthusiast, so they will be
            sharing our website and the products between their friends or in any social media group. The behaviour of
            the customers will be that they view the products and build the PC and put them to the cart then they will
            think about buying or not. This will affect their online purchasing decision so it is important to provide
            good and competent prices and provide wide variety of the products.</p>


        <h2 class='title'>Contact-us</h2>

        <h3 id="email">Email</h3>
        <a href="mailto:SaifEdeen.Kharouf@HTU.EDU.JO" id="link2email" target='blank'>SaifEdeen.Kharouf@HTU.EDU.JO</a>

        <h3 id="phone">Phone number</h3>
        <a id="text4phone" href="tel:+962790290514"> 0790290514 </a>


    </main>

    <?php 
        include 'footer.php';
            ?>

</body>