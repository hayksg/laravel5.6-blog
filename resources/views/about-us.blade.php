@extends('layouts-site/wide')
@section('title', "| About Us")

@section('content')     

    @if(!$employees || count($employees) == 0)
        <h2 class="blog-post-title mb-4"><strong>The list is empty</strong></h2>
    @else
        <h2 class="blog-post-title mb-4"><strong>Our Team</strong></h2>
        <hr class="mb-4">
        
        <div class="row mb-4">
            <div class="col-sm-12">
                <h5><strong id="employee-name">{{ $employees->first()->name }}</strong></h5>
                <div class="employee-position">
                    <strong id="employee-position">
                        {{ $employees->first()->position }}
                    </strong>
                </div>
                <div class="first-employee text-justify">
                    <div class="row">
                        <div class="col-8" id="employee-performance">
                            {!! $employees->first()->performance !!}
                        </div>

                        <div class="col-4">                          
                            <img src="{{ asset('storage/employee/' . $employees->first()->img) }}" 
                             class="img-fluid" 
                             id="employee-image"
                             alt="image">
                        </div>

                    </div>
                </div>
            </div>
        </div>
                
        <hr class="mb-5">

        <div class="card-deck carousel-slick">
    
        @foreach($employees as $employee)
      
        <div class="card"> 
            <div class="card-block">
                <div class="card-title">
                    <a href="#" data-id="{{ $employee->id }}" class="employee-ajax">
                        <img src="{{ asset('storage/employee/' . $employee->img) }}" class="card-img-top img-fluid" alt="image">
                    </a>
                </div>
            </div>
            <div class="card-footer text-center">
                <small class="text-muted">
                    <a href="#" class="employee-link employee-ajax" data-id="{{ $employee->id }}">{{ $employee->name }}</a>
                    <br>
                    {{ $employee->position }}
                </small>
            </div>
        </div>

       @endforeach
      
       </div>

    @endif

@endsection
      