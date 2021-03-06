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
  color: blue;
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

a{
  color:#4169e1;
  text-decoration: none;
  font-weight:bold;
  font-size:20px;
}

.main{
  display:grid;
  grid-template-columns:1fr 1fr;
}

.shop-detail{
  grid-column: 1/2; 
  width:90%;
}

.home{
  background:#dcdcdc;
  font-size: 20px;
  font-weight:bold;
  text-decoration: none;
  padding:5px;
  box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
  border-radius: 15%;
  height:30px;
  width:30px;
  color:black;
}

.name{
  font-size:30px;
  font-weight:bold;
}

img{
  width:100%;
  margin-top:30px;
}

.tag{
  font-weight:bold;
  margin-top:20px;
}

.detail{
  font-weight:bold;
  font-size:18px;
  margin-top:20px;
}

.reservation{
  background:#4169e1;
  border-radius: 10px;
  color:white;
  padding:30px;
  position: relative;
  width:80%;
}

input{
  border-radius:5px;
}

.date,.time,.number{
  height:30px;
  margin-bottom:15px;
  font-weight:bold;
}

.date{
  width:30%;
}

.time,.number{
  width:100%;
}

.reservation-ttl{
  font-size:25px;
  font-weight:bold;
}

.confirm{
  background:#6495ed;
  border-radius: 10px;
  padding:20px;
  font-size:15px;
}

.reservation-name,.date-confirm,.time-confirm{
  margin-bottom:20px;
}

.date-confirm,.time-confirm,.number-confirm{
  display:flex;
  align-items:center;
}

.shop-name,#date-confirm,#time-confirm,#number-confirm{
  margin-top:0;
  margin-bottom:0;
  margin-left:30px;
}


.reservation-btn{
  position:absolute;
  bottom:0;
  left:0;
  width:100%;
}

.submit-btn{
  width:100%;
  height:60px;
  color:white;
  border-radius: 0 0 10px 10px;
  border-color:blue;
  background:blue;
  font-size:18px;
  cursor: pointer;
}
</style>
<body>
  <div class="header">
    <div class="hamburger-menu">
      <nav class="nav" id="nav">
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/register">Registeration</a></li>
          <li><a href="/login">Login</a></li>
        </ul>
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
    <div class="shop-detail">
      @foreach ($shops as $shop)
      <div class="name">
        <a href="/" class="home"><</a>
        {{$shop->name}}
      </div>
      <div class="img">
        @if($shop->genre == '??????')
          <img src = https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg>
          @elseif($shop->genre == '??????')
          <img src = https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg>
          @elseif($shop->genre == '?????????')
          <img src = https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg>
          @elseif($shop->genre == '???????????????')
          <img src = https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg>
          @else
          <img src = https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg>
        @endif
      </div>
      <div class="tag">
        #{{$shop->prefecture}}
        #{{$shop->genre}}
      </div>
      <div class="detail">
        {{$shop->detail}}
      </div>
      @endforeach
    </div>
    <div class="reservation">
      <p class="reservation-ttl">??????</p>
      <form action="{{ route('reservation', ['id'=>$shop->id]) }}" method="post">
        @csrf
        <div class="date-input">
          <input type="date" name="date" id="date" class="date" required>
        </div>
        <div class="time-input">
          <select name="time" class="time" id="time">
            <option value="00:00" name="time">00:00</option>
            <option value="01:00" name="time">01:00</option>
            <option value="02:00" name="time">02:00</option>
            <option value="03:00" name="time">03:00</option>
            <option value="04:00" name="time">04:00</option>
            <option value="05:00" name="time">05:00</option>
            <option value="06:00" name="time">06:00</option>
            <option value="07:00" name="time">07:00</option>
            <option value="08:00" name="time">08:00</option>
            <option value="09:00" name="time">09:00</option>
            <option value="10:00" name="time">10:00</option>
            <option value="11:00" name="time">11:00</option>
            <option value="12:00" name="time">12:00</option>
            <option value="13:00" name="time">13:00</option>
            <option value="14:00" name="time">14:00</option>
            <option value="15:00" name="time">15:00</option>
            <option value="16:00" name="time">16:00</option>
            <option value="17:00" name="time">17:00</option>
            <option value="18:00" name="time">18:00</option>
            <option value="19:00" name="time">19:00</option>
            <option value="20:00" name="time">20:00</option>
            <option value="21:00" name="time">21:00</option>
            <option value="22:00" name="time">22:00</option>
            <option value="23:00" name="time">23:00</option>
            <option value="24:00" name="time">24:00</option>
          </select>
        </div>
        <div class="number-input">
          <select name="number" class="number">
            <option value="1???" name="time">1???</option>
            <option value="2???" name="time">2???</option>
            <option value="3???" name="time">3???</option>
            <option value="4???" name="time">4???</option>
            <option value="5???" name="time">5???</option>
            <option value="6???" name="time">6???</option>
            <option value="7???" name="time">7???</option>
            <option value="8???" name="time">8???</option>
            <option value="9???" name="time">9???</option>
            <option value="10???" name="time">10???</option>
            <option value="11???" name="time">11???</option>
            <option value="12???" name="time">12???</option>
            <option value="13???" name="time">13???</option>
            <option value="14???" name="time">14???</option>
            <option value="15???" name="time">15???</option>
            <option value="16???" name="time">16???</option>
            <option value="17???" name="time">17???</option>
            <option value="18???" name="time">18???</option>
            <option value="19???" name="time">19???</option>
            <option value="20???" name="time">20???</option>
            <option value="21???" name="time">21???</option>
            <option value="22???" name="time">22???</option>
            <option value="23???" name="time">23???</option>
            <option value="24???" name="time">24???</option>
            <option value="25???" name="time">25???</option>
            <option value="26???" name="time">26???</option>
            <option value="27???" name="time">27???</option>
            <option value="28???" name="time">28???</option>
            <option value="29???" name="time">29???</option>
            <option value="30???" name="time">30???</option>
            <option value="31???" name="time">31???</option>
            <option value="32???" name="time">32???</option>
            <option value="33???" name="time">33???</option>
            <option value="34???" name="time">34???</option>
            <option value="35???" name="time">35???</option>
            <option value="36???" name="time">36???</option>
            <option value="37???" name="time">37???</option>
            <option value="38???" name="time">38???</option>
            <option value="39???" name="time">39???</option>
            <option value="30???" name="time">40???</option>
            <option value="41???" name="time">41???</option>
            <option value="42???" name="time">42???</option>
            <option value="43???" name="time">43???</option>
            <option value="44???" name="time">44???</option>
            <option value="45???" name="time">45???</option>
            <option value="46???" name="time">46???</option>
            <option value="47???" name="time">47???</option>
            <option value="48???" name="time">48???</option>
            <option value="49???" name="time">49???</option>
            <option value="50???" name="time">50???</option>
            <option value="51???" name="time">51???</option>
            <option value="52???" name="time">52???</option>
            <option value="53???" name="time">53???</option>
            <option value="54???" name="time">54???</option>
            <option value="55???" name="time">55???</option>
            <option value="56???" name="time">56???</option>
            <option value="57???" name="time">57???</option>
            <option value="58???" name="time">58???</option>
            <option value="59???" name="time">59???</option>
            <option value="60???" name="time">60???</option>
            <option value="61???" name="time">61???</option>
            <option value="62???" name="time">62???</option>
            <option value="63???" name="time">63???</option>
            <option value="64???" name="time">64???</option>
            <option value="65???" name="time">65???</option>
            <option value="66???" name="time">66???</option>
            <option value="67???" name="time">67???</option>
            <option value="68???" name="time">68???</option>
            <option value="69???" name="time">69???</option>
            <option value="70???" name="time">70???</option>
            <option value="71???" name="time">71???</option>
            <option value="72???" name="time">72???</option>
            <option value="73???" name="time">73???</option>
            <option value="74???" name="time">74???</option>
            <option value="75???" name="time">75???</option>
            <option value="76???" name="time">76???</option>
            <option value="77???" name="time">77???</option>
            <option value="78???" name="time">78???</option>
            <option value="79???" name="time">79???</option>
            <option value="80???" name="time">80???</option>
            <option value="81???" name="time">81???</option>
            <option value="82???" name="time">82???</option>
            <option value="83???" name="time">83???</option>
            <option value="84???" name="time">84???</option>
            <option value="85???" name="time">85???</option>
            <option value="86???" name="time">86???</option>
            <option value="87???" name="time">87???</option>
            <option value="88???" name="time">88???</option>
            <option value="89???" name="time">89???</option>
            <option value="90???" name="time">90???</option>
            <option value="91???" name="time">91???</option>
            <option value="92???" name="time">92???</option>
            <option value="93???" name="time">93???</option>
            <option value="94???" name="time">94???</option>
            <option value="95???" name="time">95???</option>
            <option value="96???" name="time">96???</option>
            <option value="97???" name="time">97???</option>
            <option value="98???" name="time">98???</option>
            <option value="99???" name="time">99???</option>
          </select>
        </div>
        <div class="confirm">
          <div class="reservation-name">
            <label>Shop</label>
            <label class="shop-name">{{$shop->name}}</label>
          </div>
          <div class="date-confirm">
            <label>Date</label>
            <p id="date-confirm"></p>
          </div>
          <div class="time-confirm">
            <label>Time</label>
            <p id="time-confirm"></p>
          </div>
          <div class="number-confirm">
            <label>Number</label>        
            <p id="number-confirm"></p>
          </div>
        </div>
        <div class="reservation-btn">
          <input type="submit" value="????????????" class="submit-btn">
        </div>
      </form>
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

let date = document.querySelector(`input[type='date'][name='date']`);

  date.addEventListener(`change`, () => {
    document.querySelector(`#date-confirm`).innerHTML = date.value;
  });

let time = document.querySelector(`select[name='time']`);

time.addEventListener(`change`, () => {
  document.querySelector(`#time-confirm`).innerHTML = time.value;
});

let number = document.querySelector(`select[name='number']`);

number.addEventListener(`change`, () => {
  document.querySelector(`#number-confirm`).innerHTML = number.value;
});
</script>
</html>