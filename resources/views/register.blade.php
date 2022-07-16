<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rese</title>
</head>

<style>
body{
  margin:50px 100px;
}

.nav{
  position: absolute;
  height: 150vh;
  width: 100%;
  left: -100%;
  background: #fff;
  transition: 0.3s;
  text-align: center;
}

.nav ul{
  padding-top: 50px;
}

.nav ul li{
  list-style-type: none;
  margin-top: 50px;
}

a,button{
  color:#4169e1;
  text-decoration: none;
  font-weight:bolder;
  font-size:20px;
}

.logout{
  cursor: pointer;
  border: none;
  background: none;
}


.menu{
  display: inline-block;
  width: 36px;
  height: 32px;
  cursor: pointer;
  position: relative;
  left: 0px;
  top: 0px;
  background:#4169e1;
  padding: 5px;
  border-radius:5px;
}

.menu__line--top,
.menu__line--middle,
.menu__line--bottom {
  display: inline-block;
  height: 3px;
  background-color: white;
  position: absolute;
  transition: 0.5s;
}

.menu__line--top {
  top: 20%;
  width: 30%;
}

.menu__line--middle {
  top: 50%;
  width: 80%;
}

.menu__line--bottom {
  bottom: 10%;
  width: 20%;
}

.menu.open span:nth-of-type(1) {
  top: 50%;
  transform: rotate(45deg);
  width:50%;
  margin-left:15%;
}

.menu.open span:nth-of-type(2) {
  opacity: 0;
}
.menu.open span:nth-of-type(3) {
  top: 50%;
  transform: rotate(-45deg);
  width:50%;
  margin-left:15%;
}

.in{
  transform: translateX(100%);
}

.header{
  display:flex;
  justify-content: flex-start;
  margin-bottom:50px;
}

.hamburger-menu{
  margin:auto 0;
  background:#4169e1;
  border-radius:5px;
  z-index: 5;
}

h1{
  padding-left:50px;
  color:#4169e1;
}

.main{
  display:flex;
  justify-content: center;
}

.register{
  background:#f5f5f5;
  display:inline-block;
  box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
  width:25%;
  border-radius:0 0 5px 5px;
  margin-top:50px;
}

.register-ttl{
  background:#4169e1;
  margin-top:0;
  color:white;
  padding:20px;
  font-weight:bold;
  border-radius:5px 5px 0 0;
}

.register-about{
  padding:20px 50px;
  text-align:right;
}

input{
  border-bottom:1px solid black;
  border-right:none;
  border-left:none;
  border-top:none;
  background:#f5f5f5;
  width:85%;
  margin-bottom:20px;
  font-weight:bold;
  height:20px;
}

.input-name,.input-email,.input-password{
  position: relative;
  display: block;
}

.input-name::before{
  content: "";
  position: absolute;
  left:0;
  background: url("/img/user.svg") no-repeat;
  background-size: cover;
  width: 30px;
  height: 30px;
}

.input-email::before{
  content: "";
  position: absolute;
  left:0;
  background: url("/img/email.svg") no-repeat;
  background-size: cover;
  width: 30px;
  height: 30px;
}

.input-password::before{
  content: "";
  position: absolute;
  left:0;
  background: url("/img/password.svg") no-repeat;
  background-size: cover;
  width: 30px;
  height: 30px;
}

.submit-btn{
  background:#4169e1;
  color:white;
  text-decoration: none;
  padding: 5px 15px;
  border-radius:5px;
  font-size:15px;
  border:none;
  cursor: pointer;
}

</style>

<body>
  <div class="header">
    <div class="hamburger-menu">
      <nav class="nav" id="nav">
        @if(Auth::check())
        <ul>
          <li><a href="/">Home</a></li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
          <li><button class="logout">Logout</button></li>
          </form>
          <li><a href="/mypage">Mypage</a></li>
        </ul>
        @else
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/register">Register</a></li>
          <li><a href="/login">Login</a></li>
        </ul>
        @endif
      </nav>
      <div class="menu" id="menu">
        <span class="menu__line--top"></span>
        <span class="menu__line--middle"></span>
        <span class="menu__line--bottom"></span>
      </div>
    </div>
    <h1>Rese</h1>
  </div>
  <div class="main">
    <div class="register">
      <p class="register-ttl">Registration</p>
      <div class="register-about">
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="name">
            <div  class="input-name">
              <input type="text" name="name" placeholder="Username" required autofocus>
            </div>
          </div>
          <div class="email">
            <div class="input-email">
              <input type="email" name="email" placeholder="Email" required>
            </div>
          </div>
          <div class="password">
            <div class="input-password">
              <input type="password" name="password" placeholder="Password" required>
            </div>
          </div>
          <button type="submit" class="submit-btn">登録</button>
        </form>
      </div>
    </div>
  </div>
</body>

<script>
  const target = document.getElementById("menu");
    target.addEventListener('click', () => {
    target.classList.toggle('open');
  const nav = document.getElementById("nav");
    nav.classList.toggle('in');
});
</script>

</html>