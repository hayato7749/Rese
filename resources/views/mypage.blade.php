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
  margin-bottom:30px;
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

.name{
  font-size:30px;
  font-weight:bold;
  margin:0;
  text-align:center;
}

.main{
  display:grid;
  grid-template-columns:1fr 1fr;
}

.reservation,.like-list{
  padding:30px;
}

.reservation-ttl,.like-ttl{
  font-size:25px;
  font-weight:bold;
}

.reservation-header{
  display:flex;
  justify-content: space-between;
  align-items:center;
  margin-bottom:20px;
}

.reservation-count{
  position: relative;
  display: block;
  color: white;
  font-size: 16px;
  font-weight: bold;
  padding-left:10%;
}

.reservation-count::before{
  content: "";
  position: absolute;
  top: 50%;
  left: 0;
  background: url("/img/clock.svg") no-repeat;
  background-size: cover;
  width: 30px;
  height: 30px;
  transform: translateY(-50%);
}

.reservation-about{
  background:#4169e1;
  margin-bottom:20px;
  width:70%;
  border-radius:5px;
  color:white;
  padding:20px 30px;
}

.shop,.date,.time,.number{
  margin-bottom:15px;
}

.reservation-name,.reservation-date,.reservation-time{
  font-size:15px;
  margin-left:50px;
}

.reservation-number{
  margin-left:28px;
}

.shop-list{
  display:flex;
  flex-wrap: wrap;
  width:100%;
}

.shop-card{
  width:45%;
  box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
  border-radius: 5%;
  margin-right:30px;
  margin-bottom:30px;
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
  </div>
  <div class="name">
      <p class="name">{{$auth->name}}さん</p>
  </div>
  <div class="main">
    <div class="reservation">
      <p class="reservation-ttl">予約状況</p>
      @foreach($shops as $shop)
      @foreach ($reservations as $reservation)
      @if($reservation->shop_id == $shop->id)
      <div class="reservation-about">
        <div class="reservation-header">
          <p class="reservation-count">予約{{$loop->iteration}}</p>
          <form action="{{ route('reservation.delete', ['id'=>$reservation->id]) }}" method="post">
            @csrf
            <input type ="image" name="submit" width="30" height="20" src="/img/cross.svg">
          </form>
        </div>
        <div class="shop">
          <label>Shop</label>
          <label class="reservation-name">{{$shop->name}}</label>
        </div>
        <div class="date">
          <label>Date</label>
          <label class="reservation-date">{{$reservation->date}}</label>
        </div>
        <div class="time">
          <label>Time</label>
          <label class="reservation-time">{{$reservation->time}}</label>
        </div>
        <div class="number">
          <label>Number</label>
          <label class="reservation-number">{{$reservation->number}}</label>
        </div>
      </div>
      @else

      @endif
      @endforeach
      @endforeach
    </div>
    <div class="like-list">
      <p class="like-ttl">お気に入り店舗</p>
      <div class="shop-list">
        @foreach($likes as $like)
        @foreach($shops as $shop)
        @if($like->shop_id == $shop->id)
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
            </div>
          </div>
        </div>
      
        @else

        @endif
        @endforeach
        @endforeach
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