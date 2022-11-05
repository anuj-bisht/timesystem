<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function generateStrongPassword($length = 8, $add_dashes = false, $available_sets = 'luds')
{
    $sets = array();
    if(strpos($available_sets, 'l') !== false)
        $sets[] = 'abcdefghjkmnpqrstuvwxyz';
    if(strpos($available_sets, 'u') !== false)
        $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
    if(strpos($available_sets, 'd') !== false)
        $sets[] = '23456789';
    if(strpos($available_sets, 's') !== false)
        $sets[] = '!@#$%&*?';

    $all = '';
    $password = '';
    foreach($sets as $set)
    {
        $password .= $set[array_rand(str_split($set))];
        $all .= $set;
    }

    $all = str_split($all);
    for($i = 0; $i < $length - count($sets); $i++)
        $password .= $all[array_rand($all)];

    $password = str_shuffle($password);

    if(!$add_dashes)
        return $password;

    $dash_len = floor(sqrt($length));
    $dash_str = '';
    while(strlen($password) > $dash_len)
    {
        $dash_str .= substr($password, 0, $dash_len) . '-';
        $password = substr($password, $dash_len);
    }
    $dash_str .= $password;
    return $dash_str;
}

function countryName($id){
 $countrySql=DB::table('countries')->select('name')->where('id', '=', $id)->first();   
 return $countrySql->name;   
}

function stateName($id){
 $stateSql=DB::table('states')->select('name')->where('id', '=', $id)->first();   
 return $stateSql->name;   
}

function cityName($id){
 $citySql=DB::table('cities')->select('name')->where('id', '=', $id)->first();   
 return $citySql->name;   
}

function statusChange($table='',$id='', $status = '') {

       ?>
<div  style="margin-left: 15px;" <?php if($status==1) { ?>class="btn btn-small btn-success pull" <?php }else{ ?>  class="btn btn-small btn-danger dng-w" <?php } ?>  id="<?php echo $id; ?>" onclick="statusUpdate(this.id,'<?php echo $table; ?>')">&nbsp;<span id="<?php echo "ai".$id; ?>"> <?php if($status==1){ ?> <i class="fa fa-check-circle"></i> Active <?php }else{ ?>  <i class="fa fa-times-circle"></i>&nbsp;In-active  <?php }?></span></div>                      
       

 <?php
} ?>
