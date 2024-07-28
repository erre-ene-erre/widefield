<?php
    return function ($page, $site){
        $is_project_coll = $page -> template() =='project-collection';
        $is_project = $page -> template() =='project';
        $is_media = $page -> template() =='media-file';
        $is_artists = $page -> template() == 'artists'; 
        $is_artist = $page -> parent() == 'artists'; 
        $is_info = $page -> template() == 'gral-info';
        $is_about = $page -> uuid() -> id() == 'E79LXhsb992XCMmD';
        $is_grandchild = $page -> parents() -> count() == 2;

        return [
            'is_project' => $is_project,
            'is_media' => $is_media,
            'is_artists' => $is_artists,
            'is_artist' => $is_artist,
            'is_info' => $is_info,
            'is_about' => $is_about,
            'is_grandchild' => $is_grandchild
        ];
    };