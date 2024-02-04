<?php

function is_active()
{
    return 1;
}


function convertJson($obj){
    if(is_null($obj))
    {
        return [];
    }
    if(is_object($obj)){ $obj = $obj->toArray(); }

    $user = @$_SESSION['Auth']['User'];
    $obj_user_id = empty($obj['user_id']) ? null : $obj['user_id'];

    foreach($obj as $k=>&$elm){
        
        if($elm instanceof FrozenTime && $k == 'stat_updated'){ 
            if( 
                date($elm->format('Y-m-d H:i:s')) < date("Y-m-d H:i:s", strtotime("-1 months")) &&
                    ( 
                        $user['id'] == $obj_user_id || 
                        in_array($user['user_role'], ['admin.admin', 'admin.root', 'admin.supervisor']) 
                    )
                )
            { 
                $obj['stat_expired'] = date('Y-m-d H:i:s', strtotime(date("Y-m-d H:i:s", strtotime("-1 months"))) - strtotime($elm));
            }
        }

        if(is_object($elm) && !($elm instanceof FrozenDate) && !($elm instanceof FrozenTime)){ 
            $elm = $elm->toArray(); 
        }

        // recurtion into sub arrays
        if(is_array($elm)){
            $elm = convertJson($elm);
            continue ;
        }

        // convert json string into json obj
        if(is_string($elm)){
            if( in_array( $k, ['param_units_size_range'] ) ){
                if( !isset( $elm[1]) ){ $elm = '0,0' ; }
            }else{
                if(strlen($elm) == 0){ continue; }
            }
            if( $elm[0] == '{' || $elm[0] == '['){
                $elm =  json_decode($elm, true);
            }
            // if( in_array( $k, ['doc_allowed_roles', 'property_videos', 'property_usp', 'features_ids', 'project_photos', 'property_photos', 'param_units_size_range', 'param_unit_types', 'project_videos', 'seo_keywords'])){
                
            //     if( $elm[0] == '{' || $elm[0] == '[' && !is_object($elm) && !is_array($elm)){
            //         $elm = array_filter( explode(",", $elm) );
            //     }
            // }
            if( in_array( $k, ['doc_allowed_roles', 'property_videos', 'property_usp', 'features_ids', 'project_photos', 'param_units_size_range', 'param_unit_types', 'project_videos', 'seo_keywords'])){
                $elm = array_filter( explode(",", $elm) );
            }
        }

        // convert date object into readable date
        if($elm instanceof FrozenTime){
            $elm = $elm->format('Y-m-d H:i:s');
        }

        // convert number to strings
        if(is_numeric($elm)){
            $elm = $elm.'';
        }
    }
    return $obj;
}


// function getNavigationGroups(): void
// {
//     Filament::
// }