<html>
<head>
<title>Билеты</title>
</head>


<body>
<div class="tickets-tablo">
    <form action="" class="search-form">
        <select name="departure-city" id="departure-city">
            <? foreach($cities as $city): ?>
                <option value="<?=$city->id ?>"><?=$city->name ?></option>
            <? endforeach; ?>
        </select>

        <select name="arrival-city" id="arrival-city">
            <? foreach($cities as $city): ?>
                <option value="<?=$city->id ?>"><?=$city->name ?></option>
            <? endforeach; ?>
        </select>

        <input type="text" name="date-departure" id="date-departure" placeholder="dd-mm-yyyy" value="12-12-2014">

        <input type="text" name="count-adults" id="count-adults" value="1">

        <input type="text" name="count-children" id="count-children" value="0">

        <input type="submit" id="find-button" value="НАЙТИ БИЛЕТ"/>
        <lable>Форма поиска</lable>
    </form>
    <div id="tickets-list">

    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script src="/public/site.js"></script>
<link href="/public/site.css" rel="stylesheet">
</body>

</html>