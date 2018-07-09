<?php
/**
 * @author Machine
 */
if (!defined('IN_SPYOGAME') )
    die("Hacking attempt");
?>

<style>

   table .tableTimeobservatory
    {
        color: #535967;
        background: none;
        border-collapse: collapse;
       border:1px solid black;
       width: auto;

          }

   table .tableTimeobservatory th {
        background: none;
       border:1px solid #9497a0;
        background-color: #040406;
        width: auto;
    }
   table .tableTimeobservatory  tr:nth-child(2n) {
       background-color: #10131a;
   }
   table .tableTimeobservatory tr:nth-child(2n+1)  {
       background-color: #1c212e;
   }

   table .tableTimeobservatory tr:hover  {
       background-color: #485061;
   }

   table .tableTimeobservatory td {
       white-space: nowrap;
       border:1px solid #9497a0;
       padding-left: 10px;
       padding-right: 6px;
       padding-top: 2px;
       padding-bottom: 2px;
       text-align: right;
       width: auto;
   }


   table .tableTimeobservatory td.acti {
       color:  #ff3333;
   }
   table .tableTimeobservatory td.ally {
       color: #ffff00;
   }
   table .tableTimeobservatory td.coord {
       color: white;
   }
   table .tableTimeobservatory td.def {
       color:  #ff3333;
   }
   table .tableTimeobservatory td.flotte {
       color:  #ff3333;
   }
   table .tableTimeobservatory td.pillage {
       color: #00ff00;
   }
   table .tableTimeobservatory td.player {
       color: #ffff00;
   }
   table .tableTimeobservatory td.Timestamp {
       color: #d4d5d9;
   }

   table .tableTimeobservatory td.img {
       padding: 0px;
   margin: 0px;
   }


   table .tableTimeobservatory td.quality_0 {
       color: #d40018;
   }
   table .tableTimeobservatory td.quality_1 {
       color: #de8000;
   }
   table .tableTimeobservatory td.quality_2 {
       color: #cfe500;
   }
   table .tableTimeobservatory td.quality_3 {
       color: #82ea00;;
   }
   table .tableTimeobservatory td.quality_4 {
       color: #09f100;
   }


   table .tableTimeobservatory td.img img{
       width:16px;
       height: 16px;
       border-color: red;
       border-style: solid;
       border-width: 1px;

   }


   .info {
       display: none;
       width: 20%;
       max-width: 400px;

       background-color: black;
       color: #fff;
       text-align: center;
       border-radius: 6px;
       padding: 5px;
       overflow: auto;
       border-style: solid;
       border-width: 5px;
       border-color: #9497a0;


   }

   .infore {
       height: 90%;
       /* Position */
       position: fixed;
       top: 5%;
       left: 10px;
       background-color: black;
       z-index: 1;
   }
   .inforaid {
       height: 30%;
       /* Position */
       position: fixed;
       top: 60%;
       left: 10px;
       background-color: black;
       z-index: 1;
   }


</style>

