<?php
return function(){
    date_default_timezone_set("Europe/Zurich");
    $currentNews = new Collection();
    $dateNow = date('Ymd');

    foreach (collection('all-news') as $newsitem) {
        $enddate = $newsitem -> date() -> toDate('Ymd');
        if($dateNow <= $enddate){$currentNews -> add($newsitem);}
    }
    return $currentNews;
};