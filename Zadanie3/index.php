<?php
$servername = "localhost";
$database = "acc";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

$sql = "SELECT * FROM information ORDER BY rating DESC";

$result = mysqli_query($conn, $sql);
$result = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <title>Задание 3</title>
    <style>
*{
    margin: 0px;
    font-family: 'Lato', sans-serif;
    font-size: 16px;
    
}

body{
    display: flex;
    justify-content: center;
    padding: 100px;
    padding-left: 10%;
    padding-right: 10%;
}

#first, #second{
    width: 40%;
}

#first p{
    color: #5B5B5B;
}

#second p, summary{
    color: #34539A;
    padding: 20px;
}

h1{
    margin-bottom: 15px;
    color: #283F75;
    font-weight: normal; 
    font-size: 34px;
}

.content{
    padding: 10px;
}

.review-arrow {
    transition: .2s;
    width: 10px;
    height: 10px;
    background: url('arrow.svg');
    background-size: 100% 100%;
}

.second-block {
    display: flex;
    margin-left: 75px;
    margin-bottom: 20px;
}

.second-rating {
    margin-top: 20px;
}

.second-card {
    display: inline-flex;
    align-items: center;
    justify-content: space-between;
    width: 460px;
    height: 60px;
    margin-right: 20px;
    border: 1px solid #C6CDDA;
}

.second-card:hover {
    cursor: pointer;
}

.accordion-content {
    display: none;
}
.accordion-item {
    width: 462px;
}

.accordion-item.active .accordion-content {
    display: block;
    border: 1px solid #E6E9F0;
    border-radius: 0px 0px 10px 10px;
    padding: 20px 25px;
    color: #34539A;
}

.second-card-title, .second-card-num {
    font-size: 15px;
    font-weight: 700;
    color: #283F75; 
}

.second-card-title {
    margin-left: 25px;
}

.second-card-rating {
    display: flex;
    align-items: center;
    margin-right: 25px;
}

.second-card-num {
    margin-left: 2px;
    margin-right: 50px;
}

.rating-arrow {
    transition: .2s;
    width: 10px;
    height: 10px;
    background: url('arrow.svg');
    background-size: 100% 100%;
}

.accordion-item.active .rating-arrow {
    transform: rotate(180deg);
}

.rating {
    margin-left: 20px;
    margin-top: 15px;
    display: inline-flex;
    flex-direction: row-reverse;
}
  
.rating input {
    display: none;
}
  
.rating label {
    margin-right: 5px;
    width: 27px;
    cursor: pointer;
}
  
.rating label svg {
    width: 100%;
    height: auto;
}
  
.rating label:hover svg,
.rating label:hover ~ label svg,
.rating input:checked ~ label svg {
    fill: #FFC700;
}
    </style>
</head>
<body>
    <div class="content" id="first">
        <h1>На что рассчитывать при взыскании неустойки по ДДУ?</h1>
        <p>Когда застройщик нарушает сроки сдачи по ДДУ, вы как дольщик имеете право требовать неустойку за просрочку, а также компенсацию убытков, вызванных этой просрочкой. 
        <br><br>
        Само собой, застройщику невыгодно добровольно выплачивать вам компенсацию. Когда дело доходит до суда, суд урезает сумму неустойки на основании ст. 333 ГК РФ. Это урезание практически неизбежно. 
        <br><br>
        Основная наша задача состоит в том, чтобы взыскать неустойку по ДДУ в максимальном размере, т.е. избежать сильного ее урезания. Вот что вы можете требовать от застройщика.</p>
    </div>

    <div class="content" id="second">

        <?php foreach ($result as $value): ?>
                <div class="second-block">
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <div class="second-card">
                                <div class="second-card-title">
                                    <?= $value['title'] ?>
                                </div>
                                <div class="second-card-rating">
                                    <?php if ($value['rating_count'] != 0): ?>
                                        <img src="Star 1.svg" alt="Звезда">
                                        <div class="second-card-num"><?= round($value['rating']) ?></div>
                                    <?php endif; ?>
                                    <div class="rating-arrow"></div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-content">
                            <?= $value['text'] ?>
                        </div>
                    </div>
                    <div class="rating">
                        <input class="rating-input" type="radio" id="star5_<?= $value['id'] ?>" name="<?= $value['id'] ?>" value="5" />
                        <label for="star5_<?= $value['id'] ?>" title="Оценка 5 звезд">
                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.2026 1.84124C10.6661 0.930713 11.967 0.930713 12.4305 1.84124L14.143 5.20516C14.5547 6.01372 15.3386 6.56721 16.2383 6.68447L19.9582 7.16929C21.0134 7.30682 21.4251 8.61586 20.6387 9.33266L18.0657 11.6778C17.3602 12.3208 17.0386 13.2835 17.216 14.2214L17.8655 17.6545C18.0585 18.6747 16.9954 19.4719 16.0701 19.0007L12.5643 17.2157C11.7804 16.8165 10.8527 16.8165 10.0688 17.2157L6.56301 19.0007C5.63767 19.4719 4.57461 18.6747 4.76762 17.6545L5.41705 14.2214C5.59447 13.2835 5.27288 12.3208 4.56743 11.6778L1.9944 9.33266C1.20794 8.61585 1.61969 7.30682 2.67487 7.16929L6.39475 6.68447C7.29445 6.56721 8.07841 6.01372 8.49004 5.20516L10.2026 1.84124Z" stroke="#FFC700" stroke-width="1.5"/>
                            </svg>            
                        </label>
                        <input class="rating-input" type="radio" id="star4_<?= $value['id'] ?>" name="<?= $value['id'] ?>" value="4" />
                        <label for="star4_<?= $value['id'] ?>" title="Оценка 4 звезды">
                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.2026 1.84124C10.6661 0.930713 11.967 0.930713 12.4305 1.84124L14.143 5.20516C14.5547 6.01372 15.3386 6.56721 16.2383 6.68447L19.9582 7.16929C21.0134 7.30682 21.4251 8.61586 20.6387 9.33266L18.0657 11.6778C17.3602 12.3208 17.0386 13.2835 17.216 14.2214L17.8655 17.6545C18.0585 18.6747 16.9954 19.4719 16.0701 19.0007L12.5643 17.2157C11.7804 16.8165 10.8527 16.8165 10.0688 17.2157L6.56301 19.0007C5.63767 19.4719 4.57461 18.6747 4.76762 17.6545L5.41705 14.2214C5.59447 13.2835 5.27288 12.3208 4.56743 11.6778L1.9944 9.33266C1.20794 8.61585 1.61969 7.30682 2.67487 7.16929L6.39475 6.68447C7.29445 6.56721 8.07841 6.01372 8.49004 5.20516L10.2026 1.84124Z" stroke="#FFC700" stroke-width="1.5"/>
                            </svg>  
                        </label>
                        <input class="rating-input" type="radio" id="star3_<?= $value['id'] ?>" name="<?= $value['id'] ?>" value="3" />
                        <label for="star3_<?= $value['id'] ?>" title="Оценка 3 звезды">
                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.2026 1.84124C10.6661 0.930713 11.967 0.930713 12.4305 1.84124L14.143 5.20516C14.5547 6.01372 15.3386 6.56721 16.2383 6.68447L19.9582 7.16929C21.0134 7.30682 21.4251 8.61586 20.6387 9.33266L18.0657 11.6778C17.3602 12.3208 17.0386 13.2835 17.216 14.2214L17.8655 17.6545C18.0585 18.6747 16.9954 19.4719 16.0701 19.0007L12.5643 17.2157C11.7804 16.8165 10.8527 16.8165 10.0688 17.2157L6.56301 19.0007C5.63767 19.4719 4.57461 18.6747 4.76762 17.6545L5.41705 14.2214C5.59447 13.2835 5.27288 12.3208 4.56743 11.6778L1.9944 9.33266C1.20794 8.61585 1.61969 7.30682 2.67487 7.16929L6.39475 6.68447C7.29445 6.56721 8.07841 6.01372 8.49004 5.20516L10.2026 1.84124Z" stroke="#FFC700" stroke-width="1.5"/>
                            </svg>
                        </label>
                        <input class="rating-input" type="radio" id="star2_<?= $value['id'] ?>" name="<?= $value['id'] ?>" value="2" />
                        <label for="star2_<?= $value['id'] ?>" title="Оценка 2 звезды">
                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.2026 1.84124C10.6661 0.930713 11.967 0.930713 12.4305 1.84124L14.143 5.20516C14.5547 6.01372 15.3386 6.56721 16.2383 6.68447L19.9582 7.16929C21.0134 7.30682 21.4251 8.61586 20.6387 9.33266L18.0657 11.6778C17.3602 12.3208 17.0386 13.2835 17.216 14.2214L17.8655 17.6545C18.0585 18.6747 16.9954 19.4719 16.0701 19.0007L12.5643 17.2157C11.7804 16.8165 10.8527 16.8165 10.0688 17.2157L6.56301 19.0007C5.63767 19.4719 4.57461 18.6747 4.76762 17.6545L5.41705 14.2214C5.59447 13.2835 5.27288 12.3208 4.56743 11.6778L1.9944 9.33266C1.20794 8.61585 1.61969 7.30682 2.67487 7.16929L6.39475 6.68447C7.29445 6.56721 8.07841 6.01372 8.49004 5.20516L10.2026 1.84124Z" stroke="#FFC700" stroke-width="1.5"/>
                            </svg>
                        </label>
                        <input class="rating-input" type="radio" id="star1_<?= $value['id'] ?>" name="<?= $value['id'] ?>" value="1" />
                        <label for="star1_<?= $value['id'] ?>" title="Оценка 1 звезда">
                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.2026 1.84124C10.6661 0.930713 11.967 0.930713 12.4305 1.84124L14.143 5.20516C14.5547 6.01372 15.3386 6.56721 16.2383 6.68447L19.9582 7.16929C21.0134 7.30682 21.4251 8.61586 20.6387 9.33266L18.0657 11.6778C17.3602 12.3208 17.0386 13.2835 17.216 14.2214L17.8655 17.6545C18.0585 18.6747 16.9954 19.4719 16.0701 19.0007L12.5643 17.2157C11.7804 16.8165 10.8527 16.8165 10.0688 17.2157L6.56301 19.0007C5.63767 19.4719 4.57461 18.6747 4.76762 17.6545L5.41705 14.2214C5.59447 13.2835 5.27288 12.3208 4.56743 11.6778L1.9944 9.33266C1.20794 8.61585 1.61969 7.30682 2.67487 7.16929L6.39475 6.68447C7.29445 6.56721 8.07841 6.01372 8.49004 5.20516L10.2026 1.84124Z" stroke="#FFC700" stroke-width="1.5"/>
                            </svg>
                        </label>
                    </div>
                </div>
            <?php endforeach; ?>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        const accordionHeaders = document.querySelectorAll('.accordion-header');

        accordionHeaders.forEach(header => {
        header.addEventListener('click', () => {
            const accordionItem = header.parentElement;
            accordionItem.classList.toggle('active');
        });
        });

        const rating_count = document.querySelectorAll('.rating-input');

        rating_count.forEach(rating => {
        rating.addEventListener('click', () => {
            var value = rating.value;
            var id = rating.name;
            $.get('index.php', {value: value, id: id}, function(data){
                alert("Вы поставили " + value + "★");
            });
        });
        });
    </script>

</body>
</html>

<?php

if (!empty($_GET['value']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $value = $_GET['value'];
    $sql = "UPDATE information SET rating_count = rating_count + 1, rating_sum = rating_sum + $value, rating = rating_sum/rating_count WHERE id = $id";
    mysqli_query($conn, $sql);
}

?>