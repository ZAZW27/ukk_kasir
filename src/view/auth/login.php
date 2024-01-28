<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="../../../public/output.css" rel="stylesheet">
    <link href="login.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <img class="absolute h-28 md:h-20 z-[99] -mt-[35rem] md:-mt-[36rem] md:-rotate-[10deg] md:-ml-[19rem]" src="../../../public/logo/giant-logo.png" alt="">
        <div class="screen">
            <div class="screen__content">
                <form class="login" action="crud/aksi-login.php" method="POST" onsubmit="return submitFormWithDelay(this);">
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" name="name" class="login__input" required placeholder="User name / Email">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" name="password" class="login__input" placeholder="Password">
                    </div>
                    <button class="button login__submit">
                        <span class="button__text">Log In Now</span>
                        <svg id="move-cart" class="relative" width="2rem" height="2rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7.2998 5H22L20 12H8.37675M21 16H9L7 3H4M4 8H2M5 11H2M6 14H2M10 20C10 20.5523 9.55228 21 9 21C8.44772 21 8 20.5523 8 20C8 19.4477 8.44772 19 9 19C9.55228 19 10 19.4477 10 20ZM21 20C21 20.5523 20.5523 21 20 21C19.4477 21 19 20.5523 19 20C19 19.4477 19.4477 19 20 19C20.5523 19 21 19.4477 21 20Z" stroke="#eab308" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>	
                </form>
            </div>
            <div class="screen__background overflow-hidden">
                <span class="moving-shape screen__background__shape screen__background__shape4 transition-all duration-700 ease-linear"></span>
                <span class="moving-shape screen__background__shape screen__background__shape3 transition-all duration-300 ease-linear"></span>		
                <span class="moving-shape screen__background__shape screen__background__shape2 transition-all duration-1000 ease-linear"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>
    <script>
        function submitFormWithDelay(form) {
            // Prevent the default form submission
            event.preventDefault();

            // Add your animation logic here (e.g., changing styles)
            var moveCartElement = document.getElementById('move-cart');
            var shapeElements = document.querySelectorAll('.moving-shape');
            
            moveCartElement.style.transform = 'translateX(-3rem)';

            setTimeout(() => {
                moveCartElement.style.transform = 'translateX(16rem)';
            }, 100);

            shapeElements.forEach(function (element) {
                element.style.margin = '50px';
                setTimeout(() => {
                    element.style.margin = '-400px'
                }, 150);
            });
            setTimeout(function () {
                // Submit the form after the delay
                form.submit();
            }, 500); // Adjust the delay time (in milliseconds) as needed

            return false; // Prevent the default form submission
        }
    </script>
</body>
</html>