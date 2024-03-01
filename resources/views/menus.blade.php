@extends('layouts.main2')

@section('style')
<style>
  /*ul li{
    position: relative;
    list-style: none;
  }
  li:before, li:after{
    content: "";
    position: absolute;
    left: -18px;
    background: blue;
  }
  li:before{
    height: 1px;
    width: 16px;
    top: 12px;
    background:red;
  }
  li:after{
    height: 26px;
    width: 1px;
    top: -14px;
  }
  li.parent:after{
    height: 100%;
    top: 12px;
  }
  li.parent:last-child:after{
    content: none;
  }*/
</style>
@endsection

@section('contenido')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between pt-1 pb-1">
  <h1 class="h3 mb-0 text-body-secondary">Menus</h1>
</div>
<!-- fin Page Heading -->


<ul class="tree">
  <li class="parent">
    <details> 
      <summary> hola </summary>
      <ul>
        <li class="parent">hol</li>
        <li class="parent">hol1</li>
        <li class="parent">hol3</li>
      </ul>
    </details>
  </li>
  <li class="parent">hola1</li>
  <li class="parent"s>hola3</li>
</ul>

@endsection

@section('scripts')

@endsection