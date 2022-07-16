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

.submit-btn{
  display:none;
}

.search{
  font-size:0;
  margin:auto 0 auto auto;
  width:50%;
}

.prefecture,.genre,.name{
  border:none;
  box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
  height:50px;
  padding: 0 5px;
  font-weight:bold;
}

.prefecture,.genre{
  border-right:1px solid #f5f5f5;
}

.prefecture{
  width:20%;
  border-radius: 5% 0 0 5%;
}

.genre{
  width:20%;
}

.name{
  width:58%;
  border-radius: 0 5% 5% 0;
}

.main{
  display:flex;
  flex-wrap: wrap;
  gap: 30px 50px;
}

.shop-card{
  width:22%;
  box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
  border-radius: 5%;
}


img{
  width:100%;
  border-radius: 5% 5% 0 0;
}

.shop-about{
  padding:20px;
}

.shop-name{
  font-size:20px;
  font-weight:bold;
}

.shop-tag{
  font-size:15px;
  font-weight:bold;
  margin:5px 0 ;
}

.shop-btn{
  margin:15px 0;
  display:flex;
  justify-content: space-between;
}

.detail-btn{
  background:#4169e1;
  color:white;
  text-decoration: none;
  padding: 10px 15px;
  border-radius:10px;
  font-size:15px;
}

.like-btn{
  border:none;
  background:white;
  cursor: pointer;
}

.like,.unlike {
  width: 40px;  
  height: 40px; 
  position: relative;
}


.like::before,
.like::after {
  content: ""; 
  width: 50%;   
  height: 80%;  
  background: gray; 
  border-radius: 25px 25px 0 0; 
  display: block;
  position: absolute; 
}

.unlike::before,
.unlike::after {
  content: ""; 
  width: 50%;   
  height: 80%;  
  background: red; 
  border-radius: 25px 25px 0 0; 
  display: block;
  position: absolute; 
}

.like::before,.unlike::before {
  transform: rotate(-45deg); 
  left: 14%;                 
}

.like::after,.unlike::after {
  transform: rotate(45deg);  
  right: 14%;                
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
    <div class="search">
      <form action="/search" method="get" name="search">
        @csrf
        <select name="prefecture" class="prefecture">
          <option value="Allarea">All area</option>
          <option value="東京都" name="prefecture">東京都</option>
          <option value="大阪府" name="prefecture">大阪府</option>
          <option value="福岡県" name="prefecture">福岡県</option>
        </select>
        <select name="genre" class="genre">
          <option value="Allgenre">All genre</option>
          <option value="寿司" name="genre">寿司</option>
          <option value="焼肉" name="genre">焼肉</option>
          <option value="居酒屋" name="genre">居酒屋</option>
          <option value="イタリアン" name="genre">イタリアン</option>
        </select>
        <input type="text" name="name" placeholder="Search ..." class="name">
        <input type="submit" value="検索" class="submit-btn" id="search">
      </form>
    </div>
  </div>
  <div class="main">
    @foreach ($shops as $shop)
    <div class="shop-card">
      @if($shop->genre == '寿司')
      <img src = https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg>
      @elseif($shop->genre == '焼肉')
      <img src = https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg>
      @elseif($shop->genre == '居酒屋')
      <img src = https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg>
      @elseif($shop->genre == 'イタリアン')
      <img src = https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg>
      @else
      <img src = https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg>
      @endif
      <div class="shop-about">
        <div class="shop-name">
          {{$shop->name}}
        </div>
        <div class="shop-tag">
          #{{$shop->prefecture}}
          #{{$shop->genre}}
        </div>
        <div class="shop-btn">
          <a href="{{ route('shop.detail', ['id'=>$shop->id]) }}" class="detail-btn">詳しく見る</a>
          @isset($auth)
          @if(!$shop->isLikedBy(Auth::user()))
            <form action="{{ route('like', ['id'=>$shop->id]) }}" method="post">
              @csrf
              <button type="submit" class="like-btn">
                <div class="like"></div>
              </button>
            </form>
          @else
            <form action="{{ route('unlike', ['id'=>$shop->id]) }}" method="post">
              @csrf
              <button class="like-btn">
                <div class="unlike"></div>
              </button>
            </form>
          @endif
          @else
          <form action="{{ route('like', ['id'=>$shop->id]) }}" method="post">
              @csrf
              <button type="submit" class="like-btn">
                <div class="like"></div>
              </button>
            </form>
          @endisset
        </div>
      </div>
    </div>
    @endforeach
  </div>
</body>
<script>
  const target = document.getElementById("menu");
    target.addEventListener('click', () => {
    target.classList.toggle('open');
  const nav = document.getElementById("nav");
    nav.classList.toggle('in');
});

  var btn = document.getElementById('search');

    window.document.onkeydown = function(event){
        if (event.key === 'Enter') {
            document.search.submit();
        }
    };
</script>
</html>