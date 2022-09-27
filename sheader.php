<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <style>
      body{
        margin: 0;
        padding: 0;
      }
      .loader{
        height: 100vh;
        width: 100vw;
        background: #F8F9FA;
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        z-index: 100;
      }
      .container.text-wrap.rounded.mt-3{
        height: 400px;
        width: 60%;
        overflow: hidden;
        overflow-y: scroll;
        float:left;
        background-color: #F8F9FA;
      }
      .d-inline-block.container.text-wrap.rounded.my-3.pt-0{
        height: 400px;
        width: 35%;
        float: right;
        overflow: hidden;
        overflow-y: scroll;
        background-color: #F8F9FA;
      }
      .container.text-wrap.rounded.mt-3::-webkit-scrollbar{
        width: 0.3rem;
      }
      .container.text-wrap.rounded.mt-3::-webkit-scrollbar-track{
        background: #F7FAFC;
      }
      .container.text-wrap.rounded.mt-3::-webkit-scrollbar-thumb{
        background: #C0C4C9;
        border-radius: 5px;
      }
      .container.text-wrap.rounded.mt-3::-webkit-scrollbar-thumb:hover{
        background: #717171;
      }
      .d-inline-block.container.text-wrap.rounded.my-3.pt-0::-webkit-scrollbar{
        width: 0.3rem;
      }
      .d-inline-block.container.text-wrap.rounded.my-3.pt-0::-webkit-scrollbar-track{
        background: #F7FAFC;
      }
      .d-inline-block.container.text-wrap.rounded.my-3.pt-0::-webkit-scrollbar-thumb{
        background: #C0C4C9;
        border-radius: 5px;
      }
      .d-inline-block.container.text-wrap.rounded.my-3.pt-0::-webkit-scrollbar-thumb:hover{
        background: #717171;
      }
      @media (max-width: 1399.98px){
        .container.text-wrap.rounded.mt-3{
          width: 60%;
        }
        .d-inline-block.container.text-wrap.rounded.my-3.pt-0{
          width: 35%;
        }
      }
      @media (max-width: 1199.98px){
        .container.text-wrap.rounded.mt-3{
          width: 100%;
          float: none;
        }
        .d-inline-block.container.text-wrap.rounded.my-3.pt-0{
          width: 100%;
          float: none;
        }
      }
      @media (max-width: 991.98px){
        .container.text-wrap.rounded.mt-3{
          width: 100%;
          float: none;
        }
        .d-inline-block.container.text-wrap.rounded.my-3.pt-0{
          width: 100%;
          float: none;
        }
        .d-flex.justify-content-center{
          align-items: center;
          flex-direction: column;
        }
        .d-flex.justify-content-center .d-flex.container.me-3{
          width: 372px;
        }
      }
      .contaianer input[type=text]{
        background: transparent;
        border: none;
        border-bottom: 2px solid black;
      }
    </style>
</head>