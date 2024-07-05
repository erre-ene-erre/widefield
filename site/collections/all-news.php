<?php
return function($site){
    return $site
        -> children() -> template('news') -> first()
        -> news() -> toStructure();
};