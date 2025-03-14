<style>
    .back-div-logo{
        height: 90px;
        width: 200px;   
    }
    .back-div-logo img{
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
    .nav{
        height: 100px;
        width: 100%;
        border-bottom-left-radius: 100px;
        position: fixed;
        z-index: 9;
        top: 0;
        left: 0;
        overflow: hidden;
    }

    .blur-layer{
        height: 100%;
        width: 100%;
        position: absolute;
        z-index: 10;
        top: 0;
        left: 0;
        backdrop-filter: blur(10px);
        background-color: rgba(255, 255, 255, 0.6);
    }

    .welcome-content{
        height: 100%;
        width: 100%;
        padding: 0px 150px; 
        position: absolute;
        z-index: 11;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }


    .welcome-components{
        width: 40%;
        height: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }
    .welcome-components a{
        font-weight: bold;
        font-size: 20px;
        color: #103341;
        text-decoration: none;
    }
    .welcome-components a:hover{
        color: #ae8c03;
    }

    .auth-button {
        height: 45px;
        background: linear-gradient(90deg, #103341, #1a4d5f);
        border-radius: 10px;
        padding: 0px 25px;
        color: white;
        font-weight: bold;
        position: relative;
        overflow: hidden;
        border: 1.2px solid transparent; 
        transition: color 0.3s ease-in-out, border-color 0.3s ease-in-out;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
    }

    /* Hiệu ứng ánh sáng lướt */
    .auth-button::before {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.2);
        transform: skewX(-30deg);
        transition: left 0.3s ease-in-out;
    }

    .auth-button:hover {
        color: #ffcc00; 
        border-color: black; 
    }

    .auth-button:hover::before {
        left: 100%;
    }




</style>


<nav class="nav">
    <div class="blur-layer">

    </div>
    <div class="welcome-content">
        <a href="/">
            <div class="back-div-logo">
                <img src="{{ asset('assets/logo/PYURBAN-logo.png') }}" alt="Logo">
            </div>
        </a>    

        <div class="welcome-components">
            <a href="">
                HOME
            </a>
            <a href="">
                ABOUT US
            </a>
            <a href="">
                SERVICE
            </a>
        </div>


        <a href="{{ route('login') }}">
            <button class="auth-button">
                Start Now
            </button>
        </a>

    </div>

</nav>
