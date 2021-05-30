@extends('adminlte::page')

@section('title', 'POS')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <!--<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">You are logged insss!</p>
                </div>
            </div>
        </div>
    </div>-->

    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>${{$vd}}</h3>
              <p>Ventas del dia</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('listado_ventas')}}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
          <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><sup style="font-size: 20px"></sup>{{$prod_sin_stock}}</h3>
              <p>Productos sin Stock</p>
            </div>
            <div class="icon">
              <i class="ion ion-alert-circled"></i>
            </div>
            <a href="{{url('almacen')}}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
          <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$usuarios}}</h3>
              <p>Usuarios del sistema</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{url('usuarios')}}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
          <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$clientes}}</h3>
              <p>Clientes</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-people"></i>
            </div>
            <a href="{{url('clientes')}}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
          <!-- ./col -->
    </div>
@stop
