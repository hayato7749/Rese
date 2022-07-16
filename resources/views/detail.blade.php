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
      <p class="reservation-ttl">予約</p>
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
            <option value="1人" name="time">1人</option>
            <option value="2人" name="time">2人</option>
            <option value="3人" name="time">3人</option>
            <option value="4人" name="time">4人</option>
            <option value="5人" name="time">5人</option>
            <option value="6人" name="time">6人</option>
            <option value="7人" name="time">7人</option>
            <option value="8人" name="time">8人</option>
            <option value="9人" name="time">9人</option>
            <option value="10人" name="time">10人</option>
            <option value="11人" name="time">11人</option>
            <option value="12人" name="time">12人</option>
            <option value="13人" name="time">13人</option>
            <option value="14人" name="time">14人</option>
            <option value="15人" name="time">15人</option>
            <option value="16人" name="time">16人</option>
            <option value="17人" name="time">17人</option>
            <option value="18人" name="time">18人</option>
            <option value="19人" name="time">19人</option>
            <option value="20人" name="time">20人</option>
            <option value="21人" name="time">21人</option>
            <option value="22人" name="time">22人</option>
            <option value="23人" name="time">23人</option>
            <option value="24人" name="time">24人</option>
            <option value="25人" name="time">25人</option>
            <option value="26人" name="time">26人</option>
            <option value="27人" name="time">27人</option>
            <option value="28人" name="time">28人</option>
            <option value="29人" name="time">29人</option>
            <option value="30人" name="time">30人</option>
            <option value="31人" name="time">31人</option>
            <option value="32人" name="time">32人</option>
            <option value="33人" name="time">33人</option>
            <option value="34人" name="time">34人</option>
            <option value="35人" name="time">35人</option>
            <option value="36人" name="time">36人</option>
            <option value="37人" name="time">37人</option>
            <option value="38人" name="time">38人</option>
            <option value="39人" name="time">39人</option>
            <option value="30人" name="time">40人</option>
            <option value="41人" name="time">41人</option>
            <option value="42人" name="time">42人</option>
            <option value="43人" name="time">43人</option>
            <option value="44人" name="time">44人</option>
            <option value="45人" name="time">45人</option>
            <option value="46人" name="time">46人</option>
            <option value="47人" name="time">47人</option>
            <option value="48人" name="time">48人</option>
            <option value="49人" name="time">49人</option>
            <option value="50人" name="time">50人</option>
            <option value="51人" name="time">51人</option>
            <option value="52人" name="time">52人</option>
            <option value="53人" name="time">53人</option>
            <option value="54人" name="time">54人</option>
            <option value="55人" name="time">55人</option>
            <option value="56人" name="time">56人</option>
            <option value="57人" name="time">57人</option>
            <option value="58人" name="time">58人</option>
            <option value="59人" name="time">59人</option>
            <option value="60人" name="time">60人</option>
            <option value="61人" name="time">61人</option>
            <option value="62人" name="time">62人</option>
            <option value="63人" name="time">63人</option>
            <option value="64人" name="time">64人</option>
            <option value="65人" name="time">65人</option>
            <option value="66人" name="time">66人</option>
            <option value="67人" name="time">67人</option>
            <option value="68人" name="time">68人</option>
            <option value="69人" name="time">69人</option>
            <option value="70人" name="time">70人</option>
            <option value="71人" name="time">71人</option>
            <option value="72人" name="time">72人</option>
            <option value="73人" name="time">73人</option>
            <option value="74人" name="time">74人</option>
            <option value="75人" name="time">75人</option>
            <option value="76人" name="time">76人</option>
            <option value="77人" name="time">77人</option>
            <option value="78人" name="time">78人</option>
            <option value="79人" name="time">79人</option>
            <option value="80人" name="time">80人</option>
            <option value="81人" name="time">81人</option>
            <option value="82人" name="time">82人</option>
            <option value="83人" name="time">83人</option>
            <option value="84人" name="time">84人</option>
            <option value="85人" name="time">85人</option>
            <option value="86人" name="time">86人</option>
            <option value="87人" name="time">87人</option>
            <option value="88人" name="time">88人</option>
            <option value="89人" name="time">89人</option>
            <option value="90人" name="time">90人</option>
            <option value="91人" name="time">91人</option>
            <option value="92人" name="time">92人</option>
            <option value="93人" name="time">93人</option>
            <option value="94人" name="time">94人</option>
            <option value="95人" name="time">95人</option>
            <option value="96人" name="time">96人</option>
            <option value="97人" name="time">97人</option>
            <option value="98人" name="time">98人</option>
            <option value="99人" name="time">99人</option>
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
          <input type="submit" value="予約する" class="submit-btn">
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