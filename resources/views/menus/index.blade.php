@extends('welcome')
@inject('menuController', 'App\Http\Controllers\MenuController')
@section('content')

    <div class="container">
        <h1 class="mt-3">
            รายการอาหาร
            <span class="float-end">
            <a>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMenuModal">
                    + เพิ่มเมนู
                </button>
            </a>
            </span>
            <span class="float-end">
            </span>
        </h1>


    {{-- Create Menu --}}
        @include('menu_component.createPopUp')
        {{-- filter --}}
        <span class="mb-3 float-end">
            <form class="form-inline" >
                <span class="col-1">filter : </span>
                <select class="h-100 text-center bg rounded-1" name="selected_cat" id="selected_cat">
                    <option value="">เลือกประเภท</option>
                    @foreach($categories as $cat)
                            <option value="{{ $cat->category }}" {{$select_c === $cat->category ? "selected" : ""}}>
                            {{ $cat->category }}
                            </option>
                    @endforeach
                </select>
                <span class="col-sm-1">
                <select class="h-100 text-center bg rounded-1" name="selected_depart" id="selected_depart">
                    <option value="">เลือกแผนก</option>
                    @foreach($departments as $depart)
                        <option value="{{ $depart->id }}" {{$select_d == $depart->id ? "selected" : ""}}>
                            {{ $depart->name }}
                        </option>
                    @endforeach
                </select>
            </span>
                <span><input type="text" class="rounded-2 text-center" name="search" id="search" autocomplete="off" placeholder="- - - - ชื่อเมนู - - - -" value="{{$search_name}}"></span>
                    <button class="btn btn-primary" formaction="{{route('menu.filter')}}">search</button>
                    <button class="btn btn-warning" formaction="{{route('menus.index')}}">clear</button>
            </form>
        </span>


        {{-- ----------------------------------------Menu Card----------------------------------------- --}}
        <div class="row container-fluid">
            @foreach($menus as $menu)
                <div class="col-sm-3 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png" alt="Card image cap">
                        <div class="card-body">
                            <table>
                                <tbody>
                                <h4 class="card-title text-dark">{{$menu->name}}</h4>
                                <p class="card-text">ราคา : {{$menu->price}} ฿</p>
                                <p class="card-text">ระยะเวลาการทำ : {{$menu->processTime}} นาที</p>
                                <p class="card-text">ประเภท : {{$menu->category}}</p>
                                <span class="float-end">
                                        <button class=" btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteMenuModal{{$menu->id}}">
                                            ลบ
                                        </button>
                                </span>
                                <span class="float-end">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editMenuModal{{$menu->id}}">
                                        แก้ไข
                                    </button>
                                </span>
                                </tbody>
                            </table>

                            {{-- Edit Menu --}}
                            @include('menu_component.editPopUp',['menu'=>$menu])

                            {{-- Delete Menu --}}
                            @include('menu_component.deletePopUp',['menu'=>$menu])

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

