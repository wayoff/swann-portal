@extends('layouts.descriptive-content')

@section('Page__Title', 'Warranties for: ' . $activePolicyCategory->parent->name . ' - ' . $activePolicyCategory->name)

@section('Page__BreadCrumbs')
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('home') }}">Home</a>
        </li>
        <li class="active">
            <a href="#"> Warranties </a>
        </li>
    </ol>
@stop
@section('content')
<div class="row">
    <div class="col-md-3 well" id="SideBarMenu">
        <div class="list-group panel panel-primary">
                @foreach($policyCategories as $policyCategory)
                    <div 
                        style="cursor: pointer;"
                        class="panel-heading"
                        data-toggle="collapse"
                        data-target="#sidebarpolicy_{{$policyCategory->id}}"
                    >
                        {{$policyCategory->name}}
                        <i class="caret"></i>
                    </div>
                    <div class="collapse {{$policyCategory->id === $activePolicyCategory->parent->id ? 'in' : ''}}" id="sidebarpolicy_{{$policyCategory->id}}">
                        @foreach($policyCategory->children as $child)
                            <a 
                                href="{{url('warranties/' . $child->id)}}"
                                class="list-group-item {{$activePolicyCategory->id === $child->id ? 'list-group-item-success' : ''}}"
                            >
                                {{$child->name}}
                            </a>
                        @endforeach
                    </div>
                @endforeach
                
                @foreach($otherWarranties as $otherWarranty)
                    <a 
                        target="_blank"
                        data-parent="#SideBarMenu"
                        class="list-group-item list-group-item-success" 
                        href="{{$otherWarranty->document->getDocument()}}"
                    >
                        {{$otherWarranty->name}}
                    </a>
                @endforeach
        </div>
    </div>
    <div class="col-md-9">
        <div class="list-group">
            @if(!$warranties->isEmpty())
                @foreach($warranties as $warranty)
                    <a href="{{$warranty->document->getDocument()}}" target="_blank" class="list-group-item">
                        <h6 class="list-group-item-heading">
                            {{$warranty->name}}
                        </h6>
                    </a>
                @endforeach
            @else
                <div class="alert alert-info">
                    No Warranty was found
                </div>
            @endif
        </div>
    </div>
</div>
@stop